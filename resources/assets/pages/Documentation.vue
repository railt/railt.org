<style scoped lang="scss">
    @import "kernel";

    .section {
        padding-top: 0;
    }

    .docs {
        $nav: 250px;
        position: relative;
        box-sizing: border-box;
        padding-left: 250px;

        &:after {
            display: none;
        }

        .menu-toggle {
            display: none;
            text-transform: uppercase;

            i {
                margin-right: 5px;
            }
        }

        & &-menu {
            position: absolute;
            transition:
                left .5s ease,
                opacity .5s ease;
            left: 0;
            top: 0;
            width: $nav;
            margin-top: 48px;
            min-height: 100vh;
            box-sizing: border-box;
            padding: 0;
            font-size: 14px;
            box-shadow: 1px 0 0 $color-border-lighten;
            background: #fff;
            opacity: 1;

            .menu-toggle {
                float: right;
                font-size: 24px !important;
            }

            .menu {
                padding: 15px 20px 5px 20px;

                & > ul {
                    padding: 0;
                    margin: 0;
                    & > li > ul {
                        padding-left: 10px;
                    }
                }

                li {
                    list-style: none;
                }

                h1, h2, h3, h4, h5, h6 {
                    font-size: 14px;
                    font-weight: normal;
                    text-transform: uppercase;
                    letter-spacing: .1em;
                }

                ul {
                    a {
                        font-size: 13px;
                        color: $color-text-secondary;
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
                }
            }
        }

        & &-content {
            box-sizing: border-box;
            padding: 55px 0 100px 75px;
            line-height: 28px;


            h2 {
                margin: 90px 0 10px 0;
            }

            p {
                margin: 2em 0;
            }

            ul {
                p {
                    margin: 0;
                }
            }

            & /deep/ {
                a[href^="http:"],
                a[href^="https:"] {
                    &:after {
                        @include fa-icon;
                        content: $fa-var-external-link;
                        position: relative;
                        top: -4px;
                        margin-left: 3px;
                        font-size: 9px;
                    }
                }
            }

            blockquote {
                border-radius: 2px;
                box-shadow: 0 0 0 2px $color-border-regular;
                margin: 0;
                padding: 10px 20px;
                font-size: 13px;
                font-style: italic;
                line-height: 20px;
                color: $color-text-secondary;

                p {
                    margin: 0;
                    padding: 0;
                }

                &.tip {
                    background: $color-blue;
                    box-shadow: 0 0 0 2px darken($color-blue, 10%);
                    color: $color-border-lighten;
                    a {
                        color: #fff;
                    }
                }

                &.note {
                    background: desaturate($color-red, 15%);
                    box-shadow: 0 0 0 2px darken($color-red, 10%);
                    color: $color-border-lighten;
                    a {
                        color: #fff;
                    }
                }
            }

            .breadcrumbs {
                color: $color-text-secondary;
                font-size: 14px;

                .menu-toggle {
                    float: left;
                    margin-right: 15px;
                }

                .delimiter {
                    color: $color-text-placeholder;
                    margin: 0 8px;
                }
            }
        }

        @at-root {
            @include media-breakpoint-down(md) {
                & {
                    padding: 0;
                }

                & &-menu {
                    height: 100%;
                    width: 100%;
                    padding: 15px 20px;

                    .menu-toggle {
                        display: block;
                    }

                    &.hidden {
                        left: -100vw;
                        opacity: 0;
                        .menu-toggle {
                            display: none;
                        }
                    }
                }

                & &-content {
                    .menu-toggle {
                        display: block;
                    }

                    padding: 55px 25px 100px 25px;
                }
            }

            @include media-breakpoint-down(sm) {
                & &-content {
                    width: 100% !important;
                }
            }
        }
    }
</style>

<template>
    <section class="section">
        <div class="content docs">
            <aside class="docs-menu" :class="{'hidden': !menu}">
                <nav class="menu">
                    <a href="#" @click="toggleMenu" class="menu-toggle">
                        <i class="el-icon-close"></i>
                    </a>

                    <slot name="menu"></slot>
                </nav>
            </aside>

            <section class="docs-content">
                <nav class="breadcrumbs">
                    <a href="#" @click="toggleMenu" class="menu-toggle">
                        <i class="el-icon-menu"></i>Меню
                    </a>

                    <slot name="breadcrumbs"></slot>
                </nav>

                <slot name="content"></slot>
            </section>
        </div>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                menu: false
            }
        },
        methods: {
            toggleMenu() {
                //
                this.menu = !this.menu;
            }
        }
    }
</script>
