<template>
    <div class="loader">
        <div class="spinner"></div>
    </div>
</template>

<script>
    export default {

    }
</script>

<style scoped lang="scss">
    @import "./../../sass/kernel";

    @keyframes preloader {
        0% {
            transform: rotate(0);
        }
        100% {
            transform: rotate(360deg);
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
            box-shadow: inset 0 0 0 2px $color-border;
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
                animation: preloader 2s ease infinite;
            }

            &:after {
                animation: preloader 2s cubic-bezier(.5, 0, .1, 1) infinite;
            }
        }
    }
</style>
