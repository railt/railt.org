import Vue from 'vue';
import VueRouter from 'vue-router';
import VueApollo from 'vue-apollo';
import {ApolloClient} from 'apollo-client';
import {HttpLink} from 'apollo-link-http';
import {InMemoryCache} from 'apollo-cache-inmemory';

Vue.use(VueApollo);
Vue.use(VueRouter);

Vue.component('loading', require('./components/Loading.vue'));
Vue.component('dropdown', require('./components/Dropdown.vue'));
Vue.component('dropdown-item', require('./components/DropdownItem.vue'));
Vue.component('input-text', require('./components/InputText.vue'));

Vue.component('not-found', require('./components/NotFound.vue'));

Vue.component('documentation-menu', require('./components/Menu.vue'));
Vue.component('documentation-menu-items', require('./components/Menu/MenuCollection.vue'));


import Home from './pages/Home';
import NotFound from './components/NotFound';
import Documentation from './pages/Documentation';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/docs/?:path*',
            name: 'docs',
            component: Documentation,
        },
        {
            path: '*',
            component: NotFound
        }
    ]
});

const http = new HttpLink({
    uri: process.env.MIX_GRAPHQL_URI
});

const client = new ApolloClient({
    link: http,
    cache: new InMemoryCache(),
    defaultOptions: {
       /* watchQuery: {
            fetchPolicy: 'network-only',
            errorPolicy: 'ignore',
        },
        query: {
            fetchPolicy: 'network-only',
            errorPolicy: 'all',
        },*/
    },
    connectToDevTools: true,
});

const apollo = new VueApollo({
    defaultClient: client,
    defaultOptions: {
        $loadingKey: 'loading'
    }
});

window.app = new Vue({
    router: router,
    provide: apollo.provide()
}).$mount('#app');

window.Vue = Vue;
