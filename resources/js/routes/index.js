import Vue from 'vue';
import VueRouter from 'vue-router';
import Drive from '../views/Drive';

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        name: 'drive',
        component: Drive
    },
    {
        path: '/login',
        name: 'login',
        component: ()=> import('../views/Login.vue')
    },
    {
        path: '/register',
        name: 'register',
        component: ()=> import('../views/Register.vue')
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
})

export default router;