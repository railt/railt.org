<template>
    <section class="input" :data-view="view" :class="{
        active: isActive,
        focus: isFocus,
        disabled: disabled
    }">
        <app-tooltip v-if="title">{{ title }}</app-tooltip>

        <div class="container">
            <span class="placeholder" v-if="placeholder">
                {{ placeholder }}
            </span>

            <transition name="fade">
                <app-loading v-if="loading"></app-loading>
            </transition>

            <v-input v-model="internalValue" :initial-value="value"
                     @input="onInput"
                     @blur="onBlur"
                     @focus="onFocus"
                     @keyup="onKeyUp"
                     @keydown="onKeyDown"
                     @keypress="onKeyPress"
                     :name="name"
                     :tag="type"
                     :disabled="disabled"></v-input>

            <div class="icons">
                <slot name="icons"></slot>
            </div>
        </div>
    </section>
</template>

<script>
    import Enum from "../kernel/Enum";
    import Props from "../kernel/Props";

    export default {
        model: {
            prop: 'internalValue',
            event: 'input'
        },
        props: {
            ...Props,
            /**
             * Input name
             */
            type: Enum(['tel', 'url', 'text', 'email', 'search', 'password'], 'text'),

            /**
             * Input style
             */
            view: Enum(['primary', 'flat'], 'primary'),

            /**
             * Text placeholder
             */
            placeholder: {
                type: String,
                default: ''
            },

            /**
             * Is initial state is focused
             */
            focus: {
                type: Boolean,
                default: false
            },

            /**
             *  Input type text
             */
            value: {
                type: String,
                default: '',
            }
        },
        data() {
            return {
                /**
                 * Input has focus
                 */
                isFocus:      false,

                /**
                 * Input has value
                 */
                isActive:     false,

                /**
                 * Input was changed or user interacted with this field
                 */
                wasChanged:   false,

                /**
                 * Real input value (Memory separation with "props: value")
                 */
                internalValue:    this.value,

                /**
                 * Input DOM element
                 */
                inputNode:        null
            };
        },
        mounted() {
            if (this.value) {
                this.isActive = true;
            }

            this.$nextTick(() => {
                this.inputNode = this.$el.querySelector('input');

                if (this.focus) {
                    this.inputNode.focus();
                }
            });

        },
        methods: {
            onKeyUp(event) {
                this.$emit('keyup', event);
            },
            onKeyDown(event) {
                this.$emit('keydown', event);
            },
            onKeyPress(event) {
                this.$emit('keypress', event);
            },
            onFocus(event) {
                this.$emit('focus', event);

                this.isFocus = true;
            },
            onBlur(event) {
                this.$emit('blur', event);

                if (this.internalValue.trim().length !== this.internalValue.length) {
                    this.internalValue = this.internalValue.trim();
                }

                this.isFocus = false;
                this.isActive = this.internalValue.length !== 0;
                this.wasChanged = true;
            },
            onInput(event) {
                this.$emit('input', this.internalValue);

                this.isActive = this.internalValue.trim().length !== 0;
            }
        }
    }
</script>

<style scoped lang="scss">
    @import "./../../sass/kernel";

    .input {
        height: $ui-height;
        line-height: $ui-height;
        @include component();
        display: block;

        .container {
            height: inherit;
            line-height: inherit;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: nowrap;
            background: $color-white;
            position: relative;
            transition:
                color .3s $ui-animation-swift,
                box-shadow .3s $ui-animation-swift,
                background .3s $ui-animation-swift;
            will-change: color, box-shadow, background;
            box-shadow: 0 0 0 2px $color-border;
            border-radius: 2px;
            z-index: 1;

            &:hover {
                box-shadow: 0 0 0 2px $color-border-hover;
            }

            & /deep/ .loader {
                left: 0;
                box-shadow: 0 0 0 2px $color-border;
                border-color: $color-main;
            }
        }

        input {
            display: block;
            float: left;
            width: 100%;
            box-sizing: border-box;
            padding: 0 0 0 $ui-padding;
            outline: none;
            border: none;
            background: none;
            margin: 0;
            appearance: textfield;
            color: $color-text;
            transition: color .2s $ui-animation-swift;
            position: relative;
            z-index: 2;
            height: inherit;
            line-height: inherit;
            font: {
                size: $font-size;
                family: $font-family;
            }
        }

        .placeholder {
            top: 0;
            left: $ui-padding;
            font-size: $font-size;
            height: inherit;
            line-height: inherit;
            user-select: none;
            position: absolute;
            pointer-events: none;
            will-change: transform, color;
            color: $color-description;
            transform: translate(0, 0) scale(1);
            transform-origin: 0 50%;
            opacity: 1;
            transition:
                opacity .3s $ui-animation-swift .2s,
                transform .3s $ui-animation-swift .2s,
                color .3s $ui-animation-swift .2s;
            z-index: 3;
        }

        .icons {
            position: relative;
            height: inherit;
            padding: 0 0 0 10px;
            display: flex;
            border-radius: 0 3px 3px 0;
            justify-content: flex-end;
            flex-wrap: nowrap;
            align-items: center;
            float: right;
            z-index: 3;
            color: $color-description;

            & > * {
                margin-right: 10px !important;
            }
        }

        &.disabled {
            .container {
                background: $color-disabled-bg !important;
                box-shadow: 0 0 0 2px $color-disabled-border !important;
                transition:
                    background .3s $ui-animation-swift,
                    box-shadow .1s $ui-animation-swift;
            }

            input,
            .placeholder {
                color: $color-disabled-body !important;
                transition: color .3s $ui-animation-swift;
            }
        }

        &.active {
            .placeholder {
                opacity: 0;
                color: $color-text;
                transform: translate($ui-padding, 0);
                transition:
                    transform .3s cubic-bezier(0.245, 1.600, 0.560, 0.925),
                    color .3s $ui-animation-swift,
                    opacity .3s $ui-animation-swift;
            }
        }

        &.focus {
            z-index: 5;

            .container {
                transition:
                    box-shadow .1s $ui-animation-swift;
                    box-shadow: 0 0 0 2px $color-main;
            }
        }

        &[data-view="flat"] {
            .container {
                box-shadow: 0 0 0 2px rgba($color-bg, 0);
                color: $color-text;
                background: $color-white;

                & /deep/ .loader {
                    box-shadow: 0 0 0 2px rgba($color-border, .3);
                    background: rgba($color-border, .3);
                }

                &:hover {
                    box-shadow: 0 0 0 2px $color-bg;
                    background: $color-bg;
                }
            }

            &.focus {
                .container {
                    transition: none !important;
                    box-shadow: 0 0 0 2px $color-border-hover;
                    background: $color-bg;
                }
            }

            &[disabled],
            &.disabled {
                .container {
                    cursor: default;
                    box-shadow: 0 0 0 2px rgba($color-disabled-bg, 0) !important;
                    background: rgba($color-disabled-bg, 0) !important;
                }
                input,
                .placeholder {
                    color: $color-disabled-body;
                }
            }
        }
    }
</style>
