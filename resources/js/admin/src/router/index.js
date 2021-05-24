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
            path:'/',
            component: () => import('@admin/layout/App.vue'),
            children:[
                {
                    path:'admin/dashboard',
                    component: () => import('@admin/pages/dashboard/index.vue'),
                    name:'dashboard'
                },
                {
                    path:'admin/appointment',
                    component: () => import('@admin/pages/appointment/index.vue'),
                    name:'appointment'
                }
            ]
        },
        {
            path:'/admin/login',
            component: () => import('@admin/layout/login.vue'),
            name:'login'
        }
    ]
})

export default router