<style lang="scss" scoped>
    @import "kernel";

    .select {
        @include component();

        .current {
            min-width: 100px;
            padding: 0 ($ui-padding + $ui-height) 0 $ui-padding;
            border-radius: 2px;
            box-shadow: 0 0 0 1px $color-border;
            height: $ui-height;
            line-height: $ui-height;
            background: $color-white;
            cursor: pointer;
            user-select: none;

            .value {
                font: {
                    size: $font-size;
                    family: $font-family;
                }
                height: $ui-height;
                line-height: $ui-height;

                &.default {
                    color: $color-extra-light-silver !important;
                }
            }

            .arrow {
                top: 0;
                right: 0;
                width: $ui-height;
                height: $ui-height;
                position: absolute;
                display: flex;
                justify-content: center;
                border: none;
                background: none;
                align-items: center;
                outline: none;
                cursor: pointer;
                transform: rotateZ(0deg);
                transform-origin: 50%;
                z-index: 6;
                transition: transform .3s $ui-animation-swift;

                svg {
                    display: block;
                    fill: $color-gray;
                    width: 10px;
                    height: 10px;
                }
            }

            &:hover {
                box-shadow: 0 0 0 1px $color-border-hover;
                transition: box-shadow .2s $ui-animation-swift;

                .arrow {
                    svg {
                        transition: fill .2s $ui-animation-swift;
                        fill: $color-light-silver;
                    }

                    &:active {
                        svg {
                            fill: $color-silver;
                        }
                    }
                }
            }
        }

        .dropdown {
            min-width: 100px;
            background: #fff;
            position: absolute;
            width: 100%;
            border-radius: 0 0 2px 2px;
            z-index: 98;
            box-shadow:
                    0 -1px 0 0 $color-white,
                    0 0 0 1px $color-border-hover,
                    $ui-box-shadow;
            pointer-events: none;
            opacity: 0;
            transform: translateY(-10px);
            transition:
                    opacity .2s $ui-animation-swift,
                    transform .2s $ui-animation-swift;

            .options {
                padding: 3px 0;
                overflow-x: visible;
                overflow-y: auto;

                &::-webkit-scrollbar {
                    width: 3px;

                    &-thumb {
                        border-radius: 1px;
                        background: $color-border;

                        &:hover {
                            background: $color-main;
                        }
                    }
                }
            }

            .not-found {
                background: $color-white;
                padding: $ui-padding;
                text-align: center;
                overflow: hidden;
                text-overflow: ellipsis;
                color: $color-description;
            }
        }

        &.active {
            .current {
                box-shadow: 0 0 0 1px $color-border-hover;
                border-radius: 2px 2px 0 0;

                .value {
                    color: $color-main;
                }

                .arrow {
                    transform: rotateZ(-180deg) scale(.7);
                    svg {
                        fill: $color-main;
                    }
                }
            }

            .dropdown {
                pointer-events: all;
                opacity: 1;
                transform: translateY(0);
                transition:
                        opacity .3s $ui-animation-swift,
                        transform .3s $ui-animation-swift;
            }
        }

        & /deep/ .loader {
            border-color: $color-main;
            .spinner {
                box-shadow: none;
            }
        }

        &.disabled {
            .current {
                box-shadow: 0 0 0 1px $color-disabled-border;
                background: $color-disabled-bg;
                cursor: default !important;

                .value,
                .value.default {
                    color: $color-disabled-body !important;
                }
                .arrow {
                    cursor: default;
                    svg {
                        fill: $color-disabled-body !important;
                    }
                }
            }
        }

        &.searchable.active {
            .current {
                padding: 0;
                background: $color-bg !important;
                & /deep/ {
                    .input {
                        display: block;
                    }
                    .container {
                        border-radius: 4px 4px 0 0 !important;
                        background: $color-white !important;
                        box-shadow: none !important;
                    }
                    input {
                        padding-right: 0 !important;
                    }
                }

                .arrow svg {
                    fill: $color-text !important;
                }
            }

            .dropdown {
                & /deep/ {
                    .button {
                        display: block;
                        a, button {
                            border-radius: 0 0 4px 4px;
                            text-transform: none;
                            font-weight: 400;
                            box-shadow: inset 0 1px 0 $color-border;
                            letter-spacing: 0;
                            line-height: $ui-height;
                            height: $ui-height;
                        }
                    }
                }
            }
        }
    }
</style>

<template>
    <section class="select" :class="{
        active: isActive,
        disabled: disabled,
        searchable: searchable
    }">
        <input type="hidden" :name="name" :value="value" v-if="value" />
        <ui-loading v-if="loading"></ui-loading>

        <section class="current" @mouseover="hover(true)" @mouseleave="hover(false)" @click="toggle">
            <ui-tooltip direction="top" v-if="title">{{ title }}</ui-tooltip>

            <template v-if="!searchable || (searchable && !isActive)">
                <span class="value" :class="{default: !text}">{{ text || placeholder }}</span>
            </template>
            <template v-else="!searchable || (searchable && !isActive)">
                <ui-text v-model="searchValue" view="flat" @input="search"
                         :placeholder="text || placeholder" :focus="true"
                         :value="searchValue"></ui-text>
            </template>

            <button class="arrow">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 284.929 284.929">
                    <path d="M282.082,76.511l-14.274-14.273c-1.902-1.906-4.093-2.856-6.57-2.856c-2.471,0-4.661,0.95-6.563,
                        2.856L142.466,174.441 L30.262,62.241c-1.903-1.906-4.093-2.856-6.567-2.856c-2.475,0-4.665,0.95-6.567,
                        2.856L2.856,76.515C0.95,78.417,0,80.607,0,83.082 c0,2.473,0.953,4.663,2.856,6.565l133.043,
                        133.046c1.902,1.903,4.093,2.854,6.567,2.854s4.661-0.951,6.562-2.854L282.082,89.647 c1.902-1.903,
                        2.847-4.093,2.847-6.565C284.929,80.607,283.984,78.417,282.082,76.511z"></path>
                </svg>
            </button>
        </section>

        <section class="dropdown">
            <div v-if="foundOptionsCount === 0" class="not-found">
                {{ searchDescriptionNotFound }}
            </div>

            <div class="options" :style="{'max-height': sizeToHeight + 'px'}">
                <template v-for="(text, value) in options">
                    <ui-option :value="value">{{ text }}</ui-option>
                </template>
                <slot></slot>
            </div>

            <template v-if="hiddenOptionsCount() !== 0">
                <ui-button view="flat" @click="resetSearch">
                    {{ searchDescriptionReset.replace('{hidden}', hiddenOptionsCount()) }}
                </ui-button>
            </template>
        </section>
    </section>
</template>

<script>
    import Props from "kernel/Props";
    import Enum from "kernel/Enum";

    export default {
        props: {
            ...Props,

            /**
             * Is in active status
             */
            active: {
                type: Boolean,
                default: false,
            },

            // TODO
            view: Enum(['primary'], 'primary'),

            /**
             * Is the component allows searching
             */
            searchable: {
                type: Boolean,
                default: false,
            },

            /**
             * Is the case sensitive seacrh
             */
            searchCaseSensitive: {
                type: Boolean,
                default: false
            },

            /**
             * Enables fuzzy search
             */
            searchFuzzy: {
                type: Boolean,
                default: true
            },

            /**
             * Description button
             */
            searchDescriptionNotFound: {
                type: String,
                default: 'No items found'
            },
            /**
             * Description button
             */
            searchDescriptionReset: {
                type: String,
                default: '{hidden} more items are hidden.'
            },

            /**
             * Maximum elements
             */
            size: {
                type: Number,
                default: 5
            },

            /**
             * Value for empty element
             */
            placeholder: {
                type: String,
                default: 'Select a value...'
            },

            /**
             *  Options
             */
            options: {
                default: () => {
                    return [];
                },
            }
        },
        computed: {
            changeState() {
                if (this.isActive) {
                    this.$emit('open', this);
                } else {
                    this.$emit('close', this);
                }

                this.$emit('toggle', this.isActive);
            },
            sizeToHeight() {
                return this.size * 29 + 3;
            }
        },
        data() {
            return {
                text:                '',
                value:               null,
                over:                false,
                isActive:            this.active,

                /**
                 * Searchable options
                 */
                searchEnabled:       false,
                searchValue:         this.text,
                foundOptionsCount:   0
            };
        },
        mounted: function () {
            this.$nextTick(() => {
                document.addEventListener('click', () => {
                    if (!this.over) {
                        this.hide();
                    }
                }, false);

                this.resetSearch();
            });

            this.$on('-option-select', value => {
                this.select(value);
            })
        },
        methods: {
            allOptionsCount() {
                return this.allOptions().length;
            },
            hiddenOptionsCount() {
                return this.allOptionsCount() - this.foundOptionsCount;
            },
            allOptions() {
                let result = [];

                for (let option of (this.$children || [])) {
                    if (
                        typeof(option.visible) === 'boolean' &&
                        typeof(option.getText) === 'function' &&
                        typeof(option.getValue) === 'function'
                    ) {
                        result.push(option);
                    }
                }

                return result;
            },

            toggle(event) {
                if (event && event.target && event.target.tagName.toString().toLowerCase() === 'input') {
                    return;
                }

                if (!this.disabled && !this.loading) {
                    this.isActive = !this.isActive;
                }
            },
            show() {
                if (!this.disabled && !this.loading) {
                    this.isActive = true;
                }
            },
            hide() {
                this.isActive = false;
                this.searchEnabled = false;
            },
            hover(status) {
                this.over = status;
            },
            resetSearch(event) {
                this.searchEnabled     = false;
                this.searchValue       = this.text;
                this.foundOptionsCount = this.allOptions().length;

                for (let node of this.allOptions()) {
                    node.visible = true;
                }

                if (event) {
                    event.preventDefault();
                    event.stopPropagation();
                    this.isActive = true;
                }
            },
            doSearch(needles, caseSensitive = false) {
                this.foundOptionsCount = 0;

                if (!caseSensitive) {
                    needles = needles.map(string => string.toString().toLowerCase());
                }

                for (let child of this.allOptions()) {
                    let visible  = false;
                    let haystack = child.getText();

                    if (!caseSensitive) {
                        haystack = haystack.toLowerCase();
                    }

                    for (let needle of needles) {
                        if (haystack.includes(needle)) {
                            visible = true;
                            this.foundOptionsCount++;
                            break;
                        }
                    }

                    child.visible = visible;
                }
            },
            search(text) {
                this.doSearch(
                    this.searchFuzzy ? text.trim().split(/[\h\s]+/g) : [text],
                    this.searchCaseSensitive
                );

                this.searchValue = text;
                this.searchEnabled = true;
            },
            select(value) {
                this.value = value.value || null;
                this.text = value.text || '';

                this.searchValue = value.text || value.value || '';

                this.$parent.$emit('select', this.value);
            }
        }
    }
</script>
