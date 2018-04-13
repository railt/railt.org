<template>
    <section class="page">
        <app-title title="Главная"></app-title>

        <app-splash class="section"></app-splash>

        <section class="section purple">
            <article class="section-content">
                <h2>4 шага для начала работы</h2>
            </article>
        </section>


        <section class="section dark">
            <article class="section-content">
                <h2>Для сообщества от сообщества</h2>

                <p>
                    В разработке Railt участвовали многие замечательные люди.
                    Абсолютно любой вклад очень ценен и помогают двигать
                    фреймворк в нужном русле.
                </p>
            </article>
        </section>

        <div style="height: 200vh"></div>
    </section>
</template>

<script>
    import Splash from "./Home/Splash";

    export default {
        components: {
            'app-splash': Splash
        },
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
        box-sizing: border-box;
        max-width: 100% !important;
    }

    .section {
        width: 100vw;
        display: flex;
        padding: 60px 0;
        box-sizing: border-box;
        justify-content: center;
        font-size: 18px;
        line-height: 24px;

        h1, h2, h3, h4, h5, h6 {
            text-align: center;
        }

        &.dark,
        &.purple {
            background: $color-main;
            position: relative;
            color: rgba($color-inv-text-primary, .7);

            h1, h2, h3, h4, h5, h6 {
                color: #fff;
            }
        }

        p {
            margin: 0;
            padding: 20px 100px;
        }

        &.dark {
            padding-top: 100px;
            background: $color-bg-dark;
        }

        &.purple {
            &:after,
            &:before {
                content: '';
                left: 0;
                top: -139px;
                display: block;
                position: absolute;
                z-index: 10;
                background: url(../../img/splash/curve-highlights-top.svg) center bottom no-repeat;
                background-size: 3000px 140px;
                width: 100%;
                height: 140px;
            }

            &:after {
                top: auto;
                bottom: -108px;
                background: $color-main url(../../img/splash/curve-highlights-bottom.svg) center bottom no-repeat;
            }
        }

        .section-content {
            max-width: $ui-width;
            width: 100%;
        }
    }
</style>
