window._ = require('lodash');
import Echo from "laravel-echo";
window.Pusher = require('pusher-js');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.interceptors.response.use(function (response) {
	return response;
}, function (error) {
	const { response } = error;

	if (response.status === 401) {
		localStorage.removeItem("access_token");
		localStorage.removeItem("current_user");

		window.location.href = '/login';
	}
	return Promise.reject(error);
});

window.axios.defaults.headers.common['Accept'] = 'application/json';
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const token = localStorage.getItem("access_token");

if (token) {
	window.axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
}

window.Echo = new Echo({
	broadcaster: 'pusher',
	key: process.env.MIX_PUSHER_APP_KEY,
	cluster: process.env.MIX_PUSHER_APP_CLUSTER,
	wsHost: window.location.hostname,
	wsPort: 6001,
	forceTLS: false,
	disableStats: true,
});