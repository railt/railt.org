<style scoped lang="scss">
    @import "kernel";

    .home {
        h2 {
            text-align: center;
        }

        .description {
            text-align: center;
            color: $color-text-secondary;
            display: block;
        }

        .content {
            padding-bottom: 70px;

            & > main {
                padding-top: 50px;
                position: relative;
            }
        }

        .content.components {
            /deep/ {
                .el-tab-pane {
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: space-between;
                    box-shadow: 0 1px 0 $color-border;

                    @at-root {
                        @include media-breakpoint-down(sm) {
                            & > section {
                                width: 100% !important;
                            }
                        }
                    }

                    & > section {
                        width: 50%;
                        padding: 0 10px;
                        box-sizing: border-box;

                        .announcements-link {
                            text-transform: uppercase;
                            font-size: 12px;

                            i {
                                position: relative;
                                left: 5px;
                            }
                        }

                        .announcements {
                            line-height: 22px;
                            max-height: 300px;
                            overflow: hidden;

                            h1, h2, h3, h4, h5, h6 {
                                font-size: 16px;
                                margin-bottom: 16px;
                                margin-top: 38px;
                                font-weight: bold;
                            }

                            code {
                                font-size: 90%;
                                color: $color-text-regular;
                            }

                            li {
                                list-style: none;
                                font-size: 14px;
                                color: $color-text-secondary;
                                padding: 6px 0;
                                position: relative;

                                &:before {
                                    color: $color-text-placeholder;
                                    display: block;
                                    content: '⬤';
                                    font-size: 6px;
                                    width: 5px;
                                    left: -16px;
                                    top: 6px;
                                    position: absolute;
                                }
                            }

                            &.no-release {
                                p {
                                    margin-top: 50px;
                                    font-size: 24px;
                                    text-align: center;
                                    font-weight: 100;
                                    color: $color-text-placeholder;
                                }

                                .el-icon-error {
                                    font-size: 80px;
                                    width: 80px;
                                    height: 80px;
                                    color: $color-border-lighten;
                                    display: block;
                                    margin: 50px auto 0 auto;
                                }
                            }
                        }
                    }
                }
            }
        }

        .content.open-source {
            /deep/ {
                .recent-activity {
                    min-height: 300px;

                    h3 {
                        margin: 0;
                    }

                    .el-card__body {
                        padding-top: 5px;
                        display: flex;
                        flex-wrap: wrap;

                        &:before {
                            content: '';
                            background: url(/img/preview/github.png);
                            width: 162px;
                            height: 98px;
                            display: block;
                            position: absolute;
                            bottom: 0;
                            pointer-events: none;
                            right: 5%;
                        }
                    }

                    @at-root {
                        @include media-breakpoint-down(md) {
                            & .issue {
                                width: 100% !important;
                                padding: 15px 0 !important;
                            }
                        }

                        @include media-breakpoint-down(sm) {
                            & .activity-footer {
                                justify-content: flex-start !important;
                                align-items: flex-start !important;
                            }
                        }
                    }

                    .issue {
                        width: 50%;
                        display: block;
                        padding: 15px 10px 15px 0;
                        box-shadow: 0 1px 0 $color-border-lighten;
                        text-decoration: none;
                        box-sizing: border-box;

                        &:nth-child(2n) {
                            padding: 15px 0 15px 10px;
                        }

                        header, .body {
                            display: flex;
                            flex-wrap: wrap;
                            min-height: 28px;
                        }

                        header {
                            padding-bottom: 10px;

                            .number {
                                color: $color-text-placeholder;
                                margin-right: 5px;
                                font-weight: bold;
                            }
                        }

                        .body {
                            line-height: 28px;

                            & > * {
                                height: 28px;
                                line-height: 28px;
                                margin-right: 5px;
                            }

                            img {
                                display: block;
                                border-radius: 3px;
                                margin-right: 10px;
                            }

                            .el-icon {
                                display: block;
                            }
                        }
                    }

                    .activity-footer {
                        width: 100%;
                        padding-top: 20px;
                        display: flex;
                        justify-content: space-around;
                        align-items: center;
                        & > * {
                            position: relative;
                            z-index: 3;
                        }
                    }
                }
            }
        }

        .section.cover-splitter {
            box-shadow: inset 0 10px 30px rgba(#000, .2);
            padding: 0;
            background: $color-bg-dark url(/img/splash/bg.png) fixed;

            .content {
                position: relative;
                height: 300px;
                background: url(/img/preview/hello.png) fixed bottom center no-repeat;
            }
        }

        .content.contributors {
            & > main {
                display: flex;
                justify-content: space-between;
                flex-wrap: wrap;

                /deep/ {
                    img {
                        display: block;
                        height: 100%;
                        width: auto;
                    }

                    .contributor {
                        margin: 10px;
                        display: block;
                        overflow: hidden;
                        width: 64px;
                        height: 64px;
                        border-radius: 50%;
                        box-shadow: 0 0 0 2px $color-main;

                        &.more {
                            display: flex;
                            box-shadow: 0 0 0 1px $color-border-lighten;
                            justify-content: center;
                            align-items: center;
                            text-align: center;
                            vertical-align: center;
                            color: $color-text-secondary;
                            font-style: italic;
                            pointer-events: none;
                        }
                    }
                }
            }
        }

        .content.trusted {
            & > main {
                padding-top: 80px;
                display: flex;
                justify-content: center;
                flex-wrap: wrap;

                /deep/ {
                    img {
                        height: 60px;
                        margin: 20px 20px;
                    }
                }
            }
        }
    }
</style>

<template>
    <section class="home">
        <section class="section">
            <div class="content components">
                <div class="min">
                    <h2>Слабая связанность</h2>
                    <span class="description">
                        Railt изначально позиционируется, как набор независимых компонентов.
                    </span>
                </div>

                <main>
                    <slot name="versions"></slot>
                </main>
            </div>
        </section>

        <section class="section alter">
            <div class="content open-source">
                <div class="min">
                    <h2>Открытый код</h2>
                    <span class="description">
                        Участвуйте в
                        <a href="https://github.com/railt/railt/issues" target="_blank">обсуждениях</a>
                        на GitHub и посмотрите
                        <a href="https://github.com/railt/railt/releases" target="_blank">последние улучшения</a>.
                    </span>
                </div>

                <main>
                    <slot name="activity"></slot>
                </main>
            </div>
        </section>

        <section class="section cover-splitter">
            <div class="content"></div>
        </section>

        <section class="section">
            <div class="content contributors">
                <div class="min">
                    <h2>Для сообщества от сообщества</h2>
                    <span class="description">
                        В разработке Railt участвовали многие замечательные люди.
                        Абсолютно любой вклад очень ценен и помогают двигать
                        фреймворк в нужном русле.
                    </span>
                </div>

                <main>
                    <slot name="contributors"></slot>
                </main>
            </div>
        </section>

        <section class="section alter">
            <div class="content trusted">
                <div class="min">
                    <h2>Надёжность</h2>
                    <span class="description">
                        Вот лишь некоторые из организаций, которые выбирают Railt для
                        использования GraphQL в своих разработках.
                    </span>
                </div>

                <main>
                    <slot name="trustedBy"></slot>
                </main>
            </div>
        </section>
    </section>
</template>

<script>
    export default {
    }
</script>
