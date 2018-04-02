import Vue from 'vue';
import VueRouter from 'vue-router';
import VueApollo from 'vue-apollo';
import {ApolloClient} from 'apollo-client';
import {HttpLink} from 'apollo-link-http';
import {InMemoryCache} from 'apollo-cache-inmemory';
import Home from './pages/Home';
import Documentation from './pages/Documentation';


Vue.use(VueApollo);
Vue.use(VueRouter);


Vue.component('loading', require('./components/Loading.vue'));
Vue.component('dropdown', require('./components/Dropdown.vue'));
Vue.component('dropdown-item', require('./components/DropdownItem.vue'));
Vue.component('input-text', require('./components/InputText.vue'));


const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/docs',
            component: Documentation,
            children: [
                {
                    path: ':path*',
                    name: 'docs',
                    component: Documentation,
                }
            ]
        },
    ]
});

const http = new HttpLink({
    uri: process.env.MIX_GRAPHQL_URI
});

const client = new ApolloClient({
    link: new HttpLink({
        uri: process.env.MIX_GRAPHQL_URI
    }),
    cache: new InMemoryCache(),
    defaultOptions: {
        watchQuery: {
            fetchPolicy: 'network-only',
            errorPolicy: 'ignore',
        },
        query: {
            fetchPolicy: 'network-only',
            errorPolicy: 'all',
        },
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
