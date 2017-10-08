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
            top: 68px;
            right: 0;
            min-height: 100vh;
            box-sizing: border-box;
            padding: 10px 20px;
            font-size: 14px;

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
                color: $color-text;
                text-decoration: none;
                &:hover {
                    color: $color-main;
                    text-decoration: underline;
                }
            }

            ul {
                margin: 1.2em 0;
                line-height: 1.7rem;
                li {
                    list-style: none;
                    margin-left: 10px;
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
                }

                h3 {
                    margin: 2.618rem 0 0.809rem 0;
                }

                h4 {
                    font-weight: bold;
                    margin: 2.618rem 0 0.809rem 0;
                    padding: 0;
                }

                ul {
                    margin: 1.2em 0;
                    li {
                        list-style: disc;
                        margin-left: 30px;
                    }
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
                        border-radius: 3px;
                        white-space: pre;
                        padding: 20px 30px;
                        color: desaturate(darken($color-main, 25%), 30%);
                        box-shadow: 0 0 0 2px $color-extra-light-gray;
                        overflow: auto;
                    }
                }

                .error-404 {
                    width: 100%;
                    height: 100%;
                    position: relative;

                    h1 {
                        text-align: center;
                    }

                    &:after {
                        content: '';
                        box-sizing: border-box;
                        width: 100%;
                        height: 355px;
                        pointer-events: none;
                        left: -$nav;
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
        <aside class="nav">
            <slot name="nav"></slot>
        </aside>
        <section class="content">
            <article class="page">
                <slot name="content"></slot>
            </article>
        </section>
    </section>
</template>

<script>
    export default {

    };
</script>
