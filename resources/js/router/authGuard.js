import store from "../store";

export default function (to, from) {
    if (!store.getters.user) {
        return {
            name: 'login',
            query: {
                authError: true
            }
        }
    }
}