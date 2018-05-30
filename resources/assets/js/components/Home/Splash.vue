<template>
    <section class="splash" :class="{ready: ready}">
        <div class="middle">
            <img class="logo" src="../../../img/logo-dark.svg" alt="Railt"/>

            <transition name="transition-fade">
                <h2 v-if="ready">The GraphQL Framework</h2>
                <h2 v-else>Hello, neighbor!</h2>
            </transition>


            <div class="code-layout">
                <transition name="transition-fade">
                    <img src="/images/pc.svg" alt="PC" v-if="ready" />
                    <div v-else class="placeholder"></div>
                </transition>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                ready: false
            }
        },
        mounted() {
            setTimeout(() => this.ready = true, 1000);
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../../sass/kernel";

    .splash {
        min-height: 90vh;
        justify-content: center;
        align-items: center;
        padding: 0 0 100px 0 !important;
        background: url(../../../img/splash/bg.png) center bottom no-repeat;
        background-size: 200% auto;

        h1, h2, h3, h4, h5, h6 {
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .logo {
            width: 170px;
            height: auto;
            display: block;
            margin: 0 auto 10px auto;
        }

        h2 {
            padding-bottom: 30px;
            color: $color-text;
            font-weight: 300;
        }

        .code-layout {
            position: relative;
            width: 500px;
            height: 400px;

            img {
                display: block;
                position: fixed;
                left: 10%;
                margin: 0 auto;
                width: 80%;
                height: 100%;
            }

            .placeholder {
                border-radius: 4px;
                height: 100%;
                width: 100%;
            }
        }

        &.ready {
            .code-layout {
                .keyboard {
                    opacity: 1;
                    transform: translateY(0) scaleY(1);
                }

                .display {
                    opacity: 1;
                }

                .browser {
                    animation: ease-out-bounce 1s 1s forwards;
                }
            }
        }
    }
</style>
