import { createRouter, createWebHistory } from "vue-router";
import Feed from "../components/pages/Feed";
import Friends from "../components/pages/Friends";
import Home from "../components/pages/Home";
import Matches from "../components/pages/Matches";
import Profile from "../components/pages/Profile";
import Referral from "../components/pages/Referral";
import Stats from "../components/pages/Stats";
import Toprate from "../components/pages/Toprate";

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/matches',
        name: 'matches',
        component: Matches
    },
    {
        path: '/feed',
        name: 'feed',
        component: Feed
    },
    {
        path: '/friends',
        name: 'friends',
        component: Friends
    },
    {
        path: '/profile',
        name: 'profile',
        component: Profile
    },
    {
        path: '/referral',
        name: 'referral',
        component: Referral
    },
    {
        path: '/stats',
        name: 'stats',
        component: Stats
    },
    {
        path: '/toprate',
        name: 'toprate',
        component: Toprate
    }
];

const router = createRouter({
    routes,
    history: createWebHistory()
});

export default router;