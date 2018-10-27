import Vue from 'vue';

/*
|--------------------------------------------------------------------------
| Partials
|--------------------------------------------------------------------------
*/
Vue.component('app-header', require('./partials/Header'));
Vue.component('app-footer', require('./partials/Footer'));
Vue.component('app-splash', require('./partials/Splash'));

/*
|--------------------------------------------------------------------------
| Components
|--------------------------------------------------------------------------
*/
Vue.component('app-tab', require('./components/Tab'));
Vue.component('app-text', require('./components/Text'));
Vue.component('app-tabs', require('./components/Tabs'));
Vue.component('app-title', require('./components/Title'));
Vue.component('app-search', require('./components/Search'));
Vue.component('app-select', require('./components/Select'));
Vue.component('app-option', require('./components/Option'));
Vue.component('app-loading', require('./components/Loading'));
Vue.component('app-tooltip', require('./components/Tooltip'));
Vue.component('app-section', require('./components/Section'));
Vue.component('app-content', require('./components/Content'));
Vue.component('app-article', require('./components/Article'));
Vue.component('app-checkbox', require('./components/Checkbox'));
Vue.component('app-dropdown', require('./components/Dropdown'));
Vue.component('app-password', require('./components/Password'));

Vue.component('v-input', require('./components/DynamicInput'));

/*
|--------------------------------------------------------------------------
| Pages
|--------------------------------------------------------------------------
*/
Vue.component('app-error', require('./page/Error'));
Vue.component('app-blog', require('./page/Blog'));
Vue.component('app-docs', require('./page/Docs'));

