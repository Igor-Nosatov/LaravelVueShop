import {createRouter, createWebHistory} from "vue-router";

import Home from "../views/Home/Home.vue";
import Login from "../views/Auth/Login.vue";
import Register from "../views/Auth/Register.vue";
import Catalog from "../views/Catalog/Catalog.vue";
import Product from "../views/Product/Product.vue";
import Review from "../views/Review/Review.vue";
import UpdateReview from "../views/Review/UpdateReview.vue";
import Cart from "../views/Cart/Cart.vue";
import Account from "../views/Account/Account.vue";
import Checkout from "../views/Checkout/Checkout.vue";
import GiftCard from "../views/GiftCard/GiftCard.vue";
import NotFound from "../views/NotFound/NotFound.vue";

import auth from "../services/auth/auth";
auth.init();

const routes = [
    {
        path: "/",
        name: "home",
        component: Home
    },

    {
        path: "/login",
        name: "login",
        component: Login
    },

    {
        path: "/register",
        name: "register",
        component: Register
    },

    {
        path: "/shop",
        name: "shop",
        component: Catalog,
        params: true
    },
     {
        path: "/shop/product/:id",
        name: "product",
        component: Product,
        meta: {
            requiresAuth: true
        },
        params: true
    },
    
    {
        path: "/review/:id",
        name: "review",
        component: Review,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: "/review/:review/update",
        name: "reviewUpdate",
        component: UpdateReview,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: "/account",
        name: "account",
        component: Account,
        meta: {
            requiresAuth: true
        }
    }, {
        path: "/cart",
        name: "cart",
        component: Cart,
        meta: {
            requiresAuth: true
        }
    }, {
        path: "/checkout",
        name: "checkout",
        component: Checkout,
        meta: {
            requiresAuth: true
        }
    },
     {
        path: "/gift-card",
        name: "giftCard",
        component: GiftCard,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/:pathMatch(.*)*',
        name: 'NotFound',
        component: NotFound
    },
];
const scrollBehavior = (to, from, savedPosition) => {
    return savedPosition || { top: 0, left: 0 }
}
const router = createRouter({history: createWebHistory(), routes, scrollBehavior});

router.beforeEach((to, from, next) => {
    let userRole = JSON.parse(localStorage.getItem("userRole"));

    if (to.matched.some((record) => record.meta.requiresAuth)) {
        if (!auth.loggedIn()) {
            next({name: "login"});
        } else {
            next();
        }
    } else {
        next();
    }

    if (to.matched.some((record) => record.meta.admin)) {
        if (userRole == 1) {
            next();
        } else {
            next({name: "home"});
        }
    }

    if (to.matched.some((record) => record.meta.manager)) {
        if (userRole == 2) {
            next();
        } else {
            next({name: "home"});
        }
    }

    if (to.matched.some((record) => record.meta.client)) {
        if (userRole == 3) {
            next();
        } else {
            next({name: "home"});
        }
    }
});

export default router;
