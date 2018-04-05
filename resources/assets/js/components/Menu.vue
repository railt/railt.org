<template>
    <documentation-menu-items :menu="menu"></documentation-menu-items>
</template>

<script>
    import DocumentationMenu from './../../graphql/menu.graphql';

    export default {
        name: 'documentation-menu',
        data() {
            return {
                menu: [],
            }
        },
        apollo: {
            menu: {
                query: DocumentationMenu,
                result({data}) {
                    this.menu = data.menu;
                }
            }
        }
    }
</script>
