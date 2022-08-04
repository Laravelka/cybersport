<template>
	<div class="profile-wall__record-notext" v-if="postsRef?.length === 0">
		Пользователь не выложил пока не одну запись
	</div>
	<div v-else class="feed__inner">
		<div v-for="(post, index) in postsRef" class="feed-item" v-bind:key="index">
			<PostItem :post="post" />
		</div>
	</div>
</template>

<script>
	import axios from "axios";
	// import List from "vue-virtualized";
	import PostItem from "../UI/PostItem";
	import { ref, watch, defineComponent } from 'vue';

	export default defineComponent({
		name: 'ProfilePosts',
		props: ['posts'],
		components: {
			PostItem
		},
		setup(props) {
			const postsRef = ref(props.posts);
			const isLoading = ref(false);
			const setLoading = (value) => isLoading.value = value;

			watch(() => props.posts, (first) => {
    			postsRef.value = first;
    		});
			
			return {
				postsRef,
				isLoading

			}
		}
	});
</script>

<style scoped>
	.feed-bottom__comment {
		height: 32px!important;
	}

	section.emoji-mart.emoji-mart-static {
		position: fixed;
		bottom: 65px;
		right: -354.99px;
		opacity: .5;
		pointer-events: none;
		z-index: 1000;
	}

	section.emoji-mart.emoji-mart-static.show {
		right: 10px;
		opacity: 1;
		pointer-events: all;
	}
</style>
