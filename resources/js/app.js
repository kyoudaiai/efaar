/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.EventBus = new Vue();

window.notytest = function (notification){
    EventBus.$emit('notification', notification);

}


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('messagebus', require('./components/MessageBus.vue').default);
Vue.component('firenotification', require('./components/firenotification.vue').default);
Vue.component('dashboardnotifications', require('./components/DashboardNotifications.vue').default);
Vue.component('tasklist', require('./components/TaskList.vue').default);

Vue.config.productionTip = false
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import store from './components/DataStore';
const app = new Vue({
    store,
    el: '#app',
});
