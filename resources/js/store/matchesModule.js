import axios from "axios";

export const matchesModule = {
	state: () => ({
		data: []
	}),
	mutations: {
		setMatches(state, payload) {
			state.data = payload;
		}
	},
	actions: {
		getMatches({ commit }, chatId) {
			axios.get('/api/v1/matches').then((response) => {
				const { data } = response.data;

				commit('setMatches', data.data);
				commit('setLoading', false);
			}).catch((error) => {
				commit('setLoading', false);

				if (error.response && error.response.data) {
					commit('setError', error.response.data.message);
				} else {
					commit('setError', error.message);
				}
			});
		}
	}
};