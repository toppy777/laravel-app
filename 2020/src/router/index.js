import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  // {
  //   path: '/',
  //   name: 'Home',
  //   component: Home
  // },
  // {
  //   path: '/about',
  //   name: 'About',
  //   // route level code-splitting
  //   // this generates a separate chunk (about.[hash].js) for this route
  //   // which is lazy-loaded when the route is visited.
  //   component: function () {
  //     return import(/* webpackChunkName: "about" */ '../views/About.vue')
  //   }
  // }

  {
    path: '/',
    name: 'root',
    component: function() {
      return import('../views/AllProjectPage.vue')
    }
  },
  /* 2020年度課題 1 */
  {
    path: '/2020/1',
    name: '2020-1',
    component: function() {
      return import('../views/ShopsPage.vue')
    }
  },
  {
    path: '/2020/1/cart',
    name: '2020-1-cart',
    component: function() {
      return import('../views/CartPage.vue')
    }
  },
  {
    path: '/2020/1/order-log',
    name: '2020-1-order_log',
    component: function() {
      return import('../views/OrderLogPage.vue')
    }
  },
  {
    path: '/2020/1/others',
    name: '2020-1-others',
    component: function() {
      return import('../views/OthersPage.vue')
    }
  },
]

const router = new VueRouter({
  base: process.env.BASE_URL,
  routes
})

export default router
