<template>
    <section class="tabs">
        <nav class="tabs-header">
            <button class="tab"
                v-for="(tab, index) in tabs"
                v-on:click="current = index"
                :class="{active: index === current}">{{ tab }}</button>
        </nav>
        <article class="tabs-content">
            <section class="tabs-content-inner" :style="{
                left: (current * -100) + '%',
                width: (tabs.length * 100) + '%'
            }">
                <slot></slot>
            </section>
        </article>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                tabs: [],
                contents: [],
                current: 0
            }
        },
        watch: {
            current(current) {
                this.updateTabsStatus(current);
            }
        },
        mounted() {
            for (let tab of this.$slots.default) {
                if (typeof tab === 'object' && tab.componentInstance) {
                    this.tabs.push(tab.componentInstance.title);
                    this.contents.push(tab);
                }
            }
            this.updateTabsStatus(this.current);
        },
        methods: {
            updateTabsStatus(current) {
                let i = 0;
                for (let tab of this.contents) {
                    tab.componentInstance.active = current === i++;
                }
            }
        }
    }
</script>

<style scoped lang="scss">
    @import "./../../sass/kernel";

    .tabs {
        padding: 5px;
        display: block;
        background: #fff;
        border-radius: 3px;
        box-sizing: border-box;
        color: $color-text;

        &-content,
        &-header {
            display: block;
            width: 100%;
        }

        &-header {
            display: flex;
            overflow: auto;
            font-size: 13px;
            align-items: center;
            box-sizing: border-box;
            padding: 8px 8px 4px 8px;
            justify-content: flex-start;
            @include scrollbar(10px, 7px);

            .tab {
                height: 32px;
                line-height: 32px;
                border: none;
                outline: none;
                display: block;
                cursor: pointer;
                padding: 0 15px;
                white-space: nowrap;
                text-decoration: none;
                color: $color-text;
                background: $color-border;

                &:first-child {
                    border-radius: 4px 0 0 4px;
                }

                &:last-child {
                    border-radius: 0 4px 4px 0;
                }

                &:hover {
                    background: $color-border;
                    transition: .2s ease;
                }

                &.active {
                    color: #fff;
                    cursor: default;
                    transition: .2s ease;
                    background: $color-main;
                }
            }
        }

        &-content {
            position: relative;
            overflow: hidden;

            &-inner {
                left: 0;
                display: flex;
                position: relative;
                align-items: stretch;
                transition: left .5s $ui-animation-swift;
            }

            & /deep/ .tab {
                flex: 1;
                width: 100%;
                height: 100%;
                box-sizing: border-box;
                padding: 5px;
            }
        }
    }
</style>
