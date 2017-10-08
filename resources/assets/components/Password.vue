<style lang="scss" scoped>
    @import "kernel";

    .password {
        @include component();

        .show-password {
            background: none;
            border: none;
            outline: none;
            display: block;
            border-radius: 50%;
            margin: 0;
            height: $ui-min-height;
            position: relative;
            cursor: pointer;
            background: rgba(#fff, .8);

            svg {
                transition: fill .2s ease;
                fill: $color-border;
                width: $ui-min-height;
                height: $ui-min-height;
                display: block;
            }

            &:after,
            &:before {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                width: 2px;
                height: 2px;
                border-radius: 50%;
                box-shadow: 0 0 0 0 rgba($color-main, 1);
                opacity: 0;
                margin: -1px 0 0 -1px;
            }

            &:after {
                transition: opacity .1s $ui-animation-swift, box-shadow .3s ease;
                opacity: 1;
                box-shadow: 0 0 1px 15px rgba($color-main, 0);
            }
        }

        &.password-visible {
            .show-password {
                svg {
                    fill: $color-main !important;
                }

                &:before {
                    transition: opacity .1s $ui-animation-swift, box-shadow .3s ease;
                    opacity: 1;
                    box-shadow: 0 0 1px 15px rgba($color-main, 0);
                }

                &:after {
                    transition: none;
                    box-shadow: 0 0 0 0 rgba($color-main, 1);
                    opacity: 0;
                }
            }
        }
    }
</style>

<template>
    <section class="password" :class="{ 'password-visible': isVisible }">
        <ui-text v-model="internalValue"
                 :value="internalValue"
                 :disabled="disabled"
                 :loading="loading"
                 :title="title"
                 :placeholder="placeholder + ((placeholder && isVisible) ? (' (' + tipVisible + ')') : '')"
                 :name="name"
                 :type="dynamicType"
                 @input="onInput">

            <!--
                ВНИМАНИЕ:
                Нельзя использовать никакие активные теги, вроде button.
                Они могут взаимодействовать с внешними формами и активироваться при сабмите.
                По-этому, "div", например.
            -->
            <div class="show-password" tabindex="-1" slot="icons"
                 @click="togglePasswordVisibility">

                <ui-tooltip direction="left">{{ isVisibleDescription }}</ui-tooltip>

                <template v-if="isVisible">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <g>
                            <path d="M506.637 242.501c-5.362-6.347-11.263-12.33-17.171-18.193-31.897-31.679-68.549-59.921-108.648-80.411-25.618-13.08-53.038-23.655-81.451-28.721-14.453-2.586-28.617-3.912-43.474-3.938-14.447.025-28.908 1.353-43.361 3.938-28.412 5.065-55.775 15.641-81.393 28.721-40.102 20.489-76.724 48.733-108.622 80.411-5.909 5.862-11.794 11.847-17.155 18.193-7.147 8.484-7.147 18.515 0 27 16.344 19.353 35.774 36.575 55.542 52.321 42.57 33.915 91.25 62.278 144.993 73.711a239.364 239.364 0 0 0 49.998 5.228 238.682 238.682 0 0 0 50.107-5.228c53.744-11.433 102.534-39.796 145.104-73.711 19.768-15.745 39.194-32.969 55.538-52.321 7.146-8.483 7.139-18.514-.007-27zM255.892 354.552c-54.334-.104-98.348-44.177-98.348-98.554 0-54.351 44.014-98.438 98.348-98.543 54.809.104 98.347 44.192 98.347 98.543.001 54.376-43.538 98.447-98.347 98.554z"></path>
                            <path d="M255.86 217.881c-21.06 0-38.106 17.059-38.106 38.115 0 21.068 17.047 38.123 38.106 38.123 21.058 0 38.124-17.055 38.124-38.123 0-21.056-17.067-38.115-38.124-38.115z"
                                  fill-rule="evenodd"></path>
                        </g>
                    </svg>
                </template>
                <template v-else="isVisible">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 37.519 37.519">
                        <g>
                            <path d="M37.087,17.707c-0.229-0.229-3.982-3.971-9.518-6.344l4.146-4.146c0.391-0.392,0.391-1.022,0-1.414s-1.023-0.392-1.414,0 l-4.781,4.782C23.435,9.891,21.16,9.43,18.76,9.43c-10.043,0-17.994,7.938-18.327,8.276c-0.577,0.584-0.577,1.522,0,2.106 c0.227,0.229,3.98,3.973,9.516,6.346l-4.146,4.146c-0.392,0.392-0.392,1.022,0,1.414c0.194,0.194,0.451,0.293,0.707,0.293 s0.512-0.099,0.707-0.293l4.781-4.782c2.087,0.694,4.361,1.155,6.762,1.155c10.042,0,17.994-7.938,18.328-8.276 C37.664,19.231,37.664,18.291,37.087,17.707z M3.736,18.76c2.412-2.041,8.282-6.328,15.023-6.328c1.5,0,2.953,0.223,4.339,0.576 l-1.045,1.045c-0.934-0.654-2.066-1.041-3.293-1.041c-3.176,0-5.75,2.574-5.75,5.75c0,1.226,0.387,2.361,1.042,3.294l-1.785,1.784 C8.425,22.412,5.327,20.101,3.736,18.76z M18.76,25.091c-1.499,0-2.953-0.223-4.34-0.576l1.045-1.045 c0.934,0.654,2.067,1.041,3.294,1.041c3.176,0,5.75-2.574,5.75-5.75c0-1.227-0.389-2.361-1.043-3.295l1.785-1.784 c3.842,1.429,6.938,3.739,8.529,5.081C31.371,20.804,25.501,25.091,18.76,25.091z"></path>
                        </g>
                    </svg>
                </template>
            </div>
        </ui-text>
    </section>
</template>


<script>
    import Text from "./Text.vue";

    export default {
        model: {
            prop: 'internalValue',
            event: 'input'
        },
        props: {
            ...Text.props,
            type: {
                type: String,
                default: 'password',
                validator: (value) => value === 'password'
            },
            tipShow: {
                type: String,
                default: 'Show password'
            },
            tipHide: {
                type: String,
                default: 'Hide password'
            },
            tipVisible: {
                type: String,
                default: '(visible)'
            },
        },
        data() {
            return {
                isVisible: false,
                isVisibleDescription: this.tipHide,
                dynamicType: 'password',
                internalValue: this.value
            };
        },
        methods: {
            togglePasswordVisibility() {
                this.$emit('change-visibility', {
                    from: this.isVisible,
                    to:   !this.isVisible
                });

                this.dynamicType = (this.isVisible = !this.isVisible) ? 'text' : 'password';
                this.isVisibleDescription = this.isVisible
                    ? this.tipShow
                    : this.tipHide;
            },
            onInput(value) {
                this.internalValue = value;
                this.$emit('input', value);
            }
        },
    }
</script>
