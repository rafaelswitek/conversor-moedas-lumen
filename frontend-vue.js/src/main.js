import Vue from 'vue'
import App from './App.vue'
import router from './router'
import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import http from './http'
import store from './store'

import JwPagination from 'jw-vue-pagination'

Vue.config.productionTip = false
Vue.prototype.$http = http

Vue.component('jw-pagination', JwPagination)

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
