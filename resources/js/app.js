

require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
// Routes Imported
import {routes} from './routes'
// Import User Class
import User from './helpers/user'
// Sweet alert start
import Swal from 'sweetalert2'
// import notification
import Notification from './helpers/notification'
import NProgress from 'vue-nprogress'
import NprogressContainer from 'vue-nprogress/src/NprogressContainer'

import AuthFooter from './components/includes/footer/auth_footer'
import Sidebar from './components/includes/header/sidebar.vue'
import Header from './components/includes/header/header.vue'
import PageNav from './components/includes/header/nav.vue'
import Footer from './components/includes/footer/footer.vue'
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

window.Toast = Toast;
window.Swal = Swal
window.User = User
window.Notification = Notification
Vue.use(VueRouter)
Vue.use(NProgress)
Vue.use(require('vue-moment'))
const nprogress = new NProgress()
Vue.component('nprogress-container', NprogressContainer)
Vue.component('auth-footer', AuthFooter)
Vue.component('sidebar', Sidebar)
Vue.component('page-header', Header)
Vue.component('page-nav', PageNav)
Vue.component('page-footer', Footer)
const router = new VueRouter({
    routes,
    mode: 'history'
  })
  


const app = new Vue({
    el: '#app',
    router,
    nprogress
});
