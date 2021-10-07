import Vue from 'vue'
import VueRouter from 'vue-router'
import Guard from '../services/middleware'
import Login from '../views/Login.vue'
import Fretes from '../views/Fretes.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Fretes',
    component: Fretes,
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
