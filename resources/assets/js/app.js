
import Vue from 'vue';
import VueRouter from 'vue-router';
import VeeValidate from 'vee-validate';

Vue.use(VueRouter);
Vue.use(VeeValidate, config);

import Users from './components/users/Users.vue'

//import router from './router'
Vue.component('modal', {
    template: '#modal-template'
});

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

const config = {
    aria: true,
    classNames: {},
    classes: false,
    delay: 0,
    dictionary: null,
    errorBagName: 'errors', // change if property conflicts
    events: 'input|blur',
    fieldsBagName: 'fields',
    i18n: null, // the vue-i18n plugin instance
    i18nRootKey: 'validations', // the nested key under which the validation messages will be located
    inject: true,
    locale: 'en',
    validity: false
};
