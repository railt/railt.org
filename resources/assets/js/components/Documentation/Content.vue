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
        font-size: $font-size;

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
                    &:before {
                        content: '#';
                    }
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

            h4, h5, h6 {
                .header-link {
                    display: none;
                }
            }

            p {
                margin: 20px 0;
                padding: 0;
            }

            abbr {
                cursor: help;
            }

            code {
                background: $color-bg;
                color: desaturate($color-main, 25%);
                padding: 2px 5px;
                border-radius: 2px;
                font-family: $font-mono;
                font-size: inherit;
            }

            pre {
                margin: 0;
                padding: 0;
                display: block;
                background: none;
                font-size: ($font-size - 1px);

                code {
                    box-sizing: border-box;
                    display: block;
                    box-shadow: 0 0 0 2px $color-bg;
                    background: none;
                    color: inherit;
                    font-size: inherit;
                    padding: 20px 25px;
                    margin: 0;
                    border-radius: 3px;
                    overflow-x: auto;
                    width: 100%;
                    @include scrollbar;
                }
            }

            table {
                width: 100%;
                box-shadow: 0 0 0 2px $color-border;
                border-radius: 3px;
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
