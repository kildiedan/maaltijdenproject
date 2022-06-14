import axios from "axios"

export const meals = {
    namespaced: true,
    state: () => ({all: []}),
    getters: {
        getAll: state => state.all,
        getById: state => id => state.all.find(item => item.id === id),
    },
    mutations: {
        SET_ALL: (state, payload) => (state.all = payload),
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
        async remove({commit}, payload) {
            
            const {data} = await axios.post('remove-meal', {id: payload});
            commit('SET_ALL', data);
        },
    },
};