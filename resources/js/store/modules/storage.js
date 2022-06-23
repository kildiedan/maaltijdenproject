import axios from "axios"

export const storage = {
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
            const {data} = await axios.get('storage');
            commit('SET_ALL', data);
        },
        async create({commit}, payload) {
            console.log();
            const {data} = await axios.post('storage', payload);
            commit('SET_ALL', data);
        },
        async remove({commit}, payload) {
            
            const {data} = await axios.post('storage_delete', {id: payload});
            commit('SET_ALL', data);
        },
    },
};