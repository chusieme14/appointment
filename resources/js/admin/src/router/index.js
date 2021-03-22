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
            component: () => import('@admin/pages/dashboard/index.vue')
        }
    ]
})

export default router