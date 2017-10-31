<style lang="scss" scoped>
    @import "kernel";

    .button {
        @include component;

        a, button {
            height: $ui-height;
            line-height: $ui-height + 2px;
            display: block;
            position: relative;
            float: left;
            width: 100%;
            text-align: center;
            box-sizing: border-box;
            padding: 0 $ui-padding;
            outline: none;
            cursor: pointer;
            border: none;
            background: none;
            text-decoration: none;
            color: $color-white;
            margin: 0;
            border-radius: 2px;
            font-weight: bold;
            text-transform: uppercase;
            background: $color-main;
            letter-spacing: 1px;
            white-space: nowrap;
            text-overflow: ellipsis;
            font: {
                size: $font-size - 1px;
                family: $font-family;
            }
            transition:
                color .3s $ui-animation-swift,
                background .3s $ui-animation-swift;
            will-change: color, background;

            &[href="#"] {
                cursor: default;
            }

            &:hover {
                background: $color-main-hover;
            }

            &:active {
                transition: none !important;
                background: desaturate(darken($color-main, 10%), 30%);
            }

            &[disabled],
            &:disabled {
                cursor: default;
                background: $color-disabled-filled-bg;
                color: $color-disabled-filled-body;
            }

        }

        & /deep/ .loader {
            border-color: $color-main;
            .spinner {
                box-shadow: none;
            }
        }

        &[data-view="simple"] {
            a, button {
                border-radius: 3px;
                color: $color-text;
                background: $color-white;

                &:hover {
                    background: $color-bg;
                }

                &:active {
                    transition: none !important;
                }

                &[disabled],
                &:disabled {
                    cursor: default;
                    background: $color-disabled-bg;
                    color: $color-disabled-body;
                }
            }
        }

        &[data-view="flat"] {
            a, button {
                border-radius: 3px;
                color: $color-text;
                background: $color-white;

                &:hover {
                    background: $color-bg;
                }

                &:active {
                    transition: none !important;
                }

                &[disabled],
                &:disabled {
                    cursor: default;
                    background: rgba($color-disabled-bg, 0);
                    color: $color-disabled-body;
                }
            }
        }
    }
</style>

<template>
    <div class="button" :data-view="view">
        <ui-loading v-if="loading"></ui-loading>

        <ui-tooltip v-if="title">{{ title }}</ui-tooltip>

        <template v-if="href">
            <a :href="href || '#'"
               :disabled="disabled"
               :target="'_' + target"
               @click="onClick"
            >
                <slot></slot>
            </a>
        </template>
        <template v-else="href">
            <button :disabled="disabled"
                    :name="name"
                    @click="onClick">
                <slot></slot>
            </button>
        </template>
    </div>
</template>

<script>
    import Enum from "kernel/Enum";
    import Props from "kernel/Props";

    export default {
        props: {
            ...Props,
            /**
             * Button type
             */
            view: Enum([
                'primary',
                'simple',
                'flat'
            ], 'primary'),

            /**
             * Button href target
             */
            target: Enum([
                'blank',
                'parent',
                'self',
                'top',
            ], 'self'),

            /**
             * Button href
             */
            href: {
                type: String,
                default: null
            },
        },
        methods: {
            onClick(event) {
                this.$parent.$emit('click', event);
                this.$emit('click', event);
            }
        }
    }
</script>
