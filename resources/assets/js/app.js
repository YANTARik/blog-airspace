
import Vue from 'vue'

import App from './components/users/Users.vue'
import userModal from './components/users/UserModal.vue'
import router from './router'

const app = new Vue({
    el: '#UserController',
    template: `<app></app>`,
    components: {
        App,
        userModal
    },
    data: {
        users: [],
        userModal: false,
        user: {name: '',lastname: '',email: '',password: '',avatar: '',},
        edit: false
    },
    router
})
