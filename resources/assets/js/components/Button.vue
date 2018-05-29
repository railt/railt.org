<template>
    <a :href="href" :target="target" class="button" @click.stop="click">
        <slot></slot>
    </a>
</template>

<script>
    export default {
        props: {
            href: {
                type: String,
                default: '#'
            },
            target: {
                type: String,
                default: '_self'
            }
        },
        methods: {
            click(e) {
                this.$emit('click', e)
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "./../../sass/kernel";

    .button {
        height: $ui-height;
        line-height: $ui-height - 2px;
        display: flex;
        outline: none;
        padding: 0 15px;
        border-radius: 2px;
        background: $color-main;
        color: #fff !important;
        transition: .2s $ui-animation-swift;
        text-decoration: none;
        cursor: pointer;

        svg {
            width: 20px;
            height: 20px;
            float: left;
            margin: 6px 8px 6px -6px;
            fill: #fff;
        }

        &:hover {
            background: lighten($color-main, 10%);
            color: #fff !important;
        }

        &:active {
            box-shadow: inset 0 1px 2px rgba(#000, .5) !important;
        }
    }
</style>
