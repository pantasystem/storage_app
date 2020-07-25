import Vue from 'vue';
import VueRouter from 'vue-router';
import Drive from '../views/Drive';

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        name: 'drive',
        component: Drive
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
})

export default router;