/**
 * Polyfill
 */
import "babel-polyfill";

/**
 * Styles
 */
import "main.scss";


/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import Axios from "axios";

let headers = {
    'Accept':           'application/json',
    'Content-Type':     'application/json',
    'X-Requested-With': 'XMLHttpRequest',
};

for (let header of Object.keys(headers)) {
    Axios.defaults.headers.common[header] = headers[header];
}

Axios.defaults.responseType = 'json';
Axios.defaults.maxRedirects = 0;

/**
 * Next we will register the CSRF and Auth Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let csrf = document.head.querySelector('meta[name="csrf-token"]');

if (csrf) {
    Axios.defaults.headers.common['X-CSRF-Token'] = csrf.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Vue.js application
 */
import Vue from "vue";

/**
 * Vue Axios plugin
 */
import VueAxios from "vue-axios";

Vue.use(VueAxios, Axios);

/**
 * Components
 */
import components from "./components";

for (let name of Object.keys(components)) {
    let component = components[name];
    Vue.component(name, require(`./components/${component}.vue`));
}

/**
 * Partials
 */
import partials from "./partials";

for (let name of Object.keys(partials)) {
    let partial = partials[name];
    Vue.component(name, require(`./partials/${partial}.vue`));
}

/**
 * Pages
 */
import pages from "./pages";

for (let name of Object.keys(pages)) {
    let page = pages[name];
    Vue.component(name, require(`./pages/${page}.vue`));
}

window.app = new Vue({
    el: 'main',
    mounted: function () {
        document.body.classList.add('loaded');
    }
});
