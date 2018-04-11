<template>
    <section class="loading">
        <div class="container">
            <app-preloader></app-preloader>
            <span class="loading-text">{{ title }}</span>
        </div>
    </section>
</template>

<script>
    export default {
        props: {
            title: {
                type: String,
                default: 'Loading'
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "/../../sass/kernel";

    $outer-circle: 42px;
    $inner-circle: 24px;

    .loading {
        z-index: 999;
        padding: 100px 0;
        background: rgba(#fff, .6);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: block;
        pointer-events: none;

        .container {
            display: block;
            width: $outer-circle;
            height: $outer-circle;
            position: relative;
            margin: 0 auto;
            padding: 50px;
        }

        .loading-text {
            margin-top: 10px;
            display: block;
            width: 200px;
            position: relative;
            left: ($outer-circle / 2) - 100px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: .1em;
        }
    }
</style>
