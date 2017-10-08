<style lang="scss" scoped>
    @import "kernel";

    .page-home {
        .section {
            h2, h3 {
                text-align: center;
            }

            h2 {
                font-weight: 200;
                padding: 0 0 20px 0;
            }

            p {
                font-size: 15px;
                line-height: 1.5em;
            }

            .section-body {
                max-width: $ui-width;
                margin: 0 auto;
                box-sizing: border-box;
                padding: 100px 0;
                @include clear;

                & > p {
                    width: 80%;
                    max-width: 600px;
                }

                p {
                    margin: 0 auto;
                    color: $color-silver;
                    padding: 10px 0 20px 0;
                    display: block;
                    min-height: 60px;
                }
            }

            .section-column {
                float: left;
                width: 50%;
                display: block;
                box-sizing: border-box;
                padding: 0 50px;

                img {
                    width: 80%;
                    margin: 0 10%;
                }
            }
        }
    }

    @include media-breakpoint-down(sm) {
        .page-home {
            .section-column {
                width: 100% !important;
            }
        }
    }
</style>

<template>
    <section class="page-home">
        <page-home-splash :about="about" :variants="variants">
            <slot name="header"></slot>

            <template slot="lang">
                <slot name="lang"></slot>
            </template>
        </page-home-splash>

        <section class="section">
            <div class="section-body">
                <h2>GraphQL</h2>
                <h3>Язык запросов для вашего API</h3>

                <p>
                    GraphQL - это язык запросов для API и среда выполнения для выполнения
                    этих запросов с вашими существующими данными.
                    GraphQL предоставляет полное и понятное описание данных в
                    вашем API, дает клиентам возможность запрашивать именно то,
                    что им нужно, и не более того, упрощает разработку API
                    с течением времени и дает мощные инструменты для разработчиков.
                </p>
            </div>
        </section>

        <section class="section">
            <div class="section-body">
                <aside class="section-column">
                    <img src="/img/preview/docs.png" alt="Documentation" />
                </aside>
                <article class="section-column">
                    <h3>Документация</h3>

                    <p>
                        Воспользуйтесь документацией для изучения
                        основ или закрепления знаний. Это поможет
                        вам в разработке более элегантных и
                        качественных решений.
                    </p>

                    <ui-button view="simple">Открыть</ui-button>
                </article>
            </div>
        </section>

        <section class="section">
            <div class="section-body">
                <article class="section-column">
                    <h3>GitHub</h3>

                    <p>
                        Исходный код полностью открыт и располагается
                        на страницах
                        <a href="https://github.com/railt/railt" target="_blank">GitHub</a>.
                        Фреймворк распространяется под лицензией MIT.
                    </p>

                    <ui-button href="https://github.com/railt/railt" target="blank"
                               view="simple">Исходный код</ui-button>
                </article>
                <aside class="section-column">
                    <img src="/img/preview/github.png" alt="GitHub" />
                </aside>
            </div>
        </section>
    </section>
</template>

<script>
    export default {
        props: {
            about: {
                required: true
            },
            variants: {
                required: true
            }
        },
    };
</script>
