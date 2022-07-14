import axios from "axios"

export const meals = {
    namespaced: true,
    state: () => ({all: [], top:[], recipe:[]} ),
    getters: {
        getAll: state => state.all,
        getById: state => id => state.all.find(item => item.id === id),
        getTop: state => state.top,
        getRecipe: state => state.recipe,
    },
    mutations: {
        SET_ALL: (state, payload) => (state.all = payload),
        SET_TOP: (state, payload) => (state.top = payload),
        SET_RECIPE: (state, payload) => (state.recipe = payload),
    },
    actions: {
        async setAll({commit}) {
            const {data} = await axios.get('meals');
            commit('SET_ALL', data);
        },
        async create({commit}, payload) {
            console.log();
            const {data} = await axios.post('meals', payload);
            commit('SET_ALL', data);
        },
        async ingredient_add({commit}, payload) {
            console.log();
            const {data} = await axios.post('meal_ingredient', payload);
            commit('SET_RECIPE', data);
        },
        async remove({commit}, payload) {
            
            const {data} = await axios.post('remove-meal', {id: payload});
            commit('SET_ALL', data);
        },
        async setTop({commit}) {
            
            const {data} = await axios.post('meal_top');
            commit('SET_TOP', data);
        },
        async setRecipe({commit}) {
            
            const {data} = await axios.post('meal_recipe');
            commit('SET_RECIPE', data);
        },
    },
};