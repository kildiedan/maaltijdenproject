import Vue from "vue";
import VueRouter from "vue-router";

import Home from '../pages/Home.vue'
import Add from '../pages/Add.vue'
import Storage from '../pages/Storage.vue'
Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: "/",
            component: Home
        },
        {
            path: "/add",
            component: Add
        },
        {
            path: "/storage",
            component: Storage
        },

    ]
});
