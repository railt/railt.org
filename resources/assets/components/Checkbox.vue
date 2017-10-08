<style lang="scss" scoped>
    @import "kernel";

    $size: $ui-min-height;

    .checkbox {
        @include component;
        float: left;
        min-height: $size;
        line-height: $size;

        label {
            display: flex;
            cursor: pointer;

            &:hover .icon {
                box-shadow: 0 0 0 1px $color-border-hover;
            }
        }

        .icon {
            margin: 0 10px 0 0;
            width: $size;
            min-width: $size;
            height: $size;
            line-height: $size;
            position: relative;
            border-radius: 1px;
            background: $color-white;
            box-shadow: 0 0 0 1px $color-border;

            input {
                display: block;
                z-index: 3;
                visibility: hidden;
                width: 100%;
                height: 100%;
                position: absolute;
            }

            &:after {
                width: inherit;
                height: inherit;
                // TODO: Move to external svg file (remove duplication for disabled state)
                background: url("data:image/svg+xml,%3Csvg style='fill: %23f4645f' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 488.878 488.878'%3E%3Cpolygon points='143.294,340.058 50.837,247.602 0,298.439 122.009,420.447 122.149,420.306 144.423,442.58 488.878,98.123 437.055,46.298'%3E%3C/polygon%3E%3C/svg%3E%0A") center no-repeat;
                background-size: 70%;
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                opacity: 0;
                transform: scale(.1) translateY(6px) rotate(35deg);
                transition:
                    transform .4s $ui-animation-bounce,
                    opacity .2s ease,
                    color .2s ease;
            }

            &.checked {
                box-shadow: 0 0 0 1px $color-main !important;

                &:after {
                    transform: scale(1) translateY(0) rotate(0deg);
                    color: $color-main;
                    opacity: 1;
                    transition:
                        transform .2s $ui-animation-bounce,
                        opacity .1s ease,
                        color .1s ease;
                }
            }
        }

        .icon,
        .description {
            min-height: $size;
            line-height: $size;
            display: inline-block;
            user-select: none;
        }

        .disabled,
        .disabled:hover {
            cursor: default;
            .icon {
                box-shadow: 0 0 0 1px $color-disabled-border !important;
                background: $color-disabled-bg !important;

                &:after {
                    background-image: url("data:image/svg+xml,%3Csvg style='fill: %2399a9bf' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 488.878 488.878'%3E%3Cpolygon points='143.294,340.058 50.837,247.602 0,298.439 122.009,420.447 122.149,420.306 144.423,442.58 488.878,98.123 437.055,46.298'%3E%3C/polygon%3E%3C/svg%3E%0A");
                }
            }
            input {
                cursor: default;
            }
            .description {
                color: $color-disabled-text !important;
            }
        }
    }
</style>

<template>
    <div class="checkbox">
        <ui-tooltip v-if="title">{{ title }}</ui-tooltip>

        <label :class="{ disabled: disabled }">
            <div class="icon"
                 :class="{checked: checkedValue}"
                 @click="onChange">
                <input type="checkbox"
                       v-model="checkedValue"
                       :name="name"
                       :disabled="disabled" />
            </div>

            <div class="description">
                <slot></slot>
            </div>
        </label>
    </div>
</template>

<script>
    import Props from "kernel/Props";

    export default {
        model: {
            prop: 'checkedValue',
            event: 'change'
        },
        props: {
            ...Props,
            checked: {
                type: Boolean,
                default: false
            }
        },
        data() {
            return {
                checkedValue: this.checked
            };
        },
        methods: {
            onChange() {
                this.$emit('change', this.checkedValue);
            }
        }
    }
</script>
