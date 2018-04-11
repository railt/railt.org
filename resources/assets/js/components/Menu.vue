<template>
    <ApolloQuery :query="require('../../graphql/menu.graphql')">
        <template slot-scope="{ result: { loading, error, data } }">
            <template v-if="data">
                <app-menu-content :menu="data.menu"></app-menu-content>
            </template>
        </template>
    </ApolloQuery>
</template>

<script>
    export default {
        name: 'documentation-menu',
    }
</script>
