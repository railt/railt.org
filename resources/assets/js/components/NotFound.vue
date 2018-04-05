<template>
    <div class="page-not-found">
        &nbsp;
    </div>
</template>

<script>
    export default {
        name: 'not-found'
    }
</script>

<style scoped>
    @import "/../../sass/kernel";

    .page-not-found {
        position: absolute;
        width: 100%;
        height: 100%;
        display: block;
        min-height: 400px;
        background: url(./../../img/404.png) center bottom no-repeat;
    }
</style>
