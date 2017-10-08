<style lang="scss" scoped>
    @import "kernel";

    @keyframes preloader {
        0% {
            transform: rotate(0);
        }
        60% {
            transform: rotate(360deg);
        }
        100% {
            transform: rotate(360deg * 2);
        }
    }

    $size: $ui-min-height;
    $size-div-2: $size / 2;

    .loader {
        display: block;
        width: 100%;
        height: 100%;
        z-index: 5;
        border-radius: 2px;
        background: rgba(#fff, .6);
        position: absolute;

        .spinner {
            position: absolute;
            top: 50%;
            left: 50%;
            margin: (-$size-div-2) 0 0 (-$size-div-2);
            display: block;
            width: $size;
            height: $size;
            border-radius: 50%;
            border-color: inherit;
            box-shadow: inset 0 0 0 2px $color-white;
            animation: preloader 2s cubic-bezier(0.250, 0.625, 0.470, 0.915) infinite;

            &:before,
            &:after {
                width: $size - 4px;
                height: $size - 4px;
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                display: block;
                border-radius: 50%;
                border: transparent 2px solid;
                border-left-color: inherit;
            }

            &:before {
                animation: preloader 3s cubic-bezier(0.250, 0.625, 0.470, 0.915) infinite;
            }

            &:after {
                animation: preloader 3s cubic-bezier(0.625, 0.295, 0.810, 0.490) infinite;
            }
        }
    }
</style>

<template>
    <div class="loader">
        <transition name="bounce">
            <div class="spinner"></div>
        </transition>
    </div>
</template>

<script>
    export default {

    }
</script>
