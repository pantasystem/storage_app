import Vue from 'vue';
import VueRouter from 'vue-router';
import Drive from '../views/Drive';
import store from '../store';

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        name: 'drive',
        component: Drive,
        beforeEnter: (to, from, next)=>{
            let isNeedLogin = store.getters.getNeedLogin;
            console.log("beforeEnter: to:" + to + ", from:" + from + ", needLogin:" + isNeedLogin);
            next();
        }
    },
    {
        path: '/login',
        name: 'login',
        component: ()=> import('../views/Login.vue'),
        beforeEnter: (to, from, next)=>{
            let isNeedLogin = store.getters.getNeedLogin;
            console.log("beforeEnter: to:" + to + ", from:" + from + ", needLogin:" + isNeedLogin);
            next();
        }
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