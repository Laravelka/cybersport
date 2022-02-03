import { createRouter, createWebHistory } from "vue-router";
import Feed from "../components/pages/Feed";
import Friends from "../components/pages/Friends";
import Home from "../components/pages/Home";
import Matches from "../components/pages/Matches";
import Profile from "../components/pages/Profile";
import Toprate from "../components/pages/Toprate";

const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/matches',
        component: Matches
    },
    {
        path: '/profile',
        component: Profile
    },
    {
        path: '/friends',
        component: Friends
    },
    {
        path: '/feed',
        component: Feed
    },
    {
        path: '/toprate',
        component: Toprate
    }
];

const router = createRouter({
    routes,
    history: createWebHistory()
});

export default router;