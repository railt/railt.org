<template>
    <header class="header" :class="{fixed: scrolled}">
        <div class="container">
            <router-link to="/" class="logo"></router-link>

            <nav class="menu">
                <slot></slot>
            </nav>

            <aside class="aside-menu">
                <header-user></header-user>
                <slot name="aside"></slot>
            </aside>
        </div>
    </header>
</template>

<script>
    import User from "./Header/User";

    export default {
        components: {
            'header-user': User
        },
        data() {
            return {
                scrolled: false
            }
        },
        methods: {
            handleScroll() {
                this.scrolled = window.scrollY > 0;
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

<style lang="scss" scoped>
    @import "./../../sass/kernel";

    .header {
        $height: $ui-height;

        height: $height;
        line-height: $height;
        box-shadow: 0 0 0 rgba($color-bg-dark, 0);
        padding: 14px 0;
        position: fixed;
        background: rgba(#fff, .9);
        order: 1;
        flex-shrink: 0;
        z-index: 99999;
        width: 100%;
        transition:
            box-shadow .5s ease,
            padding .5s ease;

        &.fixed {
            box-shadow: $ui-box-shadow;
        }

        .container {
            display: flex;
            justify-content: start;
            max-width: $ui-width;
            margin: 0 auto;
            height: inherit;
            line-height: inherit;
            box-sizing: border-box;
            padding: 0 20px;

            .logo {
                width: 115px;
                height: inherit;
                display: block;
                position: relative;
                text-decoration: none;
                background: url(./../../img/logo-dark.svg) right 50% no-repeat;
                background-size: auto $height;
                transition: width .5s ease;

                &.router-link-exact-active {
                    width: 0;
                }
            }

            .aside-menu,
            .menu {
                $color: $color-text-secondary;

                height: inherit;
                line-height: inherit;
                display: flex;
                flex-wrap: nowrap;
                font-size: 13px;

                & > * {
                    margin: 0 10px 0 35px;
                }

                .dropdown {
                    width: 115px;

                    &:after {
                        top: 9px;
                    }
                }

                a {
                    color: $color;
                    transition: color .2s $ui-animation-swift;
                    text-decoration: none;
                    display: inline-block;
                    position: relative;
                    text-transform: uppercase;

                    &:after {
                        content: '';
                        position: absolute;
                        width: 100%;
                        height: 2px;
                        bottom: -14px;
                        background: $color-main;
                        left: 0;
                        opacity: 0;
                        transform: scaleX(0);
                        transform-origin: 100% 100%;
                        transition:
                            transform .5s $ui-animation-swift,
                            opacity .5s $ui-animation-swift;
                    }

                    &:hover {
                        color: $color-text-primary;
                    }

                    &.router-link-active {
                        color: $color-main !important;
                        &:after {
                            transform-origin: 0 100%;
                            transform: scaleX(1);
                            opacity: 1;
                        }
                    }
                }
            }

            .aside-menu {
                margin-left: auto;
                align-self: right;
                justify-self: right;
            }

            .menu {
                display: flex;

                img {
                    display: inline-block !important;
                    height: 20px;
                    position: relative;
                    top: 5px;
                    margin-right: 3px;
                }
            }
        }
    }
</style>
