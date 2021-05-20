require('../bootstrap');
window.Vue = require('vue');

// import router from './src/router/index'
import vuetify from './src/plugin/vuetify/index'
const axios = require('axios');

Vue.component('main-app', require('@front/layout/App.vue').default);

const app = new Vue({
    el:'#front-app',
    // router,
    vuetify,
    axios
});
