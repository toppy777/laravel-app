import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
// import { FontAwesomeIcon } from "@fortawesome/fontawesome-free/js/all"

require("@/assets/css/reset.css")
require("@/assets/css/style.scss")

// Vue.component('fa-icon', FontAwesomeIcon)
Vue.config.productionTip = false

Vue.prototype.$getApi = async (uri) => {
  const result = await fetch("https://limitless-refuge-01562.herokuapp.com/api/2020/" + uri).catch(err => {
    throw err
  })
  return result.json()
}

new Vue({
  router,
  store,
  render: function (h) { return h(App) }
}).$mount('#app')
