import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Users from './components/users/Users.vue'

const router = new VueRouter({
	mode: 'history',
	routes: [
		{ path: '/api/admin/users', name: 'api.users.store', component: Users },
        { path: '/api/admin/users/:id', name: 'api.users.update', component: Users},
        { path: '/api/admin/users/:id', name: 'api.users.destroy', component: Users},

	]
})

export default router
