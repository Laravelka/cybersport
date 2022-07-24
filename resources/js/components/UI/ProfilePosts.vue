<template>
	<div class="profile-wall__record-notext" v-if="postsRef?.length === 0">
		Пользователь не выложил пока не одну запись
	</div>
	<div v-else class="feed__inner">
		<div v-for="(post, index) in postsRef" class="feed-item" v-bind:key="index">
			<div class="feed-top">
				<div class="feed-top__box">
					<router-link class="feed-top__icon" :to="{ name: 'getProfile', params: {id: post.user.id} }">
						<div class="feed-top__icongradient icon">
							<span>10</span>
							<img class="feed-top__iconimg" v-if="post.user.avatar !== null" :src="post.user.avatar"
								alt="">
							<img class="feed-top__iconimg" v-else src="/images/logo.svg" alt="no avatar">
						</div>
					</router-link>
					<div class="feed-top__box-name">
						<div class="feed-top__user-name">{{ post.user.name }}<span></span></div>
						<div class="feed-top__user-info" v-html="post.content"></div>
					</div>
					<div class="feed-top__settings-box">
						<button class="feed-top__settings-btn"
							@click="isOpenDropdowns[index] = !isOpenDropdowns[index]">
							<svg width="24" height="6" viewBox="0 0 24 6" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<circle cx="3" cy="3" r="3" fill="#6E6E86" />
								<circle cx="12" cy="3" r="3" fill="#6E6E86" />
								<circle cx="21" cy="3" r="3" fill="#6E6E86" />
							</svg>
						</button>
						<div class="feed-top__report-box" :class="{['d-block']: isOpenDropdowns[index]}">
							<button class="feed-top__report-btn">Пожаловаться</button>
							<button class="feed-top__report-btn" @click="isOpenDropdowns[index] = false">Скрыть</button>
						</div>
					</div>
				</div>
				<img class="feed-top__img" v-if="post.img" :src="post.img" style="display: block" alt="">
				<div class="feed-top__box">
					<button class="feed-top__like" @click="toggleLike(post.id, index)">{{ post.likes.length }}</button>
					<button class="feed-top__comment">{{ post.comments.length }}</button>
					<button class="feed-top__emoji">
						<img src="/images/icons/feed-emoji.svg" alt="">
					</button>
					<ul class="feed-top__list">
						<li class="feed-top__list-item">
							<button class="feed-top__list-link">
								<img src="/images/icons/feed-1.png" alt="">
							</button>
						</li>
						<li class="feed-top__list-item">
							<button class="feed-top__list-link">
								<img src="/images/icons/feed-2.png" alt="">
							</button>
						</li>
						<li class="feed-top__list-item">
							<button class="feed-top__list-link">
								<img src="/images/icons/feed-3.png" alt="">
							</button>
						</li>
						<li class="feed-top__list-item">
							<button class="feed-top__list-link">
								<img src="/images/icons/feed-4.png" alt="">
							</button>
						</li>
					</ul>
					<button class="feed-top__reaction">13 Реакций</button>
					<div class="feed-top__time-published">{{ post.created_at }}</div>
				</div>
			</div>

			<div class="feed-bottom">
				<div class="text-muted fs-6 px-0 pb-2" v-if="post.comments.length === 0">Пока что пусто...</div>
				<template v-else>
					<div class="feed-bottom__title">Последние комментарии</div>
					<template v-for="(comment, index) in (isShowCommentsRef[index] ? post.comments : post.comments.slice(0, 2))" v-bind:key="index">
						<div class="feed-bottom__box">
							<router-link class="feed-bottom__icon me-1 ms-0"
								:to="{ name: 'getProfile', params: {id: comment.user.id} }">
								<div class="feed-bottom__icongradient icon">
									<img class="feed-bottom__iconimg" v-if="comment.user.avatar !== null"
										:src="comment.user.avatar" alt="">
									<img class="feed-bottom__iconimg" v-else src="/images/logo.svg" alt="no avatar">
								</div>
							</router-link>
							<div class="feed-bottom__box-name">
								<div class="feed-bottom__user-name">{{ comment.user.name }}, 13 игр</div>
								<div class="feed-bottom__user-time mt-1">{{ comment.created_at }}</div>
							</div>
						</div>
						<div class="feed-bottom__comment">{{ comment.content }}</div>
						<img class="feed-bottom__img" v-if="comment.img !== null" :src="comment.img" alt="">
					</template>
					<button class="feed-bottom__comment-btn" @click.prevent="isShowCommentsRef[index] = !isShowCommentsRef[index]">
						{{ isShowCommentsRef[index] ? 'Скрыть' : 'Показать' }} остальные комментарии</button>
				</template>
				<div class="feed-bottom__form">
					<div class="feed-bottom__form-box">
						<input v-model="inputsCommentRef[index]" class="feed-bottom__form-input" placeholder="Быстрый комментарий" type="text">
						<label class="feed-bottom__label">
							<input class="feed-bottom__label-input" type="file">
							<img class="feed-bottom__label-file" src="/images/icons/image-icon.svg" alt="">
						</label>
						<button class="feed-bottom__form-emoji">
							<img src="/images/icons/profile-emoji.svg" alt="">
						</button>
						<button class="feed-bottom__form-btn" @click.prevent="newComment(post.id, index)">
							<img src="/images/icons/profile-search.svg" alt="">
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import axios from "axios";
	import { mapActions, mapState, useStore } from "vuex";
	import { ref, onBeforeMount, defineComponent } from 'vue';

	export default defineComponent({
		name: 'ProfilePosts',
		setup() {
			const store = useStore();
			const postsRef = ref([]);
			const isLoading = ref(true);
			const isOpenDropdowns = ref([]);
			const inputsCommentRef = ref([]);
			const isShowCommentsRef = ref([]);

			const setLoading = (value) => isLoading.value = value;

			const getPosts = () => {
				axios.get('/api/v1/posts').then((response) => {
					postsRef.value = response.data.data;
				}).catch((error) => {
					if (error.response && error.response.data) {
						store.commit('setError', error.response.data.message);
					} else {
						store.commit('setError', error.message);
					}
					setLoading(false);
				});
			};

			const newComment = (postId, postIndex) => {
				axios.post('/api/v1/comments', {
					post_id: postId,
					content: inputsCommentRef.value[postIndex]
				}).then((response) => {
					const { data } = response;

					inputsCommentRef.value[postIndex] = null;
					postsRef.value[postIndex].comments.push(data.data);

					store.commit('setLoading', false);
				}).catch((error) => {
					if (error.response.data) {
						store.commit('setError', error.response.data.message);
					} else {
						store.commit('setError', error.message);
					}
					store.commit('setLoading', false);
				});
			};

			const toggleLike = (postId, postIndex) => {
				axios.post('/api/v1/likes', {
					post_id: postId
				}).then((response) => {
					const { data } = response.data;

					postsRef.value[postIndex] = data;
				}).catch((error) => {
					if (error.response && error.response.data) {
						store.commit('setError', error.response.data.message);
					} else {
						store.commit('setError', error.message);
					}
				});
			};

			onBeforeMount(() => {
				getPosts();
			});

			return {
				postsRef,
				isLoading,
				newComment,
				toggleLike,
				isOpenDropdowns,
				inputsCommentRef,
				isShowCommentsRef

			}
		}
	});
</script>

<style scoped>

</style>