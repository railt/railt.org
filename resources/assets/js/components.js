import Vue from 'vue';

// Loading
Vue.component('app-loading', require('./components/Loading'));
Vue.component('app-preloader', require('./components/Loading/Preloader'));

// Dropdown
Vue.component('app-select', require('./components/Dropdown'));
Vue.component('app-option', require('./components/Dropdown/DropdownItem'));

// Input
Vue.component('app-input', require('./components/InputText'));

// Menu
Vue.component('app-menu', require('./components/Menu'));
Vue.component('app-menu-content', require('./components/Menu/MenuCollection'));

// Header
Vue.component('app-header', require('./components/Header'));

// Modal
Vue.component('app-modal', require('./components/Modal'));

// Button
Vue.component('app-button',  require('./components/Button'));

// Error
Vue.component('app-error', require('./components/Error'));

// Auth
Vue.component('app-auth', require('./components/Auth'));

// Title
Vue.component('app-title', require('./components/Title'));

