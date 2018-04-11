<template>
    <div class="dropdown" v-on:click="toggle"
         :class="{'dropdown-active': active}">
        <span class="dropdown-title" v-html="title"></span>

        <section class="dropdown-selections"
            :style="{'max-height': height}">
            <slot></slot>
        </section>

        <input type="hidden" v-bind:name="name" v-bind:value="value" />
    </div>
</template>

<script>
    export default {
        props: {
            maxItems: {
                type: Number,
                default: 5
            },
            name: String,
        },
        data() {
            return {
                title: '',
                value: null,
                active: false,
                height: '100vh'
            };
        },
        mounted() {
            this.$nextTick(() => {
                this.$on('dropdown-item:loaded', (item) => {
                    if (this.value === null) {
                        this.select(item);
                    }
                });

                this.$on('dropdown-item:select', item => {
                    this.select(item);
                });

                this.height = `${this.maxItems * (32 + 5) + 5}px`;
            });

            document.body.addEventListener('click', (e) => {
                for (let i of e.path) {
                    if (i === this.$el) {
                        return;
                    }
                }

                this.active = false;
            })
        },
        methods: {
            select({ title, name }) {
                this.title = title;
                this.value = name;
            },
            toggle() {
                this.active = ! this.active;
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "/../../sass/kernel";

    $arrow-size: 15px;
    $max-width: 200px;

    .dropdown {
        background: #fff;
        max-width: $max-width;
        min-width: 80px;
        box-shadow: 0 0 0 2px $color-border;
        height: $ui-height;
        line-height: $ui-height;
        box-sizing: border-box;
        padding: 0 #{$ui-padding + $arrow-size * 2} 0 $ui-padding;
        position: relative;
        display: inline-block;
        border-radius: 2px;
        cursor: pointer;
        z-index: 2;
        transition: box-shadow .3s $ui-animation-swift;

        &-title {
            overflow: hidden;
            text-overflow: ellipsis;
            display: inline-block;
            white-space: nowrap;
            user-select: none;
            max-width: #{$max-width - $ui-padding * 2 - $arrow-size};
        }


        &:hover {
            color: darken($color-text, 10%);
        }

        &:after {
            @include fa-icon;
            content: $fa-var-angle-down;
            width: $arrow-size;
            height: $arrow-size;
            text-align: center;
            display: block;
            position: absolute;
            right: 10px;
            top: 14px;
            border-radius: 50%;
            font-size: 15px;
            transform: rotate(0);
            box-shadow:
                0 0 0 2px #fff,
                0 0 0 0 rgba($color-border-secondary, 1);
            transition:
                transform .5s $ui-animation-bounce;
        }

        &-selections {
            pointer-events: none;
            overflow-y: auto;
            position: absolute;
            width: 100%;
            background: #fff;
            box-shadow: 0 -2px 0 #fff, 0 0 0 2px $color-border, $ui-box-shadow;
            left: 0;
            top: $ui-height;
            border-radius: 0 0 2px 2px;
            opacity: 0;
            transform: translateY(-10px);
            transition:
                box-shadow .3s $ui-animation-swift,
                opacity .3s $ui-animation-swift,
                transform .3s $ui-animation-swift;
            @include scrollbar;
        }

        &-active {
            box-shadow:
                0 2px 0 #fff,
                0 0 0 2px $color-main;
            z-index: 998;

            .dropdown-title {
                color: $color-main !important;
            }

            &:after {
                color: $color-main !important;
                transform: rotate(-180deg);
                box-shadow:
                    0 0 0 2px $color-border-secondary,
                    0 0 0 15px rgba($color-border-secondary, 0);
                transition:
                    box-shadow .5s ease,
                    transform .5s $ui-animation-bounce;
            }

            .dropdown-selections {
                pointer-events: all;
                opacity: 1;
                transform: translateY(0);
                box-shadow: 0 -2px 0 #fff, 0 0 0 2px $color-main, $ui-box-shadow;
            }
        }
    }
</style>
