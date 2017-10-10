<style lang="scss" scoped>
    @import "kernel";

    .page-docs {
        $nav: 250px;
        max-width: $ui-width;
        margin: 0 auto;
        position: relative;

        .nav {
            width: $nav;
            position: absolute;
            top: 48px;
            right: 0;
            min-height: 100vh;
            box-sizing: border-box;
            padding: 0;
            font-size: 14px;
            box-shadow: -1px 0 0 $color-border;

            p {
                color: $color-light-silver;
                font-size: 0.86em;
                letter-spacing: 0.1em;
                font-weight: normal;
                text-transform: uppercase;
                margin: 1.8em 10px 0.7em 2px;
                padding: 0.5em 10px;
                border-bottom: dashed 1px $color-border;
            }

            a {
                font-size: 13px;
                color: $color-light-black;
                box-sizing: border-box;
                text-decoration: none;
                display: block;
                position: relative;
                padding: 2px 0 2px 10px;
                left: -10px;

                &:hover {
                    color: $color-main;
                    text-decoration: underline;
                }

                &[data-active="true"] {
                    border-radius: 2px;
                    background: $color-border;
                    color: $color-text;
                    cursor: default;
                    text-decoration: none;
                }
            }

            .menu {
                padding: 5px 20px 15px 20px;

                &.child-menu {
                    background: $color-bg;
                }
            }

            .menu > ul {
                & > li {
                    & > ul {
                        margin-left: 0;
                        ul {
                            margin-left: 30px;
                            padding: 5px 0 3px 0;
                            li {
                                line-height: 14px;
                                a {
                                    color: $color-light-black;
                                    font-size: 12px;
                                }
                            }
                        }
                    }
                }

                li {
                    line-height: 1.7rem;
                    list-style: none;
                    margin-bottom: 10px;
                }

                a {
                    margin-left: 12px;
                    font-size: 14px;
                }
            }

            p > a {
                margin-left: 0 !important;
                &:before {
                    content: '';
                    display: block;
                    width: 6px;
                    height: 6px;
                    margin-top: 8px;
                    margin-right: 3px;
                    float: left;
                    transform: rotate(45deg);
                    box-shadow: -2px 2px 0 0 $color-border;
                }

                &:hover {
                    &:before {
                        box-shadow: -2px 2px 0 0 $color-main;
                    }
                }
            }
        }

        .content {
            margin-right: $nav;
            box-sizing: border-box;
            width: $ui-width - $nav;
            padding: 55px 125px 50px 0;

            h1 {
                & + ul {
                    line-height: 1.3em;
                    margin: 0 !important;
                    font-weight: bold;

                    a {
                        text-decoration: none;
                        &:hover {
                            text-decoration: underline;
                        }
                    }

                    li {
                        list-style: none !important;

                        & > ul {
                            font-weight: normal;
                            margin: 0 !important;
                            font-size: 12px;
                        }
                    }
                }
            }

            .page {
                margin: 0 auto;
                max-width: $ui-width;
                width: 100%;
                line-height: 1.8rem;
                font-size: 14px;

                a {
                    &:hover {
                        text-decoration: none;
                    }
                }

                h2 {
                    margin: 3.618rem 0 1.309rem 0;
                    font-size: 1.8rem;
                }

                h3 {
                    margin: 2.618rem 0 0.809rem 0;
                    font-size: 1.6rem;
                }

                h4 {
                    font-weight: bold;
                    margin: 2.618rem 0 0.809rem 0;
                    padding: 0;
                }

                strong {
                    font-weight: bold;
                }

                em {
                    font-style: italic;
                }

                abbr {
                    position: relative;
                    cursor: help;
                    &:hover {
                        color: $color-main;
                    }
                }

                ul {
                    margin: 1.2em 0;
                    li {
                        list-style: disc;
                        margin-left: 30px;
                    }
                }

                p {
                    margin: 10px 0 20px 0;
                }

                blockquote {
                    display: block;
                    box-sizing: border-box;
                    padding: 10px 20px;
                    margin: 20px 0;
                    font-style: italic;
                    font-size: 12px;
                    border-radius: 3px;
                    line-height: 1.6em;
                    box-shadow: 0 0 0 2px $color-extra-light-gray;
                    color: $color-light-black;

                    p {
                        margin: 0;
                    }

                    @mixin with-dark-bg {
                        a {
                            color: $color-white;
                        }
                        code {
                            background: rgba($color-dark-white, .1);
                            color: $color-dark-white;
                        }
                    }

                    &.quote {
                        &-notice {
                            box-shadow: none;
                            background: $color-red;
                            color: $color-white;
                            @include with-dark-bg;
                        }

                        &-tip {
                            box-shadow: none;
                            background: $color-blue;
                            color: $color-white;
                            @include with-dark-bg;
                        }
                    }
                }

                code {
                    color: darken(desaturate($color-main, 20%), 10%);
                    font-size: 12px;
                    white-space: nowrap;
                    background: $color-dark-white;
                }

                pre {
                    margin: 20px 0;
                    & > code {
                        white-space: pre;
                        padding: 10px 10px;
                        color: desaturate(darken($color-main, 25%), 30%);
                        box-shadow:
                            inset 2px 0 0 $color-extra-light-gray,
                            0 0 0 1px $color-extra-light-gray;
                        overflow: auto;
                        background: $color-white;
                    }
                }

                .error-404 {
                    width: 100%;
                    height: 100%;
                    position: fixed;
                    top: 0;
                    left: 0;

                    h1 {
                        margin-top: 100px;
                        text-align: center;
                    }

                    &:after {
                        content: '';
                        box-sizing: border-box;
                        width: 100%;
                        height: 355px;
                        pointer-events: none;
                        bottom: 0;
                        position: fixed;
                        background: url(/img/404.png) center bottom no-repeat !important;
                    }
                }
            }
        }
    }
</style>

<template>
    <section class="page-docs">
        <slot name="nav"></slot>

        <section class="content">
            <article class="page">
                <slot name="content"></slot>
            </article>
        </section>
    </section>
</template>

<script>
    import Prism from "kernel/Prism";

    export default {

    };
</script>
