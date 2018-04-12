import Vue from 'vue'
import Router from 'vue-router'
import List from './views/List.vue'
import Add from './views/Add.vue'
import Popular from './views/Popular.vue'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'list',
      component: List
    },
    {
      path: '/add',
      name: 'add',
      component: Add
    },
    {
      path: '/popular',
      name: 'popular',
      component: Popular
    }
  ]
})
