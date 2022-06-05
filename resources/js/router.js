import Vue from 'vue'
import * as VueRouter from 'vue-router'
import ListRoom from './pages/ListRoom'
import Room from './pages/Room'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'list.room',
    component: ListRoom
  },
  {
    path: '/rooms/:roomId',
    name: 'room',
    component: Room
  }
]

const router = new VueRouter({
  mode: 'history',
  routes
})

export default router