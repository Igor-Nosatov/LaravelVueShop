import { createRouter, createWebHistory } from "vue-router";

import Home from "../views/Home/Home.vue";
import Login from "../views/Auth/Login.vue";
import Register from "../views/Auth/Register.vue";
import Store from "../views/Store/Store.vue";
import Product from "../views/Product/Product.vue";
import Review from "../views/Review/Review.vue";
import Cart from "../views/Cart/Cart.vue";
import Account from "../views/Account/Account.vue";
import Checkout from "../views/Checkout/Checkout.vue";
import GiftCard from "../views/GiftCard/GiftCard.vue";

import auth from "../services/auth/auth";
auth.init();

const routes = [
  {
    path: "/",
    name: "home",
    component: Home,
  },

  {
    path: "/login",
    name: "login",
    component: Login,
  },

  {
    path: "/register",
    name: "register", 
    component: Register,
  },

  {
    path: "/store",
    name: "store",
    component: Store,
  },

  {
    path: "/product/:id",
    name: "product",
    component: Product,
    meta: {
      requiresAuth: true
    }
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
    path: "/account",
    name: "account",
    component: Account,
    meta: {
      requiresAuth: true
    }
  },
  {
    path: "/cart",
    name: "cart",
    component: Cart,
    meta: {
      requiresAuth: true
    }
  },

  {
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
    component:  GiftCard,
    meta: {
      requiresAuth: true
    }
  },
];

const router = createRouter({
  history:createWebHistory(),
  routes
});

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
      if (!auth.loggedIn()) {
          next({ name: "login" });
      } else {
          next();
      }
  } else {
      next();
  }
});

export default router;

/*

   /* if (to.matched.some(record => record.meta.admin)) {
      if (user.admin == 1) {
          next();
      } else {
          next({ name: "home" });
      }
    } else {
      next();
  }
    
    if (to.matched.some(record => record.meta.manager)) {
      if (user.manager == 2) {
          next();
      } else {
          next({ name: "home" });
      }
    } else {
      next();
  }
    
    if (to.matched.some(record => record.meta.client)) {
      if (user.client == 3) {
          next();
      } else {
          next({ name: "home" });
      }
    } else {
      next();
  }
*/
