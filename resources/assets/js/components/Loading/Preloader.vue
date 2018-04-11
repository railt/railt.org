<template>
    <div class="preloader" :style="{
        width: `${size}px`,
        height: `${size}px`,
    }">
        <div class="preloader-inner" :style="{
            width: `${Math.floor(size / 2)}px`,
            height: `${Math.floor(size / 2)}px`,
        }"></div>
    </div>
</template>

<script>
    export default {
        props: {
            size: {
                type: Number,
                default: 42
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../../sass/kernel";

    @keyframes preloader-bounce {
        0%, 100% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba($color-main, 1);
        }
        90% {
            transform: scale(1.2);
            box-shadow: 0 0 0 10px rgba($color-main, 0);
        }
        90.0001% {
            box-shadow: 0 0 0 0 rgba($color-main, 1);
        }
    }

    @keyframes preloader-bounce-inner {
        0%, 100% {
            transform: scale(1) translate(-50%, -50%);
        }
        90% {
            transform: scale(1.1) translate(-50%, -50%);
        }
    }

    .preloader {
        background: #654299;
        display: block;
        position: relative;
        border-radius: 50%;
        margin: 0 auto;
        animation: preloader-bounce 1s $ui-animation-swift infinite .1s;

        &-inner {
            display: block;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            transform-origin: 0% 0%;
            animation: preloader-bounce-inner 1s $ui-animation-swift infinite;
        }
    }
</style>
