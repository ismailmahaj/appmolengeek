require('./bootstrap');
window.Vue = require('vue');


import $ from 'jquery';

import Vuetify from 'vuetify';
import 'fullcalendar';
import { Datetime } from 'vue-datetime';
//import { Kalendar } from 'kalendar-vue';
// window.Kalendar = require('kalendar-vue');
//import 'kalendar-vue/dist/kalendar-vue.css';


Vue.component('datetime', Datetime);

import VueRouter from  'vue-router';
window.Vue.use(VueRouter);


Vue.component('example-component' , require('./components/ExampleComponent.vue'));
Vue.component('calendar-component', require('../../Modules/Calendar/Resources/assets/js/components/Calendar.vue'));

const app = new Vue({
  el: '#app',
});