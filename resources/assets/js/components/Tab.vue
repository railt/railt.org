<template>
    <article :class="{tab: true, active: active}">
        <slot></slot>
    </article>
</template>

<script>
    export default {
        props: ['title'],
        data() {
            return {
                active: false
            };
        }
    }
</script>

<style scoped lang="scss">
    @import "./../../sass/kernel";

    .tab {
        opacity: 0;
        max-height: 0;
        overflow: hidden;
        transform: scale(.7);
        filter: blur(9px);
        transition:
            opacity .2s ease,
            transform 1s ease,
            filter 1s ease,
            max-height 1s ease;

        &.active {
            opacity: 1;
            transform: scale(1);
            filter: blur(0);
            max-height: 100%;
        }
    }
</style>
