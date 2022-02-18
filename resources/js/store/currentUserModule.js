import axios from "axios";
// import router from "../router/router";

export const currentUserModule = {
    state: () => ({
        user: null
    }),
    getters: {
        user(state) {
            return state.user;
        }
    },
    mutations: {
        setUser(state, data) {
            state.user = data;
        }
    },
    actions: {
        registerUser({commit}, user) {
            if (user.email.indexOf('@') === -1) {
                user.phone = user.email;
                delete user.email;
            }
            axios
                .post("/api/v1/register", {
                    ...user
                })
                .then(response => {
                    if (response.data.access_token) {
                        localStorage.setItem("access_token", response.data.access_token);
                    }
                    if (response.data.user) {
                        localStorage.setItem("current_user", JSON.stringify(response.data.user));
                        commit('setUser', response.data.user);
                    }
                    window.location.replace("/matches");
                })
                .catch(error => {
                    console.log(error);
                })
        },
        loginUser({commit}, user) {
            if (user.email.indexOf('@') === -1) {
                user.phone = user.email;
                delete user.email;
            }
            axios
                .post("/api/v1/login", {
                    ...user
                })
                .then(response => {
                    if (response.data.access_token) {
                        localStorage.setItem("access_token", response.data.access_token);
                    }
                    if (response.data.user) {
                        localStorage.setItem("current_user", JSON.stringify(response.data.user));
                        commit('setUser', response.data.user);
                    }
                    window.location.replace("/matches");
                    // router.replace({name: 'matches'});
                })
                .catch(error => {
                    console.log(error);
                })
        },
        logoutUser({state}) {
            axios
                .post("/api/v1/logout")
                .then(response => {
                    console.log(response.data.message);
                    localStorage.removeItem("access_token");
                    localStorage.removeItem("current_user");
                    window.location.replace("/");
                    // router.replace({name: 'home'});
                })
                .catch(error => {
                    console.log(error);
                })

        }
    }
};