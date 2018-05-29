<template>
    <div class="page-error">
        <app-title :title="title"></app-title>
        <slot></slot>
    </div>
</template>

<script>
    export default {
        props: {
            code: {
                type: Number,
                default: 404
            },
            title: {
                type: String,
                default: 'Page Not Found'
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "./../../sass/kernel";

    .page-error {
        position: absolute;
        width: 100%;
        height: 100%;
        display: block;
        min-height: 400px;
        background: url(./../../img/404.png) center bottom no-repeat fixed;
    }
</style>
