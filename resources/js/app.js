import Vue from 'vue'
import App from './App.vue'
import router from './router'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueSweetalert2);
require('./bootstrap')

window.Vue = require('vue')
Vue.prototype.$axios = axios

const app = new Vue({
  render: h => h(App),
  router,
  data: {
    user: window.__app__.user, // we always have user if they login as we return user object in app.blade.php
    rooms: window.__app__.rooms,
    appName: 'Realtime Chat | Laravel, VueJS, Redis, Laravel Echo, SocketIO'
  }
}).$mount('#app')