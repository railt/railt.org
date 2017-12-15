<style scoped lang="scss">
    @import "kernel";

    header {
        width: 100%;
        height: 44px;
        line-height: 44px;
        padding: 20px 0;
        position: absolute;
        z-index: 3;

        .content {
            padding: 0 20px;

            .logo {
                width: 115px;
                height: 44px;
                display: block;
                text-decoration: none;
                background: url(/img/logo-dark.svg) center center no-repeat;
                background-size: 115px 44px;
                float: left;
            }

            @at-root {
                @include media-breakpoint-down(sm) {
                    & > .logo {
                        display: none !important;
                    }
                }
            }
        }

        nav {
            height: 44px;
            float: right;
            display: flex;
            padding: 0 1px;
            flex-wrap: wrap;
            line-height: 44px;
            overflow-x: hidden;

            /deep/ {
                & > a,
                & > .el-dropdown {
                    height: 34px;
                    line-height: 34px;
                    margin: 5px 0 5px 20px;
                    display: block;
                }

                & > a,
                .el-dropdown-link {
                    cursor: pointer;
                    font-size: 14px;
                    font-weight: bold;
                    text-transform: uppercase;
                    color: $color-text-placeholder;

                    &:hover {
                        text-decoration: none;
                        transition: color .3s ease;
                        color: $color-text-secondary;
                    }
                }

                .console {
                    border-radius: 2px;
                    box-shadow: inset 0 0 1px 0 rgba(#fff, .1);
                    padding: 0 15px;
                    background: rgba(#fff, .1);

                    &:hover {
                        box-shadow: inset 0 0 1px 0 rgba(#fff, .3);
                        background: rgba(#fff, .2);
                        transition:
                            background .3s ease,
                            box-shadow .3s ease,
                            color .3s ease;
                    }
                }
            }
        }
    }

    .header-padding {
        width: 100%;
        height: 84px;
        display: block;
    }
</style>

<template>
    <div>
        <header>
            <section class="content">
                <template v-if="logo">
                    <a href="/" class="logo"></a>
                </template>

                <nav class="menu">
                    <slot></slot>
                </nav>
            </section>
        </header>
        <div v-if="logo" class="header-padding"></div>
    </div>
</template>

<script>
    export default {
        props: {
            logo: {
                type: Boolean,
                default: false
            }
        }
    }
</script>

