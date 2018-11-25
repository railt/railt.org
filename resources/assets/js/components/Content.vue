<template>
    <article class="documentation-body">
        <slot></slot>
    </article>
</template>

<script>
    import CodeExecution from "./CodeExecution";

    const ALLOWED_LANGUAGES = [
        'sdl',
        'graphql'
    ];

    export default {
        mounted() {
            for (let node of this.$slots.default) {
                this.analyze(node);
            }
        },
        methods: {
            /**
             * @param {VNode} node
             */
            analyze(node) {
                if (node.tag === 'pre') {
                    for (let code of node.children) {
                        let element = code.elm;
                        let language = element.getAttribute('data-language');

                        for (let allowed of ALLOWED_LANGUAGES) {
                            if (language === allowed) {
                                this.makeExecutionPoint(node.elm);
                                return;
                            }
                        }
                    }
                }
            },
            /**
             * @param {HTMLElement} node
             */
            makeExecutionPoint(node) {
                let ExecutionComponent = Vue.component('v-code-execution', CodeExecution);

                let component = new ExecutionComponent({
                    el: node,
                    parent: this,
                    data: {
                        code: node.innerHTML
                    }
                });
            }
        },
    }
</script>

<style lang="scss" scoped>
    @import "../../sass/kernel";

    .documentation-body {
        position: relative;
        overflow: hidden;
        padding: 10px 2px 100px 2px;
        font-size: $font-size;

        & /deep/ {
            h1, h2, h3, h4, h5, h6 {
                position: relative;

                &:hover .header-link {
                    color: $color-border;
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
                white-space: nowrap;
            }

            sup {
                position: relative;
                top: -5px;
                font-size: 11px;

                code {
                    background: none;
                    padding: 0;
                }
            }

            pre {
                margin: 20px 0;
                padding: 0;
                display: block;
                background: none;
                position: relative;
                font-size: 95%;

                &:after {
                    content: '';
                    display: block;
                    width: 30px;
                    height: 100%;
                    position: absolute;
                    top: 0;
                    right: 0;
                    pointer-events: none;
                    border-radius: 0 3px 3px 0;
                    background: linear-gradient(to right, rgba(#fff, 0), rgba(#fff, 1));
                }

                code {
                    box-shadow: 0 0 0 2px $color-border;
                    display: block;
                    background: #fff;
                    color: inherit;
                    font-size: inherit;
                    padding: 20px 25px;
                    white-space: pre !important;
                }
            }

            table {
                width: 100%;
                box-shadow: 0 0 0 2px $color-border;
                background: #fff;
                border-radius: 3px;
                padding: 10px 15px;

                th {
                    font-size: 13px;
                    font-weight: normal;
                    text-align: left;
                    text-transform: uppercase;
                    padding: 0 10px 10px 10px;
                    color: $color-description;
                }

                td {
                    font-size: 13px;
                    padding: 5px 10px;
                    line-height: 17px;
                }
            }
        }
    }
</style>
