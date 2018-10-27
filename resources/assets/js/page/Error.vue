<template>
    <section class="error">
        <h1>
            <slot name="code"></slot>
        </h1>
        <span>
            <slot name="description"></slot>
        </span>
    </section>
</template>

<script>
    export default {

    }
</script>

<style lang="scss" scoped>
    @import "./../../sass/kernel";

    .error {
        margin-top: -82px;
        width: 100vw;
        height: 100vh;
        overflow: hidden;
        display: flex;
        flex: 100%;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-size: 1.875rem;
        line-height: 2.4rem;
        color: $color-text;

        h1 {
            text-align: center;
            font-size: 9rem;
            font-weight: bold;
        }

        span {
            display: inline-block;
            max-width: 500px;
        }

        a {
            display: block;
            width: 120px;
            text-align: center;
            margin: 20px auto;
            border-radius: 5px;
            padding: 0 15px;
            box-shadow: 0 0 0 2px $color-border;
            line-height: 3rem;
            font-size: 1.2rem;
            color: $color-description;
            text-decoration: none;

            &:hover {
                transition: box-shadow .2s ease;
                box-shadow: 0 0 0 2px darken($color-border, 15%);
            }
        }
    }
</style>
