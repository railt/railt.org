<template>
    <nav :class="'menu menu-' + depth + ' menu-' + (depth === 1 ? 'root' : 'sub')">
        <app-title :title="title"></app-title>

        <template v-for="item in items">
            <span class="menu-item" :class="{
                collapsible: (item.children || []).length > 0 && depth !== 1,
                collapsed: item.id === collapsed,
                active: current(item)
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
        name: 'documentation-menu-items',
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
                title: '',
                collapsed: 0,
                items: []
            }
        },
        methods: {
            current(item) {
                let path = this.$route.params.path;
                let route = path instanceof Array ? path.join('/') : (path || '');

                return route.toString().startsWith(item.urn);
            },
            toggle(item) {
                this.collapsed = this.collapsed === item.id ? 0 : item.id;

                if (item.type === 'DOCUMENTATION_PAGE') {
                    this.title = item.title;
                    this.$router.push({
                        name: 'docs',
                        params: { path: item.urn.split('/') }
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
    @import "../../../sass/kernel.scss";

    .menu {
        width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        padding-left: 15px;
        box-sizing: border-box;

        .menu-item {
            display: block;
            width: 100%;
            white-space: nowrap;
            margin: 9px 0;
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
                    opacity: .6;
                    @include fa-icon;
                    content: $fa-var-angle-right;
                    position: absolute;
                    left: -12px;
                    border-radius: 50%;
                    color: $color-text-secondary;
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
                    content: $fa-var-angle-right;
                }
            }

            &.collapsed {
                &:before {
                    transform: rotate(90deg);
                    color: $color-text !important;
                }
            }

            &.active {
                text-decoration: none;
                color: $color-main;
                font-weight: bold;
            }
        }

        .sub {
            overflow: hidden;
            max-height: 0;
            box-sizing: border-box;
            transition:
                opacity .3s ease,
                padding-bottom .3s ease,
                max-height .3s ease;
            position: relative;
            padding-bottom: 0;
            opacity: 0;

            &.collapsed {
                max-height: 550px;
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
                margin: 9px 0;
                font-size: 13px;
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

