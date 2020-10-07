import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from '../components/login/Login.vue'
import Home from '../components/home/Home.vue'
import store from '../store'

Vue.use(VueRouter)

const routes = [
    {
        path: '/', name: 'login', component: Login,
        meta: {
            publica: true
        }
    },
    { path: '/home', name: 'home', component: Home,
    meta: {
        publica: true
    } },
];

const router = new VueRouter({
    routes
})

router.beforeEach((routeTo, routeFrom, next) => {
    if (!routeTo.meta.publica && !store.state.token) {
        return next({
            path: '/login'
        });
    }
    next();
})


export default router
