import store from "../store";

export default function (to, from) {
    let user = store.getters.user;

    if (!user || !user.is_admin) {
        return {
            path: from.path,
            query: {
                authError: true
            }
        }
    }
}
