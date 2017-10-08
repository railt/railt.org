
/**
 * Polyfill
 */
import "babel-polyfill";

/**
 * Styles
 */
import "main.scss";

/**
 * Vue.js application
 */
import Vue from "vue";

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
        document.body.addClass('loaded');
    }
});
