import Vue from 'vue';
import VueRouter from 'vue-router';
import VueApollo from 'vue-apollo';
import {ApolloClient} from 'apollo-client';
import {InMemoryCache} from 'apollo-cache-inmemory';

import {
    NotFound, Loading, InputText, Menu,
    MenuCollection, Dropdown, DropdownItem,
    Header, Modal, Button
} from './components/default';

Vue.use(VueApollo);
Vue.use(VueRouter);

Vue.component('loading', Loading);
Vue.component('dropdown', Dropdown);
Vue.component('dropdown-item', DropdownItem);
Vue.component('input-text', InputText);
Vue.component('not-found', NotFound);
Vue.component('documentation-menu', Menu);
Vue.component('documentation-menu-items', MenuCollection);
Vue.component('header-item', Header);
Vue.component('modal', Modal);
Vue.component('btn', Button);


import http from './http';
import router from './routes';


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
