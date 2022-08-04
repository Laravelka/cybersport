require('./bootstrap');
import store from "./store";
import { createApp } from "vue";
import App from "./components/App";
import router from "./router/router";

const app = createApp(App)
		.use(router)
		.use(store);

router.isReady().then(() => {
	const route = router.currentRoute;
	
	if (route.value.query.r) {
		localStorage.setItem('referral', route.value.query.r);
	}
});

app.mount("#app");