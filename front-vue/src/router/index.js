import Vue from 'vue'
import VueRouter from 'vue-router'
import Guard from '../services/middleware'
import Login from '../views/Login.vue'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/home',
    name: 'Home',
    component: Home,
    beforeEnter: Guard.auth
  },
  {
    path: '/login',
    name: 'login',
    component: Login,
  }
]

const router = new VueRouter({
  routes
})

export default router
