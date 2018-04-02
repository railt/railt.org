<template>
    <section class="preloader">
        <div class="container">
            <div class="circle">
                <div class="inner"></div>
            </div>
            <span class="loading-text">Loading</span>
        </div>
    </section>
</template>

<script>
    export default {}
</script>

<style lang="scss" scoped>
    @import "/../../sass/app";

    @keyframes bounce {
        0%, 100% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba($color-main, 1);
        }
        10% {
            transform: scale(.9);
        }
        80% {
            transform: scale(1.2);
            box-shadow: 0 0 0 15px rgba($color-main, 0);
        }
        80.1% {
            box-shadow: 0 0 0 0 rgba($color-main, 1);
        }
    }

    @keyframes bounce-white {
        0%, 100% {
            transform: scale(1);
        }
        5% {
            transform: scale(.8);
        }
        90% {
            transform: scale(1.1);
        }
    }

    $outer-circle: 42px;
    $inner-circle: 24px;

    .preloader {
        z-index: 99999;
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

        .circle {
            background: #654299;
            display: block;
            width: $outer-circle;
            height: $outer-circle;
            position: relative;
            border-radius: 50%;
            margin: 0 auto;
            animation: bounce 1s $ui-animation-swift infinite .1s;

            .sub,
            .loader,
            .inner {
                display: block;
                width: $inner-circle;
                height: $inner-circle;
                border-radius: 50%;
                position: absolute;
                top: 50%;
                left: 50%;
                margin: -#{$inner-circle/2} 0 0 -#{$inner-circle/2};
            }

            .inner {
                background: #fff;
                animation: bounce-white 1s $ui-animation-swift infinite;
            }
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
