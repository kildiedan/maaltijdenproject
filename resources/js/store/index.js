import Vue from "vue";
import Vuex from "vuex";

import {ingredients} from './modules/ingredients';
import {meals} from './modules/meals';
import {categories} from './modules/categories';



Vue.use(Vuex);

export default new Vuex.Store({
    modules: {ingredients, meals, categories},
});
