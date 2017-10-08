<style lang="scss" scoped>
    @import "kernel";

    .option {
        @include component;
        margin: 2px 0;
        display: block;

        .value {
            min-width: 100px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            cursor: pointer;
            height: $ui-height - 4px;
            line-height: $ui-height - 4px;
            color: $color-text;
            padding: 0 $ui-padding;
            display: block;

            &:hover {
                background: $color-bg;
                color: $color-black;
            }
        }

        &.disabled .value {
            color: $color-border-hover;
            background: $color-white;
            cursor: default;
        }
    }
</style>

<template>
    <article class="option" @click="click" :class="{disabled: disabled}" v-if="visible">
        <ui-loading v-if="loading"></ui-loading>
        <ui-tooltip v-if="title">{{ title }}</ui-tooltip>

        <span class="value">
            <slot></slot>
        </span>
    </article>
</template>

<script>
    import Props from "kernel/Props";

    export default {
        props: {
            ...Props,
            /**
             * Value
             */
            value: {
                default:  null,
                required: true,
            },

            /**
             * Default value
             */
            default: {
                type:    Boolean,
                default: false,
            },

            /**
             * Element title fallback
             */
            text: {
                type:    String,
                default: ''
            }
        },
        data() {
            return { visible: true };
        },
        mounted: function () {
            if (this.default) {
                this.$nextTick(() => {
                    this.select();

                    this.$on('-toggle-visibility', state => console.log(state));
                });
            }
        },
        methods: {
            getText() {
                for (let slot of (this.$slots.default || [])) {
                    return slot.text || this.text || this.value;
                }
                return '';
            },
            getValue() {
                return this.value || null;
            },
            select() {
                let value = {
                    text: this.getText(),
                    value: this.value
                };

                if (!this.disabled && !this.loading) {
                    this.$parent.$emit('-option-select', value);
                    this.$emit('select', value);
                }
            },
            click() {
                this.$emit('click', this);
                this.select();
            }
        }
    }
</script>
