import axios from "axios"

export const ingredients = {
    namespaced: true,
    state: () => ({all: [], storage: []}),
    getters: {
        getAll: state => state.all,
        getById: state => id => state.all.find(item => item.id === id),
        getStorage: state => state.storage,
    },
    mutations: {
        SET_ALL: (state, payload) => (state.all = payload),
        SET_STORAGE: (state, payload) => (state.storage = payload),
    },
    actions: {
        async setAll({commit}) {
            const {data} = await axios.get('ingredients');
            commit('SET_ALL', data);
        },
        async create({commit}, payload) {
            console.log();
            const {data} = await axios.post('ingredients', payload);
            commit('SET_ALL', data);
        },
        async remove({commit}, payload) {
            const {data} = await axios.post('remove-ingredient', {id: payload});
            commit('SET_ALL', data);
        },
        async setStorage({commit}) {
            const {data} = await axios.get('user_ingrdients');
            commit('SET_STORAGE', data);
        },
    },
};