import axios from 'axios';

export const account = {
    namespaced: true,
    state: () => ({
        user: JSON.parse(localStorage.getItem('user')),
        isLoggedIn: localStorage.getItem('loggedIn') === 'true',
    }),
    getters: {
        get: state => state.user,
        getIsLoggedIn: state => state.isLoggedIn,
    },
    mutations: {
        SET: (state, payload) => {
            state.user = payload;
            localStorage.setItem('user', JSON.stringify(payload));
        },
        SET_LOGGEDIN: (state, payload) => {
            state.isLoggedIn = payload;
            localStorage.setItem('loggedIn', payload.toString());
        },
    },
    actions: {
        async login({commit}, payload) {
            const {data} = await axios.post('login', payload);
            console.log('test');
            commit('account/SET', data, {root: true});
            commit('SET_LOGGEDIN', true);
        },
        async logout({commit}) {
            commit('account/SET', undefined, {root: true});
            commit('SET_LOGGEDIN', false);
            await axios.get('logout');
        },
        async register({commit}, payload) {
            const {data} = await axios.post('register', payload);
            commit('account/SET', data, {root: true});
            commit('SET_LOGGEDIN', true);
        },
        async set({commit}) {
            const {data} = await axios.get('me');
            commit('SET', data);
        },
        async update({commit}, payload) {
            const {data} = await axios.put(`account/${payload.id}`, payload);
            commit('SET', data);
        },
        
    },
};