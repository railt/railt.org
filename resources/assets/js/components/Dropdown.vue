<template>
    <div class="dropdown">
        <button v-on:click.stop.prevent="active = !active" class="button" :class="{active: active}">
            <slot name="title"></slot>
        </button>
        <div class="dropdown-content" :class="{active: active}">
            <slot name="selections"></slot>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                active: false
            }
        },
        mounted() {
            document.body.addEventListener('click', () => {
                this.active = false;
            }, false);
        }
    }
</script>

<style scoped lang="scss">
    @import "./../../sass/kernel";

    $color: rgba($color-bg-dark, .98);

    .dropdown {
        position: relative;

        .button {
            margin: 0 auto;
            width: 90px;
            display: flex;
            background: none;
            align-items: center;
            padding: 0 40px 0 15px;
            box-shadow: 0 0 0 2px $color-border;
            transition: .3s $ui-animation-swift;
            font-weight: bold;
            color: $color-description;

            &:after {
                top: 0;
                right: 0;
                content: '';
                width: 32px;
                height: 32px;
                display: block;
                line-height: 32px;
                position: absolute;
                pointer-events: none;
                transform: rotate(0);
                transition: transform .3s $ui-animation-swift;
                background: url(/images/icons/arrow-down.svg) center center no-repeat;
                background-size: 10px 10px;
            }

            img {
                width: 16px;
                height: auto;
                display: block;
                margin-right: 10px;
            }

            &:hover {
                color: $color-text;
                box-shadow: 0 0 0 2px $color-border-hover;
            }

            &.active {
                color: $color-text;
                background: rgba(#fff, .7);
                box-shadow: 0 0 0 2px $color-main;

                &:after {
                    transform: rotate(180deg);
                }
            }
        }

        .dropdown-content {
            right: -2px;
            opacity: 0;
            z-index: 9;
            top: 45px;
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
            min-width: 300px;
            padding: 10px 15px;
            border-radius: 3px;
            position: absolute;
            pointer-events: none;
            transition: .3s ease;
            background: $color;
            transform: translateY(25px) scale(.95);
            box-shadow: 0 2px 10px rgba(#000, .3);

            &:after {
                content: '';
                right: 40px;
                position: absolute;
                pointer-events: none;
                top: -13px;
                display: block;
                border: transparent 6px solid;
                border-bottom-color: $color;
                width: 1px;
                height: 1px;
            }

            .item-cell {
                flex: 50%;
                width: 50%;
                max-width: 50%;
                margin: 5px 0;
                padding: 5px;
                min-width: 150px;
                box-sizing: border-box;
            }

            a {
                padding: 3px;
                display: block;
                border-radius: 3px;
                text-align: center;
                white-space: nowrap;
                color: rgba(#fff, .9);

                &:hover {
                    color: #fff;
                    text-decoration: none;
                    background: rgba(#fff, .2);
                }

                &.active {
                    cursor: default;
                    background: #fff;
                    font-weight: bold;
                    color: $color-text;
                    text-decoration: none;
                }
            }

            &.active {
                opacity: 1;
                pointer-events: all;
                transform: translateY(0) scale(1);
            }
        }
    }
</style>
