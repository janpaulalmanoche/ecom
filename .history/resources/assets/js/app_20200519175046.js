
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('select-products', require('./components/SelectProducts.vue'));
Vue.component('reseller-dashboard', require('./components/DashboardReseller.vue'));
Vue.component('admin-dashboard', require('./components/DashboardAdmin.vue'));
Vue.component('reseller-order', require('./components/ResellerOrderList.vue'));
Vue.component('reseller-profit', require('./components/ResellerProfit.vue'));


const app = new Vue({
    el: '#app'
});
