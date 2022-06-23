import Vue from "vue";
import Vuex from "vuex";

import {ingredients} from './modules/ingredients';
import {meals} from './modules/meals';
import {categories} from './modules/categories';
import {account} from './modules/account';
import {storage} from './modules/storage';



Vue.use(Vuex);

export default new Vuex.Store({
    modules: {ingredients, meals, categories, account, storage},
});
