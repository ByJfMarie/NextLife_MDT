import {createWebHistory, createRouter} from "vue-router";

import Home from '../pages/Home';
import About from '../pages/About';
import Register from '../pages/Register';
import Login from '../pages/Login';
import Dashboard from '../pages/Dashboard';
import SIV from '../pages/SIV.vue';
import TAJ from '../pages/TAJ.vue';
import Create_Citoyen from '../pages/add_citoyen';
import Create_Vehicule from '../pages/add_vehicule';
import Amendes from '../pages/amendes';
import Casier from '../pages/casier';


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
        name: 'create_vehicule',
        path: '/siv/create',
        component: Create_Vehicule
    },
    {
        name: 'taj',
        path: '/taj',
        component: TAJ
    },
    {
        name: 'create_citoyen',
        path: '/taj/create',
        component: Create_Citoyen
    },
    {
        name: 'amendes',
        path: '/taj/amende',
        component: Amendes
    },
    {
        name: 'casier',
        path: '/taj/:id',
        props: true,
        component: Casier
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
