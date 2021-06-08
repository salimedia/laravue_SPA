require('./bootstrap');

// import { createApp } from 'vue';
// import Index from './components/Posts/Index.vue'

// createApp(Index).mount("#app")


import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './components/App.vue'

import routes from './routes'


Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app',
    components: { App },
    router: new VueRouter(routes)
});