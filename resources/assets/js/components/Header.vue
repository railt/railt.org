<template>
    <header class="header">
        <div class="container">
            <router-link to="/" class="logo"></router-link>

            <nav class="menu">
                <slot></slot>
            </nav>

            <aside class="aside-menu">
                <header-user></header-user>
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
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "./../../sass/kernel";

    .header {
        $height: $ui-height;

        height: $height;
        line-height: $height;
        box-shadow: $ui-box-shadow;
        padding: 14px 0;
        position: fixed;
        background: rgba(#fff, .9);
        order: 1;
        flex-shrink: 0;
        z-index: 99999;
        width: 100%;
        backdrop-filter: blur(3px);
        -webkit-backdrop-filter: blur(3px);

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
                text-decoration: none;
                background: url(./../../img/logo-dark.svg) 50% no-repeat;
                background-size: auto $height;
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
                    margin-left: 25px;
                }

                .dropdown {
                    width: 115px;
                }

                a {
                    color: $color;
                    transition: color .2s $ui-animation-swift;
                    text-decoration: none;
                    display: inline-block;
                    position: relative;

                    &:after {
                        content: '';
                        position: absolute;
                        width: 100%;
                        height: 4px;
                        bottom: -14px;
                        background: $color-main;
                        left: 0;
                        opacity: 0;
                        transform: scaleY(0);
                        transform-origin: 0 100%;
                        transition: opacity .3s $ui-animation-swift,
                        transform .5s $ui-animation-bounce;
                    }

                    &:hover {
                        color: $color-text;
                    }

                    &.router-link-active {
                        color: $color-main !important;
                        &:after {
                            transform: scaleY(1);
                            opacity: 1;
                        }
                    }
                }
            }

            .aside-menu {
                margin-left: auto;
                align-self: right;
                justify-self: right;
                box-shadow: -1px 0 0 0 $color-border;
            }
        }
    }
</style>
