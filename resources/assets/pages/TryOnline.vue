<style lang="scss" scoped>
    @import "kernel";

    @mixin selection {
        &::-moz-selection { @content }
        &::selection { @content }
    }

    @mixin scrollbars {
        &::-webkit-scrollbar {
            width: 6px;
        }

        &::-webkit-scrollbar-track {
            background: #232733;
            box-shadow: inset 0 1px 1px rgba(#000, .5);
            border-radius: 3px;
        }

        &::-webkit-scrollbar-thumb {
            border-radius: 3px;
            background: #464d5e;
            box-shadow: inset 0 0 0 1px #232733;
        }
    }

    .page-try-online {
        width: 100vw;
        display: flex;
        height: 100vh;
        background: #3d4456;
        box-sizing: border-box;
        padding-top: 48px;

        .layout {
            width: 100%;
            height: 100%;
            box-sizing: border-box;
            display: flex;
            align-items: stretch;
            flex-direction: column;
            color: $color-dark-white;

            $height: 36px;

            .header {
                height: $height;
                padding: 0 10px;
                width: 100%;
                background: #232733;
                display: flex;
                align-items: center;
                justify-content: flex-start;
                box-shadow: inset 0 -1px 0 rgba(#000, .1);

                .tab {
                    cursor: default;
                    top: 6px;
                    height: 32px;
                    position: relative;
                    box-shadow: inset 0 1px 0 rgba(#fff, .1);
                    background: #3d4456;
                    background: linear-gradient(to bottom, lighten(#3d4456, 5%) 0, #3d4456 100%);
                    display: flex;
                    font-size: 12px;
                    justify-content: center;
                    align-items: center;
                    padding: 0 20px;
                    margin-right: 8px;
                    color: $color-light-silver;
                    border-radius: 2px 2px 0 0;
                }

                & /deep/ .button {
                    position: relative;
                    top: 1px;
                    a, button {
                        box-shadow:
                            0 0 1px rgba(#000, .1),
                            inset 0 0 1px rgba(#fff, .1);
                        height: 22px;
                        line-height: 22px;
                        padding: 0 10px;
                    }
                }

                .version {
                    margin: 0 30px 0 10px;
                    font-size: 11px;
                    line-height: 11px;
                    color: $color-silver;
                    justify-self: flex-end;
                }
            }

            .editor {
                width: 100%;
                height: 95%;
                height: calc(100% - #{$height});
                background: #3d4456;
                box-shadow: inset 0 1px 0 rgba(#fff, .05);
                flex-shrink: 1;
                box-sizing: border-box;
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                padding: 20px;

                .editor-result {
                    height: 100%;
                    overflow-y: scroll;
                    width: 50%;
                    position: relative;
                    left: 10px;
                    border-radius: 3px;
                    font-family: $font-mono;
                    font-size: 12px;
                    @include scrollbars;

                    .error {
                        border-radius: 3px 3px 0 0;
                        color: rgba($color-white, .8);
                        background: rgba($color-red, .9);
                        padding: 15px 25px;
                        box-shadow: 0 1px 0 rgba(#000, .1);
                        white-space: pre;
                        word-break: keep-all;
                    }

                    .trace {
                        .trace-title {
                            padding: 5px 15px;
                            text-transform: uppercase;
                            background: rgba(#fff, .1);
                            margin: 15px 0 5px 0;
                        }

                        .trace-item {
                            display: block;
                            box-sizing: border-box;
                            padding: 0 15px;
                            width: 100%;
                            font-size: 12px;
                            line-height: 18px;
                            color: #c5c9d3;
                            white-space: pre;
                            word-break: keep-all;

                            &:nth-child(2n + 1) {
                                background: rgba(#fff, .02);
                            }
                        }
                    }
                }

                .editor-code {
                    box-sizing: border-box;
                    padding-left: 20px;
                    height: 100%;
                    width: 50%;
                    position: relative;
                    overflow: hidden;
                }

                .code {
                    white-space: pre;
                    word-break: keep-all;
                    border: none;
                    background: none;
                    resize: none;
                    width: 100%;
                    min-height: 100%;
                    position: absolute;
                    color: $color-gray;
                    line-height: 20px;
                    overflow: visible;
                    font-family: $font-mono;
                    font-size: 14px;
                    z-index: 8;
                    outline: none;
                    tab-size: 4;
                    hyphens: none;
                    caret-color: $color-gray;
                    left: 0;
                    top: 0;
                    margin: 0;
                    padding: 0;

                    @include selection {
                        background: #6a637a;
                    }

                    &.highlight {
                        z-index: 9;
                        pointer-events: none;
                        overflow: visible !important;
                    }

                    &.text {
                        color: #3d4456;
                        overflow-y: scroll;
                        scroll-behavior: smooth;
                        @include scrollbars;
                    }
                }
            }
        }
    }
</style>

<template>
    <section class="page-try-online">
        <section class="layout">
            <header class="header">
                <span class="version">{{ version }}</span>
                <div class="tab">example.graphqls</div>
                <ui-button @click="exec">►</ui-button>
            </header>
            <div class="editor">
                <div class="editor-code">
                    <textarea class="code text"
                          v-model="content"
                          @scroll="onScroll"
                          @keydown="onKey"
                          @input="onInput"></textarea>
                    <div class="code highlight"
                         :style="{top: scrollTop + 'px', left: scrollLeft + 'px'}"
                         v-html="renderedContent"></div>
                </div>

                <aside class="editor-result">
                    <div class="error" v-if="error">{{ error }}</div>

                    <div class="trace">
                        <header class="trace-title">Compilation result</header>
                        <div class="trace-item" v-html="result"></div>
                    </div>

                    <div class="trace">
                        <header class="trace-title">Compilation backtrace</header>
                        <div class="trace-item" v-for="i in trace">{{ i.message }}</div>
                    </div>
                </aside>
            </div>
        </section>
    </section>
</template>

<script>
    import Prism from "kernel/Prism";

    /**
     * @type {{TAB: number}}
     */
    const KEY = {
        TAB: 9
    };

    export default {
        data() {
            return {
                scrollTop: 0,
                scrollLeft: 0,

                content: decodeURIComponent(document.location.hash.substr(1)) || '',

                result: [],
                error: '',
                trace: []
            };
        },
        props: {
            version: {
                type: String
            }
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
            this.$nextTick(() => { this.exec(); });
        },
        methods: {
            /**
             * @param {Event} event
             */
            onKey(event) {
                if (event.keyCode === KEY.TAB) {
                    this.render(event, '    ');
                    event.preventDefault();
                    event.stopPropagation();
                    return false;
                }
            },

            /**
             * @param {Event} event
             */
            onScroll(event) {
                this.scrollTop = -event.target.scrollTop;
                this.scrollLeft = -event.target.scrollLeft;
            },

            /**
             * @param {Event} event
             */
            onInput(event) {
                document.location = `#${encodeURIComponent(this.content)}`;
            },

            exec() {
                console.log(23);
                this.$http.post('/try-online', {
                    content: this.content
                }).then(response => {
                    this.fill(response.data);
                }).catch(error => {
                    this.fill(error.response.data);
                });
            },

            fill(data) {
                if (data.errors) {
                    this.error = (data.errors || {}).content[0];
                } else {
                    this.error = data.error || data.message || '';
                }

                this.result = Prism.highlight(data.result || '', Prism.languages.json);
                this.trace  = data.trace || [];
            },

            /**
             * @param {Event} event
             * @param {String} prefix
             * @param {String} suffix
             * @return {methods}
             */
            render(event, prefix = '', suffix = '') {
                let contentBefore = this.content.substr(0, event.target.selectionStart);
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
