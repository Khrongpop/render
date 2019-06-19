/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');



import BootstrapVue from 'bootstrap-vue'
// const BootstrapVue =  require('bootstrap-vue')
// app.js
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue)
Vue.config.productionTip = false

import html2canvas from 'html2canvas'

let MyPlugin = {
  install(Vue, options) {
    window.html2canvas = html2canvas
  }
}

// ...
import VueHtml2Canvas from 'vue-html2canvas';

Vue.use(VueHtml2Canvas);
Vue.use(MyPlugin)

import 'babel-polyfill'
import 'babel-plugin-transform-regenerator'

import axios from 'axios'
Vue.use(axios)

import  VueFire from 'vuefire'
Vue.use(VueFire);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
