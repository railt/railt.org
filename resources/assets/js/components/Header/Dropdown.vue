<template>
    <transition name="transition-dropdown">
        <section class="header-dropdown" v-if="visible">
            <slot></slot>
        </section>
    </transition>
</template>

<script>
    export default {
        props: {
            visible: {
                type: Boolean,
                default: false
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../../sass/kernel";

    .header-dropdown {
        position: absolute;
        background: #fff;
        box-shadow:
            inset 0 0 0 1px $color-border-secondary,
            $ui-box-shadow;
        border-radius: 0 0 3px 3px;
        min-width: 120px;
        width: 100%;
        top: 56px;
        right: 0;
        text-align: right;
        padding: 3px 1px;
        border-top: $color-main 4px solid;

        &:before {
            content: '';
            right: 10%;
            width: 0;
            height: 0;
            border: transparent 5px solid;
            border-bottom-color: $color-main;
            position: absolute;
            top: -14px;
        }

        & /deep/ {

            hr {
                display: block;
                border: none;
                width: 100%;
                height: 1px;
                margin: 3px 0;
                padding: 0;
                background: $color-border-secondary;
            }

            a {
                display: block;
                width: 100%;
                box-sizing: border-box;
                padding: 0 15px;
                height: $ui-height;
                line-height: $ui-height;
                color: $color-text;
                text-decoration: none;

                &:hover {
                    color: $color-main;
                    background: $color-bg;
                }
            }
        }
    }
</style>
