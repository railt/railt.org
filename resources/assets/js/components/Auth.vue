<template>
    <article class="user">
        <template v-if="loading">
            <slot name="loading"></slot>
        </template>
        <template v-else-if="! loading && ! isLoggedIn">
            <slot name="guest"></slot>
        </template>
        <template v-else-if="! loading && isLoggedIn">
            <slot :user="user" name="auth"></slot>
        </template>
    </article>
</template>

<script>
    import Authentication from '../../graphql/auth.graphql';

    export default {
        data() {
            return {
                user: null,
                loading: true,
            }
        },
        computed: {
            isLoggedIn() {
                return this.user !== null;
            }
        },
        apollo: {
            user: {
                query: Authentication,
                result({data}) {
                    this.loading = false;
                    this.user = data.user.current;
                },
                error(error) {
                    this.loading = false;
                    this.user = false;
                }
            }
        }
    }
</script>
