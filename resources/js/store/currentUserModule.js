import axios from "axios";
import router from "../router/router";

export const currentUserModule = {
    state: () => ({
        user: null,
        token: null
    }),
    getters: {
        user(state) {
            return state.user;
        },
        isLoggedIn(state) {
            return state.user !== null;
        }
    },
    mutations: {
        setUser(state, data) {
            state.user = data;
        },
        setToken(state, data) {
            state.token = data;
        }
    },
    actions: {
        registerUser({commit}, user) {
            commit('clearError');
            commit('setLoading', true);

            if (user.email.indexOf('@') === -1) {
                user.phone = user.email;
                delete user.email;
            }
            axios
                .post("/api/v1/register", {
                    ...user
                })
                .then(response => {
                    if (response.data.access_token && response.data.user) {
                        localStorage.setItem("access_token", response.data.access_token);
                        localStorage.setItem("current_user", JSON.stringify(response.data.user));
                        commit('setUser', response.data.user);
                        commit('setToken', response.data.access_token);
                        commit('setLoading', false);
                        router.push({name: 'matches'});
                    }
                })
                .catch(error => {
                    commit('setLoading', false);
                    commit('setError', error.message);
                    console.log(error);
                })
        },
        loginUser({commit}, user) {
            commit('clearError');
            commit('setLoading', true);

            if (user.email.indexOf('@') === -1) {
                user.phone = user.email;
                delete user.email;
            }
            axios
                .post("/api/v1/login", {
                    ...user
                })
                .then(response => {
                    if (response.data.access_token && response.data.user) {
                        localStorage.setItem("access_token", response.data.access_token);
                        localStorage.setItem("current_user", JSON.stringify(response.data.user));
                        commit('setUser', response.data.user);
                        commit('setToken', response.data.access_token);
                        commit('setLoading', false);
                        router.replace({name: 'matches'});
                    }
                })
                .catch(error => {
                    commit('setLoading', false);
                    if (error.response) {
                        commit('setError', error.response.data.message);
                    } else {
                        commit('setError', error.message);
                    }
                })
        },
        logoutUser({state, commit}) {
            axios
                .post("/api/v1/logout", null, {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem("access_token")
                    }
                })
                .then(response => {
                    console.log(response.data.message);
                    localStorage.removeItem("access_token");
                    localStorage.removeItem("current_user");
                    commit('setUser', null);
                    commit('setToken', null);
                    router.replace({name: 'home'});
                })
                .catch(error => {
                    if (error.response) {
                        commit('setError', error.response.data.message);
                    } else {
                        commit('setError', error.message);
                    }
                })
        },
        autoLoginUser({commit}, data) {
			localStorage.setItem("access_token", data.token);
			localStorage.setItem("current_user", JSON.stringify(data.user));
            window.axios.defaults.headers.common['Authorization'] = `Bearer ${data.token}`;

            commit('setUser', data.user);
            commit('setToken', data.token);
        }
    }
};
