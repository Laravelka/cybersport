import { createRouter, createWebHistory } from "vue-router";
import Home from "../components/pages/Home";
import Matches from "../components/pages/Matches";

const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/matches',
        component: Matches
    }
];

const router = createRouter({
    routes,
    history: createWebHistory()
});

export default router;