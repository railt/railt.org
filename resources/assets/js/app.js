import Vue from 'vue';
import VueRouter from 'vue-router';
import VueApollo from 'vue-apollo';
import VueScrollTo from 'vue-scrollto';
import VuePrism from 'vue-prism';

import router from './routes';
import apollo from './apollo';
import './components';
import 'prismjs/themes/prism.css';

Vue.use(VueApollo);
Vue.use(VueRouter);
Vue.use(VuePrism);
Vue.use(VueScrollTo, {
    onDone: function(element) {
        let isHeader = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'].indexOf(element.tagName.toLowerCase()) !== -1;
        let hasId = element.id !== '';

        if (isHeader && hasId) {
            document.location = `#${element.id}`;
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

