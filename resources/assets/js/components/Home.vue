<template>
    <section class="page">
        <section class="splash" :class="{ready: ready}">
            <div class="middle">
                <img src="../../img/logo-dark.svg" alt="Railt" />
                <h2>The GraphQL Framework</h2>
                <div class="code-layout">
                    <div class="code-inner">
                        <pre><code class="language-graphql">type Idea {
    """
    Dreaming of something more?
    """
    create: Project!
}

type Project {
    poweredBy: Railt
    implementedBy: You
}</code></pre>
                    </div>
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
            setTimeout(() => {
                this.ready = true;
            }, 1000);
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
            width: 500px;
            margin: 0 auto;
            padding: 3px;
            border-radius: 5px;
            overflow: hidden;

            &:after {
                content: '';
                position: absolute;
                left: 50%;
                bottom: 0;
                width: 200%;
                height: 200%;
                transform: scaleX(0) rotate(45deg);
                background: $color-main;
                transition: transform 1s $ui-animation-swift;
                transform-origin: 0 0;
            }

            .code-inner {
                width: 100%;
                height: 100%;
                border-radius: 3px;
                background: #fff;
                position: relative;
                z-index: 2;

                pre {
                    margin: 0;
                    padding: 0;
                    display: block;
                }

                code {
                    margin: 0;
                    padding: 20px 25px;
                    display: block;
                    font-size: 15px;
                    line-height: 25px;
                    background: rgba(#eee, .3);
                    opacity: 0;
                    transition: opacity .3s ease 1s;
                }
            }
        }

        &.ready {
            .code-layout {
                &:after {
                    transform: scaleX(1) rotate(45deg);
                }

                code {
                    opacity: 1;
                }
            }
        }
    }
</style>
