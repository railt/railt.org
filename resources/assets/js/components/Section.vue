<template>
    <section :class="['section', color]">
        <div class="content">
            <header class="content-header" v-if="title">
                <h2 v-html="title">&nbsp;</h2>
            </header>
            <div class="content-articles">
                <slot name="content"></slot>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        props: {
            title: {
                type: String,
                default: null
            },
            color: {
                type: String,
                default: 'purple'
            }
        }
    }
</script>

<style scoped lang="scss">
    @import "./../../sass/kernel";

    @keyframes bg-move {
        0% {
            background-position: -200% 130px;
        }
        25%,
        75% {
            background-position-y: 0;
        }
        100% {
            background-position: 200% 130px;
        }
    }

    .section {
        position: relative;

        &:after,
        &:before {
            content: '';
            left: 0;
            z-index: 10;
            width: 100%;
            display: block;
            position: absolute;
            pointer-events: none;
            background-size: 100% auto;
            background: center bottom repeat-x;
            background-repeat: repeat-x !important;
        }

        &:after {
            background: bottom;
            opacity: .5;
            @include media-breakpoint-up(md) {
                animation: bg-move 25s ease infinite;
            }
        }

        .content {
            margin: 0 auto;
            background: inherit;
            max-width: map-get($grid-breakpoints, lg);
            padding: 100px 0 250px 0;
        }

        .content-header {
            width: 100%;
            position: relative;
            text-align: center;
            background: inherit;

            &:after {
                left: 5%;
                top: 35%;
                width: 90%;
                height: 1px;
                content: '';
                display: block;
                position: absolute;
                background: rgba(#999, .5);
            }

            & /deep/ {
                h1, h2 {
                    z-index: 3;
                    width: auto;
                    margin: 0 auto;
                    padding: 40px 15px;
                    position: relative;
                    background: inherit;
                    display: inline-block;
                }

                & > h2 {
                    padding-bottom: 100px;
                }
            }
        }

        .content-articles {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            width: 100%;

            & /deep/ {
                font-size: 15px;

                & > .callout {
                    flex: 50%;
                    width: 50%;
                    min-width: 50%;
                    padding: 15px;
                    box-sizing: border-box;
                    height: 220px;

                    & > * {
                        width: 100%;
                        height: 100%;
                        display: block;
                        background: #fff;
                        padding: 25px 30px;
                        text-decoration: none;
                        transform: scale(1) translateY(0);
                        border-radius: 3px;
                        box-sizing: border-box;
                        position: relative;
                        color: $color-text;
                        will-change: transform, box-shadow;
                        box-shadow: 0 1px 3px rgba(#000, 0);
                        transition: box-shadow .6s ease, transform .6s ease;

                        h3 {
                            margin: 0;
                            padding: 0;
                            display: block;
                            font-size: 26px;
                            font-weight: 400;

                            img {
                                float: left;
                                height: 36px;
                                margin-right: 20px;
                                transform: scale(1);
                                transition: .6s ease;
                            }
                        }

                        &:hover {
                            transition: box-shadow .3s ease, transform .3s ease;
                            box-shadow: 0 4px 20px rgba(#000, .1);
                            transform: scale(1.03) translateY(-5px);
                        }

                        p {
                            color: $color-description;
                            line-height: 1.8rem;
                        }
                    }
                }

                & > .column {
                    flex: 50%;
                    width: 50%;
                    max-width: 50%;
                    flex-wrap: nowrap;
                    box-sizing: border-box;
                    padding: 0 15px;
                }

                @include media-breakpoint-down(sm) {
                    flex-direction: column;
                    flex-wrap: wrap;

                    & > .callout,
                    & > .column {
                        min-width: 100% !important;
                        max-width: 100% !important;
                        flex: 100% !important;
                        width: 100% !important;
                    }

                    & > .column {
                        &:first-child {
                            padding-bottom: 15px;
                        }

                        &:last-child {
                            padding-top: 15px;
                        }
                    }
                }
            }
        }

        &.purple {
            background: $color-main;
            color: rgba(#fff, .9);

            h2 {
                text-shadow: 0 0 1px rgba(#fff, .2);
            }

            a {
                color: #fff;
                text-decoration: underline;

                &:hover {
                    text-decoration: none;
                }
            }

            &:after,
            &:before {
                background-image: url(/images/section/curve-highlights-purple.svg);
                height: 140px;
                top: -139px;
            }

            & + &.purple {
                margin-top: -150px !important;

                &:after,
                &:before {
                    display: none !important;
                }
            }
        }

        &.dark {
            background: $color-bg-dark;
            color: rgba(#fff, .9);

            h2 {
                text-shadow: 0 0 1px rgba(#fff, .2);
            }

            &:after,
            &:before {
                background-image: url(/images/section/curve-highlights-black.svg);
                height: 140px;
                top: -139px;
            }
            @include media-breakpoint-up(md) {
                &:after {
                    animation: bg-move 17s ease infinite reverse;
                }
            }

        }

        &.white {
            background: #fff;
            color: $color-text;

            .content {
                padding-bottom: 100px;
            }

            h2 {
                text-shadow: 0 0 1px rgba($color-text, .2);
            }

            &:after,
            &:before {
                background-image: url(/images/section/curve-highlights-white.svg);
                height: 140px;
                top: -139px;
            }

            @include media-breakpoint-up(md) {
                &:after {
                    animation: bg-move 20s ease infinite;
                }
            }

            & /deep/ {
                h1, h2 {
                    color: $color-description;
                }
            }
        }

        &.github {
            .column {
                h2, h3 {
                    width: 100%;
                    display: block;
                    margin-top: 100px;

                    strong {
                        text-shadow: 0 0 1px rgba(#fff, .5);
                    }
                }

                img {
                    width: 80%;
                    height: auto;
                    display: block;
                }

                @include media-breakpoint-down(sm) {
                    img {
                        margin: 0 auto;
                    }

                    h2 {
                        margin-top: 20px;
                    }
                }
            }
        }
    }
</style>
