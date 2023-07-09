import Vue from "vue";
import VueRouter from "vue-router";
import store from "../store";
Vue.use(VueRouter);

const routes = [
    /* ====================== Public Router ====================== */
    {
        path: "/",
        component: () =>
            import(
                /* webpackChunkName: "admin/login" */ "../views/Login.vue"
            ),
        name: "login",
        meta: {
            title: "Login",
            isGuest: true,
        },
    },

    /* ====================== Protected Router ====================== */
    {
        path: "/dashboard",
        redirect: "/dashboard",
        component: () => import("../components/DefaultMaster.vue"),
        meta: { requiresAuth: true },
        children: [
            /* ====================== Start Admin Dashboard Routing ====================== */
            {
                path: "/dashboard",
                component: () =>
                    import(
                        /* webpackChunkName: "admin/dashboard" */ "../views/Dashboard.vue"
                    ),
                name: "dashboard",
                meta: {
                    title: "Dashboard",
                },
            },
            /* _____ category module _____ */
            {
                path: "/categories",
                component: () =>
                    import(
                        /* webpackChunkName: "admin/categories" */ "../views/Category/Index.vue"
                    ),
                name: "categories",
                meta: {
                    title: "Categories",
                },
            },
            /* _____ customer module _____ */
            {
                path: "/customer/list",
                component: () =>
                    import(
                        /* webpackChunkName: "admin/customer_list" */ "../views/Customer/Index.vue"
                    ),
                name: "customer_list",
                meta: {
                    title: "Customer",
                },
            },

            {
                path: "/customer/create",
                component: () =>
                    import(
                        /* webpackChunkName: "admin/customer_create" */ "../views/Customer/Add.vue"
                    ),
                name: "customer_create",
                meta: {
                    title: "Customer Add",
                },
            },











            /* _____ plan module _____ */
            /* _____ plan module _____ */
            /* _____ plan module _____ */
            /* _____ plan module _____ */
            /* _____ plan module _____ */
            /* _____ plan module _____ */
            /* _____ plan module _____ */
            /* _____ plan module _____ */
            /* _____ plan module _____ */
            /* _____ plan module _____ */
            /* _____ plan module _____ */
            /* _____ plan module _____ */
            /* _____ plan module _____ */
            /* _____ plan module _____ */
            /* _____ plan module _____ */

            /* ____________________ End Router __________________ */
        ],
    },

    /* ====================== Protected Router ====================== */
];

const router = new VueRouter({
    mode: "history",
    base: __dirname,
    routes,
    scrollBehavior(to, from, savedPosition) {
        return new Promise((resolve, reject) => {
            setTimeout(() => {
                resolve({ x: 0, y: 0 });
            }, 500);
        });
    },
});

/* ================= Admin Middleware router =================== */
router.beforeEach((to, from, next) => {
    if (
        to.matched.some((record) => record.meta.requiresAuth) &&
        !store.state.user.token
    ) {
        next({
            name: "login",
        });
    } else if (
        to.matched.some((record) => record.meta.isGuest) &&
        store.state.user.token
    ) {
        next({
            name: "dashboard",
        });
    } else {
        next(); // make sure to always call next()!
    }
});
/* ================= Protected router =================== */

export default router;
