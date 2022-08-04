import { createRouter, createWebHistory } from "vue-router";
import adminGuard from "./adminGuard";
import authGuard from "./authGuard";
import Feed from "../components/pages/Feed";
import Friends from "../components/pages/Friends";
import Home from "../components/pages/Home";
import Login from "../components/auth/Login";
import Matches from "../components/pages/Matches";
import Profile from "../components/pages/Profile";
import Referral from "../components/pages/Referral";
import Register from "../components/auth/Register";
import Stats from "../components/pages/Stats";
import Toprate from "../components/pages/Toprate";
import AdminStats from "../components/admin/pages/AdminStats";

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/matches',
        name: 'matches',
        component: Matches,
        beforeEnter: [authGuard]
    },
    {
        path: '/feed',
        name: 'feed',
        component: Feed,
        beforeEnter: [authGuard]
    },
    {
        path: '/friends',
        name: 'friends',
        component: Friends,
        beforeEnter: [authGuard]
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
	{
		path: '/:driver/callback',
		name: 'socialLogin',
		component: Login
	},
    {
        path: '/profile',
        name: 'profile',
        component: Profile,
        beforeEnter: [authGuard]
    },
    {
        path: '/id:id?',
        name: 'getProfile',
        component: Profile,
        beforeEnter: [authGuard]
    },
    {
        path: '/referral',
        name: 'referral',
        component: Referral,
        beforeEnter: [authGuard]
    },
    {
        path: '/stats',
        name: 'stats',
        component: Stats,
        beforeEnter: [authGuard]
    },
    {
        path: '/toprate',
        name: 'toprate',
        component: Toprate,
        beforeEnter: [authGuard]
    },
    {
        path: '/admin/stats',
        name: 'adminStats',
        component: AdminStats,
        beforeEnter: [authGuard, adminGuard]
    }
];

const router = createRouter({
    routes,
    history: createWebHistory()
});

export default router;
