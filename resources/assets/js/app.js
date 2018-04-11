import Vue from 'vue';
import VueRouter from 'vue-router';
import VueApollo from 'vue-apollo';
import VueScrollTo from 'vue-scrollto';

import router from './routes';
import apollo from './apollo';
import './components';

Vue.use(VueApollo);
Vue.use(VueRouter);
Vue.use(VueScrollTo, {
    onDone: function(element) {
        if (element.href !== '#') {
            document.location = element.href;
        }
    },
});

window.app = new (window.Vue = Vue)({
    router: router,
    provide: apollo.provide(),
    mounted() {
        setTimeout(() => {
            document.body.classList.add('loaded');
        }, 100);
    }
}).$mount('#app');

