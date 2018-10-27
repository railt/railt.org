<template>
    <article class="article panel">
        <slot></slot>
    </article>
</template>

<script>
    export default {}
</script>

<style scoped lang="scss">
    @import "./../../sass/kernel";

    .article {
        .figure {
            margin: 0;
            display: block;
            position: relative;
            text-decoration: none;
            overflow: hidden;

            img {
                display: block;
                width: 100%;
                height: auto;
                border-radius: 3px 3px 0 0;
            }
        }

        & /deep/ &-content {
            padding: 40px;

            h2 {
                margin: 0;

                a {
                    color: $color-text;
                    text-decoration: none;

                    &:hover {
                        color: $color-main;
                    }
                }
            }
        }
    }
</style>
