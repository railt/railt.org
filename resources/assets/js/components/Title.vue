<template>
    <span>
        <meta name="page-title" :content="updatedTitle" />
    </span>
</template>

<script>
    export default {
        props: {
            title: {
                type: String,
                default: ''
            }
        },
        computed: {
            updatedTitle() {
                if (this.title) {
                    document.title = `${this.title} — Railt`;
                }

                return this.title;
            }
        }
    }
</script>

<style scoped>

</style>
