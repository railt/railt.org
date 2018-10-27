<template>
    <header>
        <div class="header-padding" :class="{scrolled: scrolled}"></div>
        <div class="header" :class="{sticky: scrolled}">
            <div class="header-bg"></div>

            <div class="header-container">
                <aside>
                    <slot name="logo"></slot>
                </aside>
                <nav class="menu">
                    <slot name="nav"></slot>
                </nav>
            </div>
        </div>
    </header>
</template>

<script>
    export default {
        data() {
            return {
                scrolled: false
            }
        },
        methods: {
            handleScroll() {
                requestAnimationFrame(() => {
                    this.scrolled = window.scrollY > 120;
                });
            }
        },
        created () {
            window.addEventListener('scroll', this.handleScroll);
        },
        destroyed () {
            window.removeEventListener('scroll', this.handleScroll);
        }
    }
</script>

<style scoped lang="scss">
    @import "./../../sass/kernel";

    $height: 42px;

    .header-padding {
        height: $height + 40px;
        transition: height .3s ease;
        .scrolled {
            height: $height + 10px;
        }
    }

    .header {
        top: 0;
        z-index: 90;
        position: fixed;
        padding: 20px 0;
        height: $height;
        width: 100%;
        display: block;
        transition:
            padding .3s ease,
            box-shadow .3s ease;

        .header-bg {
            top: 0;
            left: 0;
            z-index: -1;
            width: 100%;
            height: 100%;
            position: absolute;
            backdrop-filter: blur(3px);
            background: rgba(#fff, .9);
            box-shadow: 0 1px 0 $color-border;
        }

        .header-container {
            max-width: map-get($grid-breakpoints, xl);
            margin: 0 auto;
            box-sizing: border-box;
            padding: 0 15px;
            display: flex;
            height: $height;
            line-height: $height;

            aside {
                & /deep/ {
                    a {
                        text-decoration: none !important;
                        height: $height;
                        line-height: $height;
                        display: flex;
                        align-items: center;
                        justify-content: flex-start;
                        text-transform: uppercase;

                        img {
                            display: block;
                            height: $height - 10px;
                            margin: 5px 0;
                        }

                        span {
                            padding: 0 10px;
                            margin-left: 10px;
                            border-radius: 3px;
                            font-size: 12px;
                            font-weight: bold;
                            background: $color-main;
                            color: #fff;
                            height: 24px;
                            line-height: 24px;
                            display: inline-block;
                            pointer-events: none;
                            opacity: 1;
                            max-width: 120px;
                            transition: .3s ease;
                            overflow: hidden;
                        }

                        @include media-breakpoint-down(sm) {
                            span {
                                opacity: 0;
                                max-width: 0;
                            }
                        }
                    }
                }
            }

            .menu {
                flex: 1;
                display: flex;
                align-items: center;
                justify-content: flex-end;

                & /deep/ {
                    & > a {
                        text-transform: uppercase;
                        font-size: 14px;
                        color: $color-description;
                        margin: 0 10px;
                        position: relative;
                        transition: color .3s ease, margin .3s ease;
                        will-change: color, margin;

                        @include media-breakpoint-down(sm) {
                            margin: 0 5px;
                        }

                        &:after {
                            content: '';
                            height: 2px;
                            width: 100%;
                            background: $color-main;
                            position: absolute;
                            left: 0;
                            opacity: 0;
                            transform: scaleX(0);
                            transition:
                                transform .3s ease,
                                opacity .3s ease,
                                bottom .3s ease;
                            will-change: transform, opacity, bottom;
                            transform-origin: 100% 0;
                            bottom: -21px;
                        }

                        &:hover {
                            text-decoration: none;
                            color: $color-link;
                            &:after {
                                transform-origin: 0 0;
                                opacity: 1;
                                transform: scaleX(1);
                            }
                        }

                        &.active {
                            color: $color-text;
                            font-weight: bold;
                            cursor: default;
                            &:after {
                                opacity: 1;
                                transform: scaleX(1);
                                background: $color-text;
                            }
                        }
                    }

                    .language-dropdown {
                        margin-left: 20px;
                    }
                }
            }
        }

        &.sticky {
            padding: 5px 0;

            .header-bg {
                box-shadow: 0 1px 0 rgba($color-border, 0);
            }

            .menu /deep/ {
                & > a {
                    margin-top: 0;
                    margin-bottom: 0;
                    &:after {
                        bottom: -5px !important;
                    }
                }
            }
        }
    }
</style>
