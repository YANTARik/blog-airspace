
import Vue from 'vue';
import VueRouter from 'vue-router';
import VeeValidate from 'vee-validate';
//
Vue.use(VueRouter);
Vue.use(VeeValidate, config);
//
import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '3px'
})

import Users from './components/users/Users.vue';

import { Form, HasError, AlertError } from 'vform';
import objectToFormData from 'object-to-formdata';

//const objectToFormData = window.objectToFormData



import swal from 'sweetalert2'
window.swal = swal;

const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

window.toast = toast;

window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)



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
