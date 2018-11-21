
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Users from './components/users/Users.vue'

//import router from './router'
Vue.component('modal', {
    template: '#modal-template'
})

const users = new Vue({

    el: '#UserController',
    template: `<users></users>`,
    components: { Users
    },
    data: {
        users: [],
        hasError: true,
        hasDeleted: true,
        hasAgeError: true,
        showModal: false,
    },
    routes: [
        { path: '/api/admin/users', name: 'api.users.store', component: Users },
        { path: '/api/admin/users/:id', name: 'api.users.update', component: Users},
        { path: '/api/admin/users/:id', name: 'api.users.destroy', component: Users},

    ]
});
