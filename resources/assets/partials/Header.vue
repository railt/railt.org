<style lang="scss" scoped>
    @import "kernel";

    header {
        width: 100%;
        height: 48px;
        top: 0;
        left: 0;
        box-sizing: border-box;
        position: fixed;
        background: rgba($color-white, .98);
        box-shadow: 0 1px 0 $color-border;
        z-index: 97;

        .header-content {
            width: 100%;
            max-width: $ui-width;
            box-sizing: border-box;
            padding: 0 20px;
            margin: 0 auto;
            display: flex;
            flex-wrap: nowrap;
            height: 100%;
            justify-content: space-between;
            align-items: center;
        }

        nav {
            display: flex;
            justify-content: flex-start;
            align-items: center;

            a {
                text-transform: uppercase;
                margin: 0 20px 0 0;
                font-size: 13px;
                display: inline-block;
                text-decoration: none;

                img {
                    display: block;
                    height: 38px;
                }
            }
        }

        .language {
            & /deep/ .current,
            & /deep/ .dropdown,
            & /deep/ .value {
                min-width: 60px !important;
            }
        }
    }
</style>

<template>
    <header>
        <section class="header-content">
            <nav>
                <slot></slot>
            </nav>

            <ui-select class="language" placeholder="Язык">
                <slot name="lang"></slot>
            </ui-select>
        </section>
    </header>
</template>

<script>
    export default {
        mounted: function () {
            this.$nextTick(() => {
                this.$on('select', value => {
                    document.location = `/${value}`;
                })
            });
        },
    }
</script>
