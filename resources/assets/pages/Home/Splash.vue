<style lang="scss" scoped>
    @import "kernel";

    .splash-screen {
        width: 100%;
        height: 100vh;
        min-height: 380px;
        position: relative;
        overflow: hidden;
        z-index: 98;
        top: 0;
        left: 0;
        background: #171e26 url(/img/bg.png) center repeat fixed;
        color: $color-light-gray;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        flex-direction: column;
        box-sizing: border-box;
        padding-bottom: 50px;

        & /deep/ header {
            z-index: 1;
            background: none;
            box-shadow: none;
            position: absolute;
            nav {
                a {
                    color: rgba($color-white, .8);
                    &:hover {
                        transition: color .2s ease;
                        color: $color-white;
                    }
                }
            }

            & .select {
                background: none;
                .dropdown {
                    box-shadow: none;
                }
                .current {
                    box-shadow: none;
                    background: rgba($color-white, .1);
                }
                &.active .current {
                    background: $color-white;
                }
            }
        }

        .logo {
            width: 200px;
            height: 75px;
            background: url(/img/logo-white.svg) center center no-repeat;
            opacity: 0;
            transition: opacity 1s $ui-animation-swift;

            &.visible {
                opacity: 1;
            }
        }

        .about {
            width: 100%;
            opacity: 0;
            transform: translateY(30px);
            transition:
                opacity 1s $ui-animation-swift,
                transform 1s $ui-animation-swift;

            &.visible {
                transform: translateY(0);
                opacity: 1;
            }

            h2,
            h3 {
                text-align: center;
                font-weight: 200;
                margin-top: 0;
            }

            h3 {
                color: lighten($color-main, 15%);
            }

            .cursor {
                opacity: 1;
                font-weight: 200;
                color: $color-white;
                display: inline-block;
                transition:
                    opacity .1s $ui-animation-swift,
                    transform .1s $ui-animation-swift;
                transform: scaleY(1.1);
                &.visible {
                    opacity: 0;
                    transition:
                        opacity .6s $ui-animation-swift,
                        transform .6s $ui-animation-swift;
                    transform: scaleY(.9);
                }
            }

            .about-text {
                text-shadow: 0 0 1px rgba($color-black, .7);
            }
        }

        .installation {
            position: absolute;
            bottom: 15vh;
            background: desaturate(#252C3D, 10%);
            padding: 40px 80px 30px 80px;
            border-radius: 5px;
            opacity: 0;
            transform: translateY(200px);
            transition:
                opacity 1s $ui-animation-swift .3s,
                transform 1s $ui-animation-swift .3s;
            box-shadow: 0 3px 8px rgba(#000, .1);

            &.visible {
                transform: translateY(0);
                opacity: 1;
            }

            code {
                font-size: 16px;
                background: none;
            }

            .installation-buttons {
                padding: 10px 0 0 10px;
                position: absolute;
                top: 0;
                left: 0;
                pointer-events: none;

                div {
                    width: 8px;
                    float: left;
                    height: 8px;
                    margin-right: 5px;
                    border-radius: 50%;
                    background: $color-extra-light-black;
                }
            }
        }
    }
</style>

<template>
    <section class="splash-screen">
        <partial-header :style="{top: top + 'px'}">
            <slot></slot>

            <template slot="lang">
                <slot name="lang"></slot>
            </template>
        </partial-header>

        <div class="logo" :class="{visible: loaded}"></div>

        <div class="about" :class="{visible: loaded}">
            <h2>The GraphQL Framework</h2>
            <h3>
                {{ about }} <span class="about-text">{{currentText}}</span>
                <span class="cursor" :class="{visible: state}">|</span>
            </h3>
        </div>

        <article class="installation" :class="{visible: loaded}">
            <div class="installation-buttons">
                <div></div><div></div><div></div>
            </div>
            <code>
                <b>$</b> composer require <span class="color-green">railt/railt</span>
            </code>
        </article>
    </section>
</template>

<script>
    const TIMEOUT = 50;

    export default {
        props: {
            about: {
                require: true
            },
            variants: {
                required: true
            }
        },
        data() {
            return {
                loaded: false,
                top: 0,

                fullText: this.variants[0],
                currentText: '',
                currentWord: 0,
                currentIndex: 0,
                currentDirection: true,
                currentAwait: 10,
                state: true
            };
        },
        mounted: function () {
            this.$nextTick(() => {
                document.addEventListener('scroll', e => {
                    this.top = window.pageYOffset;
                }, false);

                setTimeout(() => {
                    this.loaded = true;
                }, 300);

                setInterval(() => this.state = !this.state, 500);

                setInterval(() => {
                    if (this.currentAwait-- > 0) {
                        return;
                    }

                    this.currentIndex += (this.currentDirection ? 1 : -1);

                    if (this.currentIndex > this.fullText.length) {
                        this.currentDirection = !this.currentDirection;
                        this.currentAwait = TIMEOUT;
                    } else if (this.currentIndex < 0) {
                        this.currentDirection = !this.currentDirection;

                        this.fullText = this.variants[++this.currentWord];
                        if (this.currentWord >= this.variants.length) {
                            this.fullText = this.variants[this.currentWord = 0];
                        }
                    }

                    this.currentText = this.fullText.substr(0, this.currentIndex);
                }, 40);
            });
        }
    }
</script>
