
import Vue from 'vue'

import App from './components/users/Users.vue'
import router from './router'


const app = new Vue({
    el: '#UserController',
    template: `<app></app>`,
    components: { App },
    data: {
        items: [],
        item: {name: '',},
        edit: false,
        editIndex:-1
    },
    router
})
