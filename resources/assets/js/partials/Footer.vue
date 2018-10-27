<template>
    <footer>
        <div class="footer-container">
            <slot></slot>
        </div>

        <sub class="copy">Railt Community &copy; 2016 &mdash; {{ year }}</sub>
    </footer>
</template>

<script>
    export default {
        props: ['year'],
        data() {
            return {};
        }
    }
</script>

<style scoped lang="scss">
    @import "./../../sass/kernel";

    footer {
        display: block;
        width: 100%;
        min-width: 100%;
        padding: 80px 0 40px 0;
        position: relative;
        background: $color-bg-dark;

        &:after {
            content: '';
            width: 48px;
            height: 48px;
            position: absolute;
            box-shadow: 0 0 0 2px $color-bg-dark;
            border-radius: 2px;
            z-index: 2;
            top: -24px;
            left: 50%;
            margin-left: -24px;
            background: $color-dark-white url(/images/icons/railt.svg) center center no-repeat;
            background-size: 32px 32px;
        }

        .footer-container {
            max-width: map-get($grid-breakpoints, lg);
            margin: 0 auto;
            box-sizing: border-box;
            padding: 0 15px;
            display: flex;
            justify-content: space-between;
            color: $color-extra-light-gray;

            & /deep/ {
                .column {
                    display: flex;
                    max-width: 33%;
                    position: relative;
                    flex-direction: column;
                    box-sizing: border-box;
                    padding: 0 10px 20px 10px;

                    h4 {
                        margin: 0;
                        padding: 0 0 10px 0;
                    }

                    a {
                        color: $color-extra-light-silver;
                        &:hover {
                            color: #fff;
                        }
                    }
                }
            }

            @include media-breakpoint-down(sm) {
                flex-wrap: wrap;
                & /deep/ .column {
                    flex: 100%;
                    width: 100%;
                    max-width: 100%;
                }
            }
        }

        .copy {
            display: block;
            text-align: center;
            padding-top: 50px;
            color: $color-silver;
            text-shadow: 0 0 1px rgba($color-silver, .2);
        }
    }
</style>
