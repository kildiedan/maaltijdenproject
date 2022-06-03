import Vue from "vue";
import App from "./App.vue";
import store from "./store";
import router from "./router";

import '../css/app.scss'

new Vue({
    el: "#app",
    router,
    render: (h) => h(App),
    store,
    created () {
        this.$store.dispatch('loadAllIngredients');
    },
});
