<template>
    <nav :class="'menu menu-' + depth + ' menu-' + (depth === 1 ? 'root' : 'sub')">
        <template v-for="item in items">
            <span class="menu-item" :class="{
                collapsible: (item.children || []).length > 0 && depth !== 1,
                collapsed: item.id === collapsed
            }" @click="toggle(item)">
                {{ item.title }}
            </span>

            <nav class="sub" :class="{collapsed: item.id === collapsed || depth === 1}"
                 v-if="(item.children || []).length > 0 && depth <= 10">
                <documentation-menu-items
                        :menu="item.children"
                        :depth="depth + 1"
                ></documentation-menu-items>
            </nav>
            <nav class="sub" v-else></nav>
        </template>
    </nav>
</template>

<script>
    export default {
        props: {
            menu: {
                type: Array
            },
            depth: {
                type: Number,
                default: 1
            }
        },
        data() {
            return {
                collapsed: 0,
                items: []
            }
        },
        methods: {
            toggle(item) {
                this.collapsed = this.collapsed === item.id ? 0 : item.id;

                if (item.type === 'DOCUMENTATION_PAGE') {
                    this.$router.push({
                        name: 'docs',
                        params: { path: item.urn }
                    });
                }
            },
            sort(items) {
                return items.slice()
                    .map(item => Object.assign({}, item))
                    .sort((a, b) => a.orderId > b.orderId ? 1 : -1);
            }
        },
        mounted() {
            this.$nextTick(() => {
                this.items = this.sort(this.menu);
            });
        },
        watch: {
            menu(items) {
                this.items = this.sort(items);
            }
        }
    }
</script>


<style lang="scss" scoped>
    @import "./../../../sass/kernel.scss";

    .menu {
        width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        padding-left: 15px;

        .menu-item {
            display: block;
            width: 100%;
            white-space: nowrap;
            margin: 6px 0;
            color: $color-text-secondary;
            text-decoration: none;
            cursor: pointer;
            position: relative;
            font-size: 14px;
            line-height: 16px;

            &:hover {
                color: darken($color-text-primary, 10%);
            }

            &.collapsible {
                &:before {
                    opacity: 0;
                    @include fa-icon;
                    content: $fa-var-angle-right;
                    position: absolute;
                    left: -12px;
                    border-radius: 50%;
                    transform: rotate(0);
                    text-align: center;
                    vertical-align: center;
                    top: 0;
                    font-weight: bold;
                    transform-origin: 50% 50%;
                    transition:
                        transform .1s $ui-animation-bounce;
                }

                &:hover:before {
                    opacity: 1;
                }
            }

            &.collapsed {
                &:before {
                    transform: rotate(90deg);
                    color: $color-text !important;
                }
            }

            &.router-link-active {
                text-decoration: none;
                color: $color-main;
                text-shadow: 0 0 1px $color-main;
            }
        }

        .sub {
            overflow: hidden;
            max-height: 0;
            transition:
                opacity .3s ease,
                padding-bottom .3s ease,
                max-height .3s ease;
            position: relative;
            padding-bottom: 0;
            opacity: 0;

            &:before {
                content: '';
                position: absolute;
                height: 100%;
                left: 5px;
                top: 0;
                width: 0;
                border-right: $color-border-lighten 1px dotted;
            }

            &.collapsed {
                max-height: 500px;
                opacity: 1;
                transition:
                    max-height 1s ease,
                    padding-bottom .3s ease,
                    opacity .3s ease;
                padding-bottom: 5px;
            }
        }

        &.menu-sub {
            .menu-item {
                margin: 4px 0;
                font-size: 12px;
                line-height: 14px;
            }
        }

        &.menu-root {
            & > .menu-item {
                cursor: default;
                color: $color-text;
                text-transform: uppercase;
                letter-spacing: .1em;
            }

            & > .sub {
                &:before {
                    display: none;
                }
                padding-bottom: 25px;
            }
        }
    }
</style>

