import { createRouter, createWebHistory } from "vue-router";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: "/",
            component: () => import("../components/Home.vue"),
        },
        {
            path: "/blogs/:slug",
            component: () => import("../components/SingleBlog.vue"),
            name: "singleblog",
            props: true,
        },
        {
            path: "/login",
            component: () => import("../components/Login.vue"),
            name: "login",
        },
        {
            path: "/signup",
            component: () => import("../components/Signup.vue"),
            name: "signup",
        },
    ],
});
export default router;
