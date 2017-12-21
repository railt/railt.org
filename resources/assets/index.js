
/**
 * Babel polyfill
 */
import "babel-polyfill";


/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

import "prismjs/prism";
import "./highlight/json";
import "./highlight/pp";
import "./highlight/accord";
import "./highlight/php";
import "./highlight/graphql";

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
 * Main UI
 */
import Element from "element-ui";
import locale from "element-ui/lib/locale/lang/en";

import "main.scss";

Vue.use(Element, { locale });


/**
 * Vue Axios plugin
 */
import VueAxios from "vue-axios";

Vue.use(VueAxios, Axios);


/**
 * Load components
 */
const components = require("./components.coffee").default;

for (let name of Object.keys(components)) {
    Vue.component(name, require(`./${components[name]}.vue`));
}

window.app = new Vue({
    el: 'main',
    mounted: function () {
        document.body.classList.add('loaded');
    }
});
