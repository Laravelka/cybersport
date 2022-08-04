<template>
    <div class="main">
        <header-nav/>
        <section class="feed">
            <profile-posts :posts="postsRef"></profile-posts>
        </section>
        <mobile-nav/>
    </div>
</template>

<script>
	import { mapActions, mapState, useStore } from "vuex";
	import HeaderNav from "../header/HeaderNav";
	import MobileNav from "../UI/MobileNav";
	import ProfilePosts from "../UI/ProfilePosts";
	import { ref } from "vue";
	import axios from "axios";
	
	export default {
		components: {
			ProfilePosts, HeaderNav, MobileNav
		},
		setup() {
			const store = useStore();
			const postsRef = ref([]);
			
			const getFeedPosts = () => {
				store.commit('setLoading', true);
				axios.get('/api/v1/posts/getByFriends').then((response) => {
					postsRef.value = response.data.data;
					store.commit('setLoading', false);
				}).catch((error) => {
					if (error.response && error.response.data) {
						store.commit('setError', error.response.data.message);
					} else {
						store.commit('setError', error.message);
					}
					store.commit('setLoading', false);
				});
			};
			getFeedPosts();
			
			return {
				postsRef,
				getFeedPosts
			};
		}
	}
</script>
