import {createWebHistory, createRouter} from "vue-router";

import Home from '../pages/Home';
import About from '../pages/About';
import Register from '../pages/Register';
import Login from '../pages/Login';
import Dashboard from '../pages/Dashboard';
import SIV from '../pages/SIV.vue';
import Create_Citoyen from '../pages/add_citoyen'


export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'about',
        path: '/about',
        component: About
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },
    {
        name: 'siv',
        path: '/siv',
        component: SIV
    },
    {
        name: 'create_citoyen',
        path: '/create',
        component: Create_Citoyen
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
