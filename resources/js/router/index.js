import Vue from "vue";
import VueRouter from "vue-router";

import Home from '../pages/Home.vue';
import Add_meal from '../pages/Add_meal.vue';
import Add_ingredient from '../pages/Add_ingredient.vue';
import Storage from '../pages/Storage.vue';
import All from '../pages/All.vue';
import login from '../pages/auth/Login.vue';
import register from '../pages/auth/register.vue';
import Add_meal_ingredient from '../pages/Add_meal_ingredient.vue';
import Meal_select from '../pages/Meal_select.vue';
import Meal from '../pages/Meal.vue';
import store from '../store';
Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        {
            path: "/",
            component: Home,
            name: 'home',
        },
        {
            path: "/add/meal",
            component: Add_meal,
            name: 'add meal',
        },
        {
            path: "/add/meal/ingredients",
            component: Add_meal_ingredient,
            name: 'add meal ingredient',
        },
        {
            path: "/add/ingredient",
            component: Add_ingredient,
            name: 'add ingredient',
        },
        {
            path: "/ingredients",
            component: Storage,
            name: 'storage',
        },
        {
            path: "/select/meal",
            component: Meal_select,
            name: 'Meal select',
        },
        {
            path: "/all",
            component: All,
            name: 'all',
        },
        {
            path: "/login",
            component: login,
            name: 'login',
        },
        {
            path: "/register",
            component: register,
            name: 'register',
        },
        {
            path: '/meals/:id',
            component: Meal,
            name: 'meal',
        },
        


    ]
});

router.beforeEach(({meta}, from, next) => {
    const isLoggedIn = store.getters['account/getIsLoggedIn'];
    if (meta.shouldBeLoggedIn && !isLoggedIn) next({name: 'login'});
    if (meta.shouldBeLoggedOut && isLoggedIn) next({name: 'home'});
    next();
});

export default router;