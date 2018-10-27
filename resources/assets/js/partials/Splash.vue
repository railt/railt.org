<template>
    <section class="splash">
        <div class="title" :style="{top: (scrollTop / 1.6) + 'px'}">
            <h1><slot name="title"></slot></h1>
        </div>
        <div class="image" :style="{top: (scrollTop / 1.2) + 'px'}">
            <slot name="image"></slot>
        </div>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                scrollTop: 0
            }
        },
        methods: {
            handleScroll() {
                requestAnimationFrame(() => {
                    this.scrollTop = window.scrollY;
                });
            }
        },
        created () {
            window.addEventListener('scroll', this.handleScroll);
        },
        destroyed () {
            window.removeEventListener('scroll', this.handleScroll);
        }
    }
</script>

<style scoped lang="scss">
    @import "./../../sass/kernel";

    .splash {
        box-sizing: border-box;
        padding: 38px 30px 0 30px;
        width: 100%;
        height: 100vh;
        height: calc(100vh - 100px);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        background: url(/images/splash/bg.png) center bottom fixed repeat-x;
        background-size: cover;

        .title,
        .image {
            display: flex;
            justify-content: center;
        }

        .title {
            flex: 30%;
            align-items: center;
            position: relative;
            z-index: 2;

            h1 {
                $color-border: rgba(#fff, .2);
                line-height: 45px;
                font-size: 3rem;
                text-align: center;
                color: $color-text;
            }
        }

        .image {
            flex: 70%;
            position: relative;
            img {
                position: absolute;
                bottom: 0;
                height: 47vh;
            }
        }
    }
</style>
