<template>
    <section class="blog">
        <section class="articles">
            <slot name="articles"></slot>
        </section>
        <aside class="aside">
            <slot name="aside"></slot>
        </aside>
    </section>
</template>

<script>
    export default {

    }
</script>

<style scoped lang="scss">
    @import "./../../sass/kernel";

    $aside-width: 350px;

    .blog {
        margin: 0 auto;
        padding: 20px 0 30px 0;
        box-sizing: border-box;
        max-width: map-get($grid-breakpoints, xl);
        display: flex;

        .panel {
            width: 100%;
            background: #fff;
            border-radius: 2px;
            margin-bottom: 30px;
            box-sizing: border-box;
            box-shadow: 0 1px 5px $color-light-gray;
        }

        .articles {
            flex: 1;
            box-sizing: border-box;
            max-width: map-get($grid-breakpoints, xl) - $aside-width;
            padding: 0 0 0 15px;
        }

        .aside {
            flex: $aside-width;
            width: $aside-width;
            max-width: $aside-width;
            min-width: $aside-width;
            box-sizing: border-box;
            padding: 0 15px 0 30px;
            background: inherit;

            & > * {
                box-shadow: 0 1px 5px $color-light-gray;
            }
        }
    }
</style>
