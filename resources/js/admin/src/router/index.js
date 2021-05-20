import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

const router = new Router({
    mode: 'history',
    base: '/',
    scrollBehavior (){
        return {x: 0, y: 0}
    },

    routes: [
        {
            path:'/admin/dashboard',
            component: () => import('@admin/pages/dashboard/index.vue'),
            name:'dashboard'
        },
        {
            path:'/admin/appointment',
            component: () => import('@admin/pages/appointment/index.vue'),
            name:'appointment'
        }
    ]
})

export default router