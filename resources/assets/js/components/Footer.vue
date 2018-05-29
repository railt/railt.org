<template>
    <footer class="footer">
        <div class="container">
            <nav>
                <router-link to="/docs">Документация</router-link>
                <a href="https://github.com/railt/railt" target="_blank">GitHub</a>
                <a href="https://discord.gg/ND7SpD4" target="_blank">Чат</a>
            </nav>
        </div>
    </footer>
</template>

<script>
    export default {

    }
</script>

<style lang="scss" scoped>
    @import "../../sass/kernel";

    .footer {
        color: #fff;
        width: 100vw;
        padding: 20px 0;
        box-sizing: border-box;
        background: $color-bg-dark;

        .container {
            margin: 0 auto;
            max-width: $ui-width;

            nav {
                font-size: 16px;
                display: flex;
                justify-content: space-between;

                a {
                    color: #fff;
                }
            }
        }
    }
</style>
