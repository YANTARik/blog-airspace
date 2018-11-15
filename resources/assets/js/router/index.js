import Vue from 'vue'
import VueRouter from 'vue-router'



import UsersIndex from '../components/users/Users.vue'
//import UsersForm from '../components/users/UsersForm.vue'



Vue.use(VueRouter)

const router = new VueRouter({
	mode: 'history',
	routes: [
		{ path: '/users', component: UsersIndex },
        // { path: '/users/create', component: UsersForm, meta: { mode: 'create' }},
        // { path: '/users/edit', component: UsersForm, meta: { mode: 'edit' }},

	]
})

export default router
