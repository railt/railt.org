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
                padding: 200px 0;
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
                box-sizing: border-box;
                padding: 0 50px;
                display: block;

                img {
                    width: 80%;
                    margin: 0 10%;
                }

                .button {
                    display: block;
                    width: 150px;
                    margin: 0 auto;
                }
            }

            &.docs {
                background: $color-bg;
            }

            &.github {
                .section-column {
                    float: right;
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

        <section class="section main">
            <div class="section-body">
                <h2>GraphQL</h2>
                <slot name="main"></slot>
            </div>
        </section>

        <section class="section docs">
            <div class="section-body">
                <aside class="section-column">
                    <img src="/img/preview/docs.png" alt="Documentation" />
                </aside>
                <article class="section-column">
                    <slot name="docs"></slot>
                </article>
            </div>
        </section>

        <section class="section github">
            <div class="section-body">
                <aside class="section-column">
                    <img src="/img/preview/github.png" alt="GitHub" />
                </aside>
                <article class="section-column">
                    <slot name="github"></slot>
                </article>
            </div>
        </section>
    </section>
</template>

<script>
    export default {
        props: {
            about:         { required: true },
            variants:      { required: true },
        },
    };
</script>
