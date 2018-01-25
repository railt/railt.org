<style scoped lang="scss">
    @import "kernel";

    @keyframes blink {
        0%, 35% {
            transform: scale(1);
            opacity: 1;
        }
        50%, 85% {
            transform: scale(.9);
            opacity: 0;
        }
    }

    .splash {
        $animation: $ui-animation-swift;
        $animation-speed: 1s;

        width: 100vw;
        height: 100vh;
        overflow: hidden;
        min-height: 640px;
        position: relative;
        color: $color-inv-text-primary;
        background:
            url(/img/splash/bg1.png) 0 0,
            url(/img/splash/bg2.png) 0 0,
            url(/img/splash/bg3.png) 0 0,
            linear-gradient(180deg, $color-bg-dark 0%, lighten($color-bg-dark, 2%) 100%);
        will-change: background-position;


        header {
            transform: translateY(-50%);
            position: relative;
            top: 50%;

            .content {
                display: flex;
                flex-direction: column;
                justify-content: space-around;

                .logo {
                    width: 200px;
                    height: 75px;
                    background: url(/img/logo-white.svg) 50% no-repeat;
                }

                .logo,
                h1 {
                    margin: 0 auto;
                    text-align: center;
                    position: relative;
                    font-weight: 300;
                    font-size: 32px;
                    color: $color-text-placeholder;
                    opacity: 0;
                    transform: translateY(-100px) scale(.6);
                    transition:
                            opacity $animation-speed $animation .1s,
                            transform $animation-speed $animation .1s;
                }

                h1 {
                    text-shadow: 0 -1px 0 rgba(#000, .6);
                    transform: translateY(-100px) scale(.7);
                    transition:
                        opacity $animation-speed $animation,
                        transform $animation-speed $animation !important;
                }

                .console {
                    margin: 50px auto;
                    position: relative;
                    max-width: 460px;
                    width: 100%;
                    padding-bottom: 30px;
                    background: $color-bg-dark-alter;
                    box-shadow: $ui-box-shadow-dark;
                    opacity: 0;
                    transform: translateY(200px) scale(.9);
                    transition:
                        opacity $animation-speed $animation,
                        transform $animation-speed $animation;

                    .console-header {
                        background: rgba(#fff, .1);
                        font-size: 12px;
                        line-height: 12px;
                        font-family: $font-mono;
                        color: $color-text-placeholder;
                        text-align: center;
                        font-weight: bold;
                        height: 12px;
                        padding: 12px 10px;

                        span {
                            margin-left: (17px * -3);
                        }

                        .console-button {
                            float: left;
                            width: 12px;
                            height: 12px;
                            margin-right: 5px;
                            background: rgba(#fff, .1);
                            border-radius: 50%;
                            background: $color-text-regular;
                        }
                    }

                    .caret {
                        background: $color-text-placeholder;
                        height: 2px;
                        width: 10px;
                        display: block;
                        animation: blink 1s linear infinite;
                        position: relative;
                        top: 5px;
                        left: 17px;
                        pointer-events: none;
                    }

                    pre {
                        z-index: 4;
                        width: 100%;
                        display: flex;
                        box-sizing: border-box;
                        margin: 0 auto 0 auto;
                        overflow: auto;
                        padding: 10px 15px;
                        code {
                            font-size: 80%;
                            width: 100%;
                            padding: 0;
                        }
                    }
                }
            }
        }

        footer {
            position: absolute;
            background: $color-bg-dark-alter;
            bottom: 0;
            left: 0;
            color: $color-text-secondary;
            width: 100%;
            min-height: $ui-height;
            line-height: $ui-height;
            padding: 10px 0;
            transform: translateY($ui-height + 30px);
            box-shadow: inset 0 1px 0 rgba(#fff, .04);
            opacity: 0;
            transition:
                opacity $animation-speed $animation .5s,
                transform $animation-speed $animation .5s;

            .content {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;

                .frontend,
                .backend {
                    padding: 5px 0;
                    display: flex;
                    overflow: hidden;
                    white-space: nowrap;
                }

                .frontend {
                    justify-content: flex-start;
                }

                .backend {
                    justify-content: flex-end;
                }
            }

            .title {
                text-transform: uppercase;
                font-weight: bold;
                font-size: 14px;
                margin-right: 10px;
            }

            /deep/ {
                svg {
                    display: block;
                    height: $ui-height;
                    width: auto;
                    margin: 0 10px;
                    fill: $color-text-regular;
                    transition: fill .3s ease;
                    .clip {
                        fill: $color-bg-dark-alter;
                    }
                }
            }
        }

        &.loaded {
            .logo, h1, .console, footer {
                opacity: 1 !important;
                transform: translateY(0) scale(1) !important;
            }
        }
    }
</style>


<template>
    <section class="splash"
             :class="{loaded: loaded}"
             :style="{
                'background-position':
                    '0 ' + p1 + 'px, ' +
                    '0 ' + p2 + 'px, ' +
                    '0 ' + p3 + 'px, ' +
                    '0 0'
             }">
        <header>
            <div class="content">
                <div class="logo"></div>
                <h1 :style="{'top': p1 + 'px'}">The GraphQL Framework</h1>

                <article class="console" :style="{'top': p2 + 'px'}">
                    <div class="console-header">
                        <div class="console-button"></div>
                        <div class="console-button"></div>
                        <div class="console-button"></div>
                        <span>Railt</span>
                    </div>
                    <pre><code class="language-graphql">type Project {
    name: String!
    version: String!
    createdAt(format: String = "RFC3339"): DateTime!
    updatedAt(format: String = "RFC3339"): DateTime
}</code></pre><span class="caret"></span>
                </article>
            </div>
        </header>

        <footer>
            <div class="content">
                <aside class="frontend">
                    <span class="title">{{ compatible }}</span>
                    <slot name="frontend"></slot>
                </aside>
                <aside class="backend">
                    <span class="title">{{ works }}</span>
                    <slot name="backend"></slot>
                </aside>
            </div>
        </footer>
    </section>
</template>

<script>
    export default {
        props: {
            works: {
                type: String,
                default: '',
            },
            compatible: {
                type: String,
                default: '',
            }
        },
        data() {
            return {
                loaded: false,
                p1: 0,
                p2: 0,
                p3: 0,
            };
        },
        mounted() {
            this.$nextTick(() => {
                document.addEventListener('scroll', e => {
                    requestAnimationFrame(() => {
                        let y = document.body.getBoundingClientRect().y;

                        this.p1 = y * -.3;
                        this.p2 = y * -.5;
                        this.p3 = y * -.9;
                    });
                }, false);


                setTimeout(() => this.loaded = true, 100);
            });
        }
    }
</script>
