<template>
    <div>
        <section class="navigation">
            <slot name="navigation"></slot>
        </section>

        <section class="docs">
            <aside class="docs-menu" :class="{active: menu}">
                <div class="docs-menu-body" id="docs-menu-body" :style="{top: menuTop}">
                    <slot name="menu"></slot>
                </div>

                <div class="docs-menu-bg" @click="toggleMenu"></div>
                <button class="docs-menu-open" @click="toggleMenu"></button>
            </aside>

            <article class="docs-content">
                <slot name="content"></slot>
            </article>
        </section>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                content: '',
                menu: false,
                menuTop: ''
            }
        },
        mounted() {
            let menu = document.getElementById('docs-menu-body');
            this.menuTop = `${(window.innerHeight / 10 * 9) - menu.clientHeight}px`;
        },
        methods: {
            toggleMenu() {
                this.menu = ! this.menu;

                if (this.menu) {
                    document.body.classList.add('fixed');
                } else {
                    document.body.classList.remove('fixed');
                }
            }
        }
    }
</script>

<style scoped lang="scss">
    @import "./../../sass/kernel";

    $aside-width: 300px;

    .navigation {
        margin: 0 auto;
        padding: 20px 0 30px 0;
        box-sizing: border-box;
        max-width: map-get($grid-breakpoints, xl);

        & /deep/ {
            .breadcrumbs {
                display: inline-block;
                padding: 0 15px 20px 15px;

                .breadcrumbs-delimiter,
                .breadcrumbs-link {
                    display: inline-block;
                    text-transform: uppercase;
                    font-size: 13px;
                }

                .breadcrumbs-delimiter {
                    pointer-events: none;
                    padding: 0;
                    background: url(/images/icons/arrow-up.svg) center center no-repeat;
                    background-size: 8px auto;
                    transform-origin: 50% 50%;
                    transform: rotate(90deg);
                    height: 100%;
                    width: 15px;
                }

                .breadcrumbs-last {
                    font-weight: bold;
                }
            }
        }
    }

    .docs {
        max-width: map-get($grid-breakpoints, xl);
        margin: 0 auto;
        display: flex;
        padding: 0 0 100px 0;
        background: inherit;

        &-menu {
            flex: $aside-width;
            width: $aside-width;
            max-width: $aside-width;
            min-width: $aside-width;
            box-sizing: border-box;
            padding: 0 30px 20px 15px;
            background: inherit;

            &-open {
                display: none;
            }

            &-body /deep/ {
                position: sticky;

                .menu-item {
                    display: block;
                    padding: 5px 0;
                    margin: 4px 0;
                    width: 100%;
                    color: $color-silver;
                    text-decoration: none;
                    cursor: pointer;
                    position: relative;
                    font-size: 15px;
                    line-height: 18px;
                    box-sizing: border-box;
                }

                & > .menu-item.menu-title {
                    cursor: default;
                    color: $color-text;
                    text-transform: uppercase;
                    letter-spacing: .1em;
                    margin: 20px 0 10px 0;
                    box-shadow: 0 1px 0 0 $color-border;
                    padding-left: 0;
                }

                .menu {
                    padding-left: 15px;
                    box-shadow: inset 1px 0 0 rgba($color-border, 0);
                    transition: box-shadow .3s $ui-animation-swift;

                    .menu-item {
                        font-size: 14px;
                        position: relative;
                        padding-left: 10px;
                        border-radius: 2px;

                        &:hover {
                            background: $color-extra-light-gray;
                            color: $color-text;
                        }

                        &.active {
                            cursor: default;
                            background: $color-main;
                            font-weight: bold;
                            color: #fff;
                            &:before {
                                color: #fff !important;
                            }
                        }
                    }
                }

                & > .menu {
                    padding-left: 0;
                }

                .menu-depth-2 .menu-item {
                    padding-top: 2px !important;
                    padding-bottom: 2px !important;
                    font-size: 12px;

                    &:before {
                        content: '·';
                        position: relative;
                        left: -5px;
                        font-weight: bold;
                        color: $color-border;
                    }

                    &:hover {
                        &:before {
                            color: $color-main;
                        }
                    }
                }
            }
        }

        &-content {
            flex: 1;
            box-sizing: border-box;
            max-width: map-get($grid-breakpoints, xl) - $aside-width;
            padding: 0 15px 0 0;

            & /deep/ {
                .table-of-contents {
                    display: flex;
                    padding-left: 15px;
                    flex-direction: column;

                    a {
                        display: inline-block;
                        font-size: 14px;
                        position: relative;
                        margin: 0 5px;

                        &:before {
                            content: '#';
                            color: $color-gray;
                            position: absolute;
                            left: -20px;
                            text-decoration: none;
                        }

                        &:hover {
                            &:before {
                                color: $color-main;
                            }
                        }

                        @for $i from 2 through 6 {
                            &.level-#{$i} {
                                left: #{20 * ($i - 1)}px;
                                @if $i == 1 {
                                    font-weight: bold;
                                    font-size: 15px;
                                    &:before {
                                        color: $color-border;
                                    }
                                }
                            }
                        }
                    }
                }

                h1 {
                    margin: 0 0 20px 0;
                }

                h1, h2, h3, h4, h5, h6 {
                    a {
                        margin-left: -5px;
                        text-decoration: none;
                        color: $color-description;
                        font-weight: 300;

                        &:before {
                            content: '#';
                            margin-right: 5px;
                        }

                        &:hover {
                            color: $color-main;
                        }
                    }
                }
            }
        }
    }

    @include media-breakpoint-down(sm) {
        .docs {
            &-menu {
                position: fixed;
                top: 0;
                left: -200vw;
                height: 100%;
                z-index: 100;
                transition: left .3s ease;

                .docs-menu-body {
                    height: 100%;
                    max-height: 100%;
                    min-width: 70vw;
                    overflow: scroll;
                    background: $color-main;
                    padding: 10px 25px 30px 40px;
                    box-shadow: $ui-box-shadow;
                    @include scrollbar();

                    & /deep/ {
                        .menu-item {
                            color: $color-border;
                        }

                        & > .menu-title {
                            color: rgba($color-border, .8);
                            box-shadow: 0 1px 0 rgba($color-border, .1);
                        }
                    }
                }

                .docs-menu-open {
                    outline: none;
                    position: fixed;
                    left: 20px;
                    bottom: 20px;
                    background: #fff url(/images/icons/menu.svg) center center no-repeat;
                    background-size: 2rem auto;
                    box-shadow: $ui-box-shadow;
                    border: none;
                    width: 5rem;
                    height: 5rem;
                    border-radius: 3px;
                    z-index: -1;
                    cursor: pointer;
                    display: block;
                    transition: transform .3s ease;
                    transform-origin: 50% 50%;
                }

                .docs-menu-bg {
                    transition: background .3s ease;
                    background: rgba(#000, 0);
                    position: fixed;
                    width: 100%;
                    height: 100%;
                    left: -1000000vw;
                    top: 0;
                    z-index: -10;
                }

                &.active {
                    left: -15px;

                    .docs-menu-bg {
                        background: rgba(#000, .4);
                        left: 0;
                    }

                    .docs-menu-open {
                        transform: scale(.96);
                    }
                }
            }

            &-content {
                padding: 0 15px;
            }
        }
    }
</style>
