import Vue from 'vue';
import VueApollo from 'vue-apollo';
import VueScrollTo from 'vue-scrollto';

import apollo from './apollo';
import './components';


Vue.use(VueApollo);

Vue.use(VueScrollTo, {
    onDone: function(element) {
        console.log(element);
    },
});

function run() {
    return new (window.Vue = Vue)({
        provide: apollo.provide(),
        mounted() {
            setTimeout(() => {
                document.body.classList.add('loaded');
            }, 100);
        }
    }).$mount('#app');
}

if (document.readyState === 'complete') {
    window.vue = run();
} else {
    document.onreadystatechange = e => {
        if (document.readyState === 'complete') {
            window.vue = run();
        }
    };
}
