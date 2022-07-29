<template>
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
                    @click="isOpenDropdownRef = !isOpenDropdownRef">
                    <svg width="24" height="6" viewBox="0 0 24 6" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3" fill="#6E6E86" />
                        <circle cx="12" cy="3" r="3" fill="#6E6E86" />
                        <circle cx="21" cy="3" r="3" fill="#6E6E86" />
                    </svg>
                </button>
                <div class="feed-top__report-box" :class="{['d-block']: isOpenDropdownRef}">
                    <button class="feed-top__report-btn">Пожаловаться</button>
                    <button class="feed-top__report-btn" @click="isOpenDropdownRef = false">Скрыть</button>
                </div>
            </div>
        </div>
        <img class="feed-top__img" v-if="post.img" :src="post.img" style="display: block" alt="">
        <div class="feed-top__box">
            <button class="feed-top__like" @click="toggleLike">{{ post.likes.length }}</button>
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
            <template v-for="(comment, index) in (isShowCommentsRef ? post.comments : post.comments.slice(0, 2))" v-bind:key="index">
                <CommentItem :comment="comment" />
            </template>
            <button class="feed-bottom__comment-btn" @click.prevent="isShowCommentsRef = !isShowCommentsRef">
                {{ isShowCommentsRef ? 'Скрыть' : 'Показать' }} остальные комментарии</button>
        </template>
        <div class="feed-bottom__form">
            <div class="feed-bottom__form-box position-relative">
                <input v-model="inputCommentRef" class="feed-bottom__form-input" placeholder="Быстрый комментарий" type="text">
                <label class="feed-bottom__label">
                    <input ref="inputFileRef" class="feed-bottom__label-input" type="file">
                    <img class="feed-bottom__label-file" src="/images/icons/image-icon.svg" alt="">
                </label>
                <button class="feed-bottom__form-emoji">
                    <img src="/images/icons/profile-emoji.svg">
                </button>
                <button class="feed-bottom__form-btn" @click.prevent="newComment">
                    <img src="/images/icons/profile-search.svg" alt="">
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import { ref, toRef, watch } from "vue";
    import CommentItem from "../UI/CommentItem";
    import { mapActions, mapState, useStore } from "vuex";

    export default {
        name: 'PostItem',
        props: [
            'post'
        ],
        components: {
            CommentItem
        },
        setup(props) {
            const store = useStore();
            const postRef = ref(props.post);
            const inputFileRef = ref(null);
            const inputCommentRef = ref(null);
            const isShowCommentsRef = ref(false);
            const isOpenDropdownRef = ref(false);

            watch(() => props.post, (first) => {
    			postRef.value = first;
    		});

            const newComment = () => {
                const formData = new FormData();

                if (inputFileRef.value.files.length > 0) {
                    const image = inputFileRef.value.files[0];

                    formData.append('img', image);
                }
                formData.append('post_id', postRef.value.id);
                formData.append('content', inputCommentRef.value);

				axios.post('/api/v1/comments', formData).then((response) => {
					const { data } = response;

					inputCommentRef.value = null;
					postRef.value.comments.push(data.data);
				}).catch((error) => {
					if (error.response && error.response.data) {
						store.commit('setError', error.response.data.message);
					} else {
						store.commit('setError', error.message);
					}
					store.commit('setLoading', false);
				});
			};

			const toggleLike = () => {

				axios.post('/api/v1/likes', {
					post_id: postRef.value.id
				}).then((response) => {
					const { data } = response.data;

					postRef.value = data;
				}).catch((error) => {
					if (error.response && error.response.data) {
						store.commit('setError', error.response.data.message);
					} else {
						store.commit('setError', error.message);
					}
				});
			};

            return {
                post: postRef,
                newComment,
                toggleLike,
                inputFileRef,
                inputCommentRef,
                isShowCommentsRef,
                isOpenDropdownRef
            }
        }
    }
</script>
