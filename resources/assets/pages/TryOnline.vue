<style lang="scss" scoped>
    @import "kernel";

    .page-try-online {
        height: 100vh;
        width: 100vw;
        background: $color-bg;
        display: flex;

        .column {
            width: 50%;
            height: 100%;
            box-sizing: border-box;
            position: relative;
            padding: 68px 20px 20px 20px;

            .editor {
                overflow: hidden;
                height: 100%;
                width: 100%;
                padding: 1px;
                box-sizing: border-box;
            }

            .code-block {
                background: $color-white;
                width: 100%;
                height: 100%;
                box-shadow:
                    0 0 0 1px $color-border;
                border-radius: 3px;
                border: none;
                outline: none;
                box-sizing: border-box;
                font-size: 16px;
                line-height: 24px;
                margin: 0;
                white-space: pre;
                padding: 20px 15px;
                color: lighten(desaturate($color-main, 20%), 10%);
                font-family: $font-mono;
                resize: none;
                overflow: visible;

                &:focus {
                    box-shadow:
                        inset 0 2px 3px rgba($color-border, .4),
                        0 0 0 1px $color-gray;
                }
            }

            .code-block-render {
                position: relative;
                pointer-events: none;
                z-index: 16;

                .code-block {
                    box-shadow: none;
                    position: absolute;
                    top: 0;
                    left: 0;
                    background: none;
                    color: darken(desaturate($color-main, 20%), 10%);
                }
            }

            .code-value-error,
            .code-value {
                font-family: $font-mono;
                white-space: pre;
                font-size: 11px;
                line-height: 14px;
                overflow: auto;
                max-height: 100%;
                display: block;
                box-sizing: border-box;
                height: auto !important;
                background: none !important;
            }

            .code-value-error {
                color: $color-white;
                white-space: pre-wrap;
                border-radius: 3px;
                background: $color-red !important;
                font-size: 15px;
                line-height: 18px;
                padding: 10px 15px;
            }

            & /deep/ .loader {
                background: rgba($color-bg, .6);
                top: 0;
                position: absolute;
            }
        }
    }
</style>

<template>
    <section class="page-try-online">
        <article class="column">
            <div class="editor">
                <div class="code-block-render" :style="{top: scrollTop + 'px'}">
                    <div class="code-block" v-html="renderedContent"></div>
                </div>
                <textarea v-model="content"
                          @scroll="onScroll"
                          @keydown="checkButton"
                          @input="onNewChar"
                          class="code-block"></textarea>
            </div>
        </article>
        <aside class="column">
            <ui-loading v-if="loading"></ui-loading>
            <output class="code-value-error" v-if="error">{{ error }}</output>
            <code class="code-value" v-else="error" v-html="result"></code>
        </aside>
    </section>
</template>

<script>
    import Prism from "kernel/Prism";

    let throttling = null;

    const DEFAULT_CODE_EXAMPLE = `schema {
    query: Railt
}

"""
# The root object of the railt.org website API.
"""
type Railt {
    """
    # Returns a list of projects with documentation.
    """
    projects(
        """
        # Returns a list of projects that have been
        # updated after the specified date.
        """
        newer: String
    ): [Project]!

    """
    # Returns one Documentation Project.
    """
    project(
        """
        # Select one Project by primary ID.
        """
        id: ID,
        """
        # Select one Project by slug.
        """
        slug: String
    ): Project
}

type Project {}`;

    const KEYWORDS = [
        'query', 'fragment', 'mutation',
        'type', 'implements', 'enum',
        'union', 'interface', 'schema',
        'scalar', 'directive', 'input',
        'extend',

        'true', 'false', 'null',

        'ID', 'Int', 'Float', 'String',
        'Boolean', 'Any', 'DateTime'
    ];

    const KEY_TAB = 9;
    
    export default {
        data() {
            return {
                content: document.location.hash.substr(1) || DEFAULT_CODE_EXAMPLE,
                result: '',
                error: '',
                loading: false,
                scrollTop: 0,
            };
        },
        computed: {
            renderedContent: function() {
                let highlighted = this.content.replace(/[ ]+/mg, i => {
                    return '·'.repeat(i.length);
                });

                return Prism.highlight(highlighted, Prism.languages.graphql);
            }
        },
        mounted() {
            this.$nextTick(() => { this.doExec(); });
        },
        methods: {
            /** @param {Event} event */
            checkButton(event) {
                if (event.keyCode === KEY_TAB) {
                    this.render(event, '    ');
                    event.preventDefault();
                    event.stopPropagation();

                    return false;
                }
            },
            onScroll(event) {
                this.scrollTop = -event.target.scrollTop;
            },
            onNewChar(event) {
                document.location = '#' + encodeURIComponent(this.content);

                //let prefix = this.getPrefix(event);

                //if (prefix.match(/{$/)) {
                //    this.render(event, "\n    ", "\n}");
                //}

                //for(let keyword of KEYWORDS) {
                //    let regex = new RegExp(`${keyword.substr(0, 3)}$`);
                //    if (prefix.match(regex)) {
                //        this.render(event, keyword.substr(3));
                //        break;
                //    }
                //}

                if (throttling !== null) {
                    throttling = clearTimeout(throttling);
                }
                throttling = setTimeout(() => {
                    throttling = null;
                    this.doExec();
                }, 500);
            },

            doExec() {
                this.loading = true;
                this.$http.post('/try-online', {
                    content: this.content
                }).then(response => {
                    this.loading = false;
                    if (response.data.result) {
                        this.error = '';
                        this.result = Prism.highlight(response.data.result, Prism.languages.json);
                    } else {
                        this.result = '';
                        this.error = response.data.error;
                    }
                }).catch(error => {
                    this.loading = false;
                    this.result = '';
                    this.error = error.message;
                });
            },

            getPrefix(event) {
                return this.content.substr(0, event.target.selectionStart);
            },

            render(event, prefix = '', suffix = '') {
                let contentBefore = this.getPrefix(event);
                let contentAfter = this.content.substr(contentBefore.length);
                let before = contentBefore + prefix;
                this.content = before + contentAfter + suffix;

                setTimeout(i => {
                    let caretAt = before.length;
                    event.target.setSelectionRange(caretAt, caretAt);
                }, 10);

                return this;
            }
        }
    };
</script>
