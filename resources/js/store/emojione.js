import axios from "axios";

export const emojione = {
    state: () => ({
        emojione: {},
        isLoading: false
    }),
    getters: {
        emojione(state) {
            return state.emojione;
        },
        isLoading(state) {
            return state.isLoading;
        }
    },
    mutations: {
        setEmojione(state, payload) {
            state.emojione = payload;
        },
        setEmojiLoading(state, payload) {
            state.isLoading = payload;
        },
    },
    actions: {
        getEmojione({ commit, state }, payload) {
            commit('setEmojiLoading', true);

            const emojione = JSON.parse(localStorage.getItem('emojione'));

            console.log(emojione, state.emojione);

            if (emojione == null) {
                axios.get('/api/v1/emojione').then((response) => {
                    const { data } = response;

                    commit('setEmojione', data);
                    commit('setEmojiLoading', false);
                    localStorage.setItem("emojione", JSON.stringify(data));
                }).catch(error => commit('setEmojiLoading', false));
            } else {
                commit('setEmojione', emojione);
                commit('setEmojiLoading', false);
            }
        }
    }
};