require('../bootstrap');

window.Vue = require('vue');

import router from './src/router/index'
import vuetify from './src/plugin/vuetify/index'

Vue.component('main-app', require('@admin/layout/Main.vue').default);

const app = new Vue({
    el:'#app',
    router,
    vuetify
});

