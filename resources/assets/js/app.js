
import Vue from 'vue';
import VueRouter from 'vue-router';
import VeeValidate from 'vee-validate';
import VueProgressBar from 'vue-progressbar'
import Users from './components/Users.vue';
import Posts from './components/Posts.vue';
import swal from 'sweetalert2'
import { Form, HasError, AlertError } from 'vform';
import VueCkeditor from 'vue-ckeditor2';
// import Ckeditor from './ckeditor.js';
import Datepicker from 'vuejs-datepicker';
import Multiselect from 'vue-multiselect';
window._ = require('lodash');
var moment = require('moment');

//



Vue.use(VueRouter);
Vue.use(VeeValidate, config);
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '3px'
});

window._ = require('lodash');
window.toast = toast;
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

window.swal = swal;

const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

const app = new Vue({

    el: '#App',
    components: {
        Users,
        Posts,
        Multiselect,
        Datepicker,
        VueCkeditor

    },
    data: {
        users: [],
        posts: [],
        hasError: true,
        hasDeleted: true,
        hasAgeError: true,
        showModal: false,
    },
    routes: [
        { path: '/api/users', name: 'api.users.store', component: Users },
        { path: '/api/posts', name: 'api.posts.store', component: Posts }
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

Vue.component(
    'users-list',
    require('./components/Users.vue')
);
Vue.component(
    'posts-list',
    require('./components/Posts.vue')
);

