<template>
    <transition name="modal">
        <div class="modal" @click.self.stop="$emit('close')">
            <section class="modal-container">
                <header class="modal-header">
                    <slot name="header"></slot>
                </header>

                <article class="modal-body">
                    <slot name="body"></slot>
                </article>

                <footer class="modal-footer">
                    <slot name="footer"></slot>
                </footer>
            </section>
        </div>
    </transition>
</template>

<script>
    export default {
    }
</script>

<style lang="scss" scoped>
    @import "./../../sass/kernel";

    .modal {
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(#000, .4);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: opacity .3s ease;


        &-container {
            margin: 0 auto;
            padding: 0;
            background: #fff;
            border-radius: 3px;
            box-shadow: $ui-box-shadow-dark;
            transition: all .3s ease;
        }

        &-header {
            border-radius: 4px 4px 0 0;
            padding: 10px 20px;
            & /deep/ {
                h1, h2, h3, h4, h5, h6 {
                    margin: 0 !important;
                    padding: 0 !important;
                }
            }
        }

        &-body {
            padding: 10px 20px 20px 20px;
            overflow: auto;
            position: relative;
            max-height: 500px;
            @include scrollbar;

            & /deep/ {
                .preloader {
                    position: relative;
                    width: 100%;
                    min-width: 140px;
                    height: 100px;
                    padding: 0 0 100px 0;
                }
            }
        }

        &-footer {
            box-shadow: inset 0 1px 0 $color-border;
            padding: 10px 20px;
            background: $color-bg;
            border-radius: 0 0 4px 4px;
        }
    }

    .modal-enter,
    .modal-leave-active {
        opacity: 0;
    }

    .modal-enter .modal-container {
        transform: scale(1.1) translateY(-20px);
    }

    .modal-leave-active .modal-container {
        transform: scale(1.1) translateY(20px);
    }
</style>
