import axios from "axios"

export const meals = {
    namespaced: true,
    state: () => ({all: [], top:[]} ),
    getters: {
        getAll: state => state.all,
        getById: state => id => state.all.find(item => item.id === id),
        getTop: state => state.top,
    },
    mutations: {
        SET_ALL: (state, payload) => (state.all = payload),
        SET_TOP: (state, payload) => (state.top = payload),
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
            // commit('SET_ALL', data);
        },
        async remove({commit}, payload) {
            
            const {data} = await axios.post('remove-meal', {id: payload});
            commit('SET_ALL', data);
        },
        async setTop({commit}, payload) {
            
            const {data} = await axios.post('meal_top', payload);
            commit('SET_TOP', data);
        },
    },
};