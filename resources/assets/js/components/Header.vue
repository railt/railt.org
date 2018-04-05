<template>
    <header class="header">
        <div class="container">
            <router-link to="/" class="logo"></router-link>

            <nav class="menu">
                <router-link to="/docs">Документация</router-link>
                <router-link to="/language">GraphQL</router-link>
                <router-link to="/github">GitHub</router-link>
                <router-link to="/chat">Чат</router-link>
            </nav>
        </div>
    </header>
</template>

<script>
    export default {
        name: 'header-item'
    }
</script>

<style scoped>

</style>
