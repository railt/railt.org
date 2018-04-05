<template>
    <div class="dropdown-item" v-on:click="click">
        <span v-html="title"></span>
    </div>
</template>

<script>
    export default {
        name: 'dropdown-item',
        props: {
            name: String,
            default: {type: Boolean, default: false}
        },
        data() {
            return {
                title: ''
            }
        },
        created() {
            this.$nextTick(() => {
                this.title = this.readHtml(this.$slots.default).join(' ');
            });
        },
        mounted() {
            setTimeout(() => {
                this.fire('loaded');

                if (this.default) {
                    this.fire('select');
                }
            }, 1);
        },
        methods: {
            readHtml(children) {
                let result = [];

                for (let item of children) {
                    if (item.tag) {
                        result.push(`<${item.tag}>`);
                    }

                    if (item.text) {
                        result.push(item.text);
                    }

                    if (item.children) {
                        result = result.concat(this.readHtml(item.children));
                    }

                    if (item.tag) {
                        result.push(`</${item.tag}>`);
                    }
                }

                return result;
            },
            click() {
                this.fire('select');
            },
            fire(ev) {
                this.$parent.$emit(`dropdown-item:${ev}`, { name: this.name, title: this.title });
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "/../../../sass/kernel";

    $arrow-size: 15px;
    $item-padding: 10px;

    .dropdown-item {
        height: #{$ui-height - $item-padding};
        line-height: #{$ui-height - $item-padding};
        margin: #{$item-padding / 2} 0;
        box-sizing: border-box;
        padding: 0 $ui-padding;
        white-space: nowrap;
        display: block;
        max-width: 200px;
        overflow: hidden;
        user-select: none;
        text-overflow: ellipsis;

        &:hover {
            color: $color-main;
            background: $color-bg;
        }
    }
</style>
