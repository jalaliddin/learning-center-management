/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

import VueQRCodeReader from 'vue-qrcode-reader';
import VueIziToast from "vue-izitoast";
import 'izitoast/dist/css/iziToast.min.css';
import Vuetify from "vuetify";
Vue.use(VueQRCodeReader);
Vue.use(VueIziToast);
Vue.use(Vuetify);
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
// import QrReader from './components/QrReaderComponent';

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('qrreader-component', require('./components/QrReaderComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
