<template>
    <section class="page">
        <section class="splash" :class="{ready: ready}">
            <div class="middle">
                <img src="../../img/logo-dark.svg" alt="Railt"/>
                <h2>The GraphQL Framework</h2>

                <div class="code-layout">
                    <img src="/images/pc.svg" alt="PC" />
                </div>
            </div>
        </section>

        <h1>Home</h1>
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
    @import "../../sass/kernel";

    .page {
        display: block !important;
        padding-top: 0 !important;
    }

    .middle {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -50px;
        transform: translate(-50%, -50%);
    }

    .splash {
        width: 100%;
        height: 100vh;

        h1, h2, h3, h4, h5, h6 {
            margin: 0;
            padding: 0;
            text-align: center;
        }

        img {
            display: block;
            margin: 0 auto;
        }

        h2 {
            padding-bottom: 20px;
            color: $color-text;
            font-weight: 300;
        }

        .code-layout {
            position: relative;

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
