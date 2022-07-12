require('./bootstrap');
import store from "./store";
import { createApp } from 'vue';
import App from './components/App';
import router from "./router/router";

const app = createApp(App);

app.use(router)
	.use(store)
	.mount("#app");
