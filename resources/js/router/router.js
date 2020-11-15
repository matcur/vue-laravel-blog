import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

let routes = {}

export const router = new VueRouter({
  mode: 'history',
  routes: routes,
})
