import toastr from 'toastr'
import moment from 'moment'
import axios from 'axios'


require('./bootstrap');


window.Vue = require('vue');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('notes', require('./components/notes.vue').default);
Vue.component('auxcases', require('./components/auxcases.vue').default);
Vue.component('admincases', require('./components/admincases.vue').default);



const app = new Vue({
    el: '#app',
});
