require('../bootstrap');

window.Vue = require('vue');

import router from './src/router/index'
import vuetify from './src/plugin/vuetify/index'
import VueToast from 'vue-toast-notification';
import VeeValidate from 'vee-validate';

import 'vue-toast-notification/dist/index.css';

Vue.use(VeeValidate);
Vue.use(VueToast);
Vue.component('main-app', require('@admin/layout/Main.vue').default);

const app = new Vue({
    el:'#app',
    router,
    vuetify,
    VueToast,
    VeeValidate
});

