<template>
    <article v-if="loading" class="documentation-body">
        <div v-for="placeholder in placeholders" class="placeholder"
             :style="{'width': placeholder + 'px'}">&nbsp;
        </div>
    </article>

    <article v-else class="documentation-body" v-html="html"></article>
</template>

<script>
    const DOCUMENTATION_ROUTE = 'docs';

    export default {
        props: {
            content: {
                type: String,
                default: ''
            },
            loading: {
                type: Boolean,
                default: false
            }
        },
        data() {
            return {
                placeholders: []
            }
        },
        methods: {
            route(link) {
                return {
                    name: DOCUMENTATION_ROUTE,
                    params: {path: link.split('/')}
                };
            },
            formatInternalLinks(content) {
                return content.replace(/<a\s+href="\/(.*?)"(.*?)>(.*?)<\/a>/g, (fqn, link, attributes, title) => {
                    let href = this.$router.resolve(this.route(link)).href;

                    return `<a href="${href}" ${attributes} data-route="${link}">${title}</a>`;
                });
            },
            subscribeInternalLinks() {
                this.$nextTick(() => {
                    for (let link of document.querySelectorAll('[data-route]')) {
                        link.addEventListener('click', event => {
                            this.$router.push(this.route(event.target.getAttribute('data-route')));

                            event.preventDefault();
                            event.stopPropagation();
                        }, false);
                    }
                });
            }
        },
        computed: {
            html() {
                let content = this.content;

                content = this.formatInternalLinks(content);
                this.subscribeInternalLinks();

                return content;
            }
        },
        created() {
            for (let i = 0; i < 40; i++) {
                this.placeholders.push(Math.floor(Math.random() * 300 + 10));
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../../sass/kernel";

    .documentation-body {
        position: relative;
        overflow: hidden;
        padding-top: 10px;
        padding-bottom: 100px;

        .placeholder {
            margin: 4px 8px;
            height: 20px;
            background: $color-bg;
            width: 150px;
            border-radius: 2px;
            display: inline-block;
        }

        & /deep/ {
            h1, h2, h3, h4, h5, h6 {
                position: relative;

                &:hover .header-link {
                    color: $color-border-regular;
                }

                .header-link {
                    position: absolute;
                    text-decoration: none;
                    left: -25px;
                    width: 25px;
                    color: #fff;
                    transition: color .3s ease;
                    font-size: 90%;
                    &:hover {
                        color: $color-main;
                    }
                }
            }

            & > h1:first-child {
                position: absolute;
                z-index: -9999999999;
                color: transparent;
                top: -60px;
            }

            h2 {
                font-style: italic;
            }

            h3 {
                color: $color-main;
            }

            h4, h5, h6 {
                .header-link {
                    display: none;
                }
            }

            p {
                margin: 0 !important;
                padding: 20px 0;
            }

            abbr {
                cursor: help;
            }

            blockquote {
                box-shadow: 0 0 0 2px $color-border;
                border-radius: 2px;
                font-size: 13px;
                font-style: italic;
                color: $color-text-secondary;
                margin: 10px 0;
                position: relative;
                padding: 10px 15px;
                line-height: 20px;
                min-height: 24px;
                box-sizing: border-box;
                @include clear();

                &:before {
                    display: block;
                    color: #fff;
                    height: 24px;
                    position: absolute;
                    left: 0;
                    top: 50%;
                    margin-top: -12px;
                    width: 40px;
                    text-align: center;
                    pointer-events: none;
                }

                p {
                    margin: 0 !important;
                    padding: 0 !important;
                }

                &.warn,
                &.info {
                    padding: 10px 20px 10px 40px;

                    &:before {
                        @include fa-icon;
                        font-size: 24px;
                    }

                    a {
                        color: #fff;
                        text-decoration: underline;
                        &:hover {
                            color: $color-border-regular;
                        }
                    }

                    color: #fff;
                }

                &.warn {
                    &:before {
                        content: $fa-var-warning;
                    }

                    background: $color-red;
                    box-shadow: 0 0 0 2px $color-red;
                }

                &.info {
                    &:before {
                        content: $fa-var-info;
                    }

                    background: $color-blue;
                    box-shadow: 0 0 0 2px $color-blue;
                }
            }

            code {
                background: $color-bg;
                color: desaturate($color-main, 25%);
                padding: 2px 5px;
                border-radius: 2px;
                font-family: $font-mono;
                font-size: inherit;
            }

            & > code,
            & > pre {
                font-size: 14px;
            }

            pre {
                display: block;
                box-sizing: border-box;
                padding: 10px 15px;
                border-radius: 3px;
                background: $color-bg;
                overflow-x: auto;
                width: 100%;
                box-shadow: 0 2px 1px rgba(#001, .1);
                @include scrollbar;

                code {
                    background: none;
                    color: inherit;
                    padding: 0;
                }
            }

            table {
                width: 100%;
                box-shadow: 0 0 0 2px $color-border;
                border-radius: 2px;
                padding: 10px 15px;

                th {
                    font-size: 13px;
                    font-weight: normal;
                    text-align: left;
                    text-transform: uppercase;
                    padding-bottom: 10px;
                    color: $color-text-placeholder;
                }

                td {
                    font-size: 13px;
                }
            }
        }
    }
</style>
