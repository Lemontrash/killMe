import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Index from './views/Index.vue';
import Accepted from './views/Accepted.vue';

const router = new VueRouter({
  routes: [
    { path: '/', name: 'index', component: Index },
    { path: '/accepted', name: 'accepted', component: Accepted }
  ]
});

require('./bootstrap');

Vue.config.devtools = true;
Vue.config.performance = true;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Admin from './components/Admin.vue';

const app = new Vue({
  el: '#admin',
  router,
  components: {
    Admin
  },
  render: h => h(Admin)
});
