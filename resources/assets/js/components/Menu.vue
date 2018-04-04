<template>
    <documentation-menu-items :menu="menu"></documentation-menu-items>
</template>

<script>
    import gql from 'graphql-tag';

    const DOCUMENTATION_MENU = gql`
        query LoadMenu {
            menu { ...MenuBody,
                children { ...MenuBody,
                    children { ...MenuBody,
                        children { ...MenuBody }
                    }
                }
            }
        }

        fragment MenuBody on Menu {
            id,
            urn,
            type,
            title,
            orderId
        }
    `;

    export default {
        data() {
            return {
                menu: [],
            }
        },
        apollo: {
            menu: {
                query: DOCUMENTATION_MENU,
                result({data}) {
                    this.menu = data.menu;
                }
            }
        }
    }
</script>
