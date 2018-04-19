<template>
    <section class="page">
        <app-title title="Главная"></app-title>

        <app-splash class="section"></app-splash>

        <section class="section purple">
            <div class="header-plank"></div>
            <div class="header-plank header-plank-alter"></div>

            <article class="section-content">
                <h2>4 шага для начала работы</h2>

                <app-steps></app-steps>
            </article>
        </section>


        <section class="section dark">
            <div class="header-plank"></div>
            <div class="header-plank header-plank-alter"></div>

            <article class="section-content">
                <h2>Для сообщества от сообщества</h2>

                <p>
                    В разработке Railt участвовали многие замечательные люди.
                    Абсолютно любой вклад очень ценен и помогают двигать
                    фреймворк в нужном русле.
                </p>

                <div style="height: 50vh"></div>
            </article>
        </section>
    </section>
</template>

<script>
    import Splash from "./Home/Splash";
    import Steps from "./Home/Steps";

    export default {
        components: {
            'app-splash': Splash,
            'app-steps': Steps
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
        font-size: 14px;
        line-height: 24px;
        position: relative;

        h1, h2, h3, h4, h5, h6 {
            text-align: center;
        }

        &.dark,
        &.purple {
            padding-bottom: 200px;
            color: rgba($color-inv-text-primary, .7);

            h2 {
                color: #fff;
            }
        }

        .header-plank {
            left: 0;
            top: -139px;
            z-index: 10;
            width: 100%;
            height: 140px;
            display: block;
            position: absolute;
            pointer-events: none;
            background-size: 3000px 140px;
            background: center bottom repeat-x;

            &.header-plank-alter {
                opacity: .5;
                background-position-x: 0;
            }
        }

        &.dark {
            background: $color-bg-dark;

            .header-plank {
                background-image: url(../../img/splash/curve-highlights-bottom.svg);
            }
        }

        &.purple {
            background: $color-main;

            .header-plank {
                background-image: url(../../img/splash/curve-highlights-top.svg);
            }
        }


        p {
            margin: 0;
            padding: 20px 100px;
        }

        .section-content {
            max-width: $ui-width;
            width: 100%;
        }
    }
</style>
