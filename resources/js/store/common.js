export const commonModule = {
    state: () => ({
        isOpenMenu: false,
        loading: false,
        error: null
    }),
    getters: {
        isOpenMenu(state) {
            return state.isOpenMenu;
        },
        loading(state) {
            return state.loading;
        },
        error(state) {
            return state.error;
        }
    },
    mutations: {
        setIsOpenMenu(state, payload) {
            state.isOpenMenu = payload;
        },
        setLoading(state, payload) {
            state.loading = payload;
        },
        setError(state, payload) {
            state.error = payload;
        },
        clearError(state) {
            state.error = null;
        }
    },
    actions: {
        setIsOpenMenu({commit}, payload) {
            commit('setIsOpenMenu', payload);
        },
        setLoading({commit}, payload) {
            commit('setLoading', payload);
        },
        setError({commit}, payload) {
            commit('setError', payload);
        },
        clearError({commit}) {
            commit('clearError');
        }
    }
};