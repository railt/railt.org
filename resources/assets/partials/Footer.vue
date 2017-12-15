<style scoped lang="scss">
    @import "kernel";

    footer {
        position: relative;
        z-index: 3;
        background: $color-bg-dark;
        box-shadow: inset 0 1px 0 #000;
        color: $color-inv-text-primary;

        a {
            color: $color-inv-text-primary;
            text-decoration: none;

            &:hover, &:visited, &:active {
                text-decoration: underline;
                color: $color-inv-text-primary;
            }
        }

        & > header {
            background: $color-bg-dark-alter;

            .content {
                display: flex;
                justify-content: space-around;
                flex-wrap: wrap;

                & > * {
                    padding: 40px 0;
                }
            }

            aside {
                display: flex;
                flex-direction: column;
                box-sizing: border-box;
                padding-right: 10px;

                & > div {
                    margin-bottom: 10px;

                    a {
                        color: #fff;
                        font-size: 27px;
                        line-height: 30px;
                    }
                }

                code {
                    padding: 0 20px 0 35px;
                    box-sizing: border-box;
                    height: 42px;
                    line-height: 42px;
                    background: $color-bg-dark;
                    border-radius: 3px;
                    display: block;
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    color: $color-text-placeholder;
                    position: relative;

                    &:before {
                        color: $color-red;
                        content: '$';
                        left: 17px;
                        pointer-events: none;
                        position: absolute;
                    }
                }
            }

            article {
                display: flex;
                align-items: flex-end;

                /deep/ .el-button {
                    svg {
                        width: auto;
                        height: $font-size;
                        fill: #fff;
                        position: relative;
                        top: 2px;
                        margin-right: 8px;
                        margin-top: -5px;
                    }
                }
            }
        }

        & > footer {
            padding: 40px 0;

            .powered-by {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                padding-bottom: 40px;
                box-shadow: 0 1px 0 rgba(#fff, .1);
                margin-bottom: 40px;

                /deep/ {
                    a {
                        margin: 20px;
                        display: block;
                        width: 116px;
                        text-decoration: none;
                        font-size: 80%;
                        font-style: italic;
                        color: $color-text-regular;
                        text-align: center;
                        transition: color .3s ease;

                        svg {
                            display: block;
                            width: 60px;
                            margin: 15px auto;
                            margin-bottom: 0;
                            height: auto;
                            fill: $color-text-regular;
                            transition: fill .3s ease;
                        }


                        &:hover {
                            color: $color-text-placeholder;
                            svg {
                                fill: $color-text-placeholder;
                            }
                        }
                    }
                }
            }

            .copy {
                display: block;
                text-align: center;
                font-size: 12px;
                color: $color-text-placeholder;
            }
        }
    }
</style>

<template>
    <footer>
        <header>
            <section class="content">
                <aside>
                    <div>
                        <a href="https://github.com/railt/railt" target="_blank">Быстрый старт</a>
                    </div>
                    <a href="https://packagist.org/packages/railt/railt" target="_blank">
                        <code>composer require <span class="color-white">railt/railt</span></code>
                    </a>
                </aside>
                <article>
                    <slot></slot>
                </article>
            </section>
        </header>

        <footer>
            <section class="content">
                <article class="powered-by">
                    <slot name="poweredBy"></slot>
                </article>

                <span class="copy">
                    Copyright &copy;{{ year }} Nesmeyanov Kirill. The contents of this page are licensed MIT.
                </span>
            </section>
        </footer>
    </footer>
</template>


<script>
    export default {
        props: {
            year: {
                type: String
            }
        },
        mounted() {
            this.$nextTick(i => {
                for (let child of this.$children) {
                    child.$on('click', e => {
                        this.handleClick(
                            child.$vnode.data.attrs.href || null,
                            child.$vnode.data.attrs.target || null,
                        );
                    });
                }
            });
        },
        methods: {
            handleClick(href, target) {
                if (href) {
                    if (target === '_blank') {
                        window.open(href);
                    } else {
                        document.location = href;
                    }
                }
            }
        }
    }
</script>

