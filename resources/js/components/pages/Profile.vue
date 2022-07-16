<template>
	<div class="main-profile">

		<header-nav/>

		<div class="profile">
			<div class="container-lg">
				<div class="profile__inner">
					<div class="profile-info">
						<div class="profile-info__title title">ИНФОРМАЦИЯ О ПРОФИЛЕ</div>
						<div class="profile-info__user-box">
							<a class="header-usermenu__icon" href="#">
								<div class="header-usermenu__icongradient icon">
									<img class="header-usermenu__iconimg" :src="profileRef.avatar" alt="">
								</div>
							</a>
							<div class="profile-info__content">
								<div class="profile-info__content-id profile-id">#{{ profileRef.id }}</div>
								<a class="profile-info__content-name profile-name" href="#">
									{{ profileRef.name }}
									<span v-if="profileRef.is_admin">
										<img class="profile-info__content-crown" src="/images/icons/crown.png" alt="">
									</span>
								</a>
								<div class="profile-info__content-subname profile-subname">
									{{ profileRef.first_name ?? '' }} {{ profileRef.last_name ?? '' }}
								</div>
								<span class="profile-info__content-edit" v-if="isCurrentUser" @click="isOpenProfileEdit = !isOpenProfileEdit">
									Редактировать профиль
								</span>
							</div>
						</div>
						<div class="profile-info__user-socials">
							<a
								class="profile-social__link"
								v-if="profileRef.vk_id"
								:href="'https://vk.com/id' + profileRef.vk_id"
								target="_blank"
							>
								<img class="profile-social__img" src="/images/icons/vk.svg" alt="">
							</a>
							<a
								class="profile-social__link"
								v-if="profileRef.steam_id"
								:href="'https://steamcommunity.com/profiles/' + profileRef.steam_id"
								style="filter: invert(57%) sepia(9%) saturate(694%) hue-rotate(209deg) brightness(96%) contrast(89%)"
								target="_blank"
							>
								<img class="profile-social__img" src="/images/icons/steam.svg" alt="">
							</a>
						</div>

						<ul class="profile-info__list">
							<li class="profile-info__list-item info-list">
								<a class="profile-info__list-link info-link" href="#">Друзей:</a>
								<div class="profile-info__list-num profile-info__list-num_blue">
									{{ profileRef.friends?.length ?? 0 }}
								</div>
							</li>
							<li class="profile-info__list-item info-list">
								<a class="profile-info__list-link info-link" href="#">Подписчики:</a>
								<div class="profile-info__list-num profile-info__list-num_blue">
									{{ profileRef.subscribers?.length ?? 0 }}
								</div>
							</li>
							<li class="profile-info__list-item info-list">
								<a class="profile-info__list-link info-link" href="#">PW баллы:</a>
								<div class="profile-info__list-num profile-info__list-num_blue">
									{{ profileRef.pw_points ?? 0 }}
								</div>
							</li>
							<li class="profile-info__list-item info-list">
								<a class="profile-info__list-link info-link" href="#">Побед:</a>
								<div class="profile-info__list-num profile-info__list-num_blue">100(52%)</div>
							</li>
							<li class="profile-info__list-item info-list">
								<a class="profile-info__list-link info-link" href="#">Матчей:</a>
								<div class="profile-info__list-num profile-info__list-num_blue">120</div>
							</li>
							<li class="profile-info__list-item info-list">
								<a class="profile-info__list-link info-link" href="#">Оборот:</a>
								<div class="profile-info__list-num profile-info__list-num_blue">350,00$</div>
							</li>
							<li class="profile-info__list-item info-list">
								<a class="profile-info__list-link info-link" href="#">Сумма выигрыша:</a>
								<div class="profile-info__list-num profile-info__list-num_blue">1000$</div>
							</li>
						</ul>
						<button class="profile-info__btn" v-if="isCurrentUser" @click.prevent="logout">Выйти</button>
					</div>

					<div class="profile-wall">
						<div class="profile-wall__title title">СТЕНА ПОЛЬЗОВАТЕЛЯ</div>
						<form class="profile-wall__form" action="#">
							<div class="profile-wall__form-box">
								<input
									type="text"
									v-model="inputPostRef"
									class="profile-wall__form-input"
									placeholder="Что у Вас нового?"
								>
								<label class="profile-wall__label">
									<input class="profile-wall__label-input" type="file">
									<img class="profile-wall__label-file" src="/images/icons/image-icon.svg" alt="">
								</label>
								<button class="profile-wall__form-emoji">
									<img src="/images/icons/profile-emoji.svg" alt="">
								</button>
								<button class="profile-wall__form-btn" @click.prevent="newPost">
									<img src="/images/icons/profile-search.svg" alt="">
								</button>
							</div>
						</form>
						<div class="profile-wall__record">
							<div class="profile-wall__record-notext" v-if="profileRef.posts?.length === 0">
								Пользователь не выложил пока не одну запись
							</div>
							<div v-else class="feed__inner">
								<div v-for="(item, index) in profileRef.posts" class="feed-item" v-bind:key="index">
									<div class="feed-top">
										<div class="feed-top__box">
											<a class="feed-top__icon" href="#">
												<div class="feed-top__icongradient icon">
													<span>10</span>
													<img class="feed-top__iconimg" :src="item.user.avatar" alt="">
												</div>
											</a>
											<div class="feed-top__box-name">
												<div class="feed-top__user-name">{{ item.user.name }}<span></span></div>
												<div class="feed-top__user-info" v-html="item.content"></div>
											</div>
											<div class="feed-top__settings-box">
												<button class="feed-top__settings-btn">
													<svg width="24" height="6" viewBox="0 0 24 6" fill="none" xmlns="http://www.w3.org/2000/svg">
														<circle cx="3" cy="3" r="3" fill="#6E6E86" />
														<circle cx="12" cy="3" r="3" fill="#6E6E86" />
														<circle cx="21" cy="3" r="3" fill="#6E6E86" />
													</svg>
												</button>
												<div class="feed-top__report-box">
													<button class="feed-top__report-btn">Пожаловаться</button>
													<button class="feed-top__report-btn">Скрыть</button>
												</div>
											</div>
										</div>
										<img class="feed-top__img" v-if="item.img" :src="item.img" style="display: block" alt="">
										<div class="feed-top__box">
											<button class="feed-top__like">{{ item.likes.length }}</button>
											<button class="feed-top__comment">{{ item.comments.length }}</button>
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
											<div class="feed-top__time-published">5 минут назад</div>
										</div>
									</div>

									<div class="feed-bottom">
										<div class="feed-bottom__title">Последние комментарии</div>
										<div class="feed-bottom__box">
											<a class="feed-bottom__icon" href="#">
												<div class="feed-bottom__icongradient icon">
													<img class="feed-bottom__iconimg" src="/images/user/1.png" alt="">
												</div>
											</a>
											<div class="feed-bottom__box-name">
												<div class="feed-bottom__user-name">Kushiro Nara, 13 игр</div>
												<div class="feed-bottom__user-time">49 минут назад</div>
											</div>
										</div>
										<div class="feed-bottom__comment">Коментарий пользователя. Коментарий пользователя. Коментарий пользователя.
											Коментарий пользователя. Коментарий
											пользователя.</div>
										<img class="feed-bottom__img" src="/images/decor/feed-img.png" alt="">
										<button class="feed-bottom__comment-btn">Показать остальные комментарии</button>
										<form class="feed-bottom__form" action="#">
											<div class="feed-bottom__form-box">
												<input class="feed-bottom__form-input" placeholder="Быстрый комментарий" type="text">
												<label class="feed-bottom__label">
													<input class="feed-bottom__label-input" type="file">
													<img class="feed-bottom__label-file" src="/images/icons/image-icon.svg" alt="">
												</label>
												<button class="feed-bottom__form-emoji">
													<img src="/images/icons/profile-emoji.svg" alt="">
												</button>
												<button class="feed-bottom__form-btn">
													<img src="/images/icons/profile-search.svg" alt="">
												</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="chooseTeam fixed-top min-vh-100 popup-bg" v-if="isOpenProfileEdit">
						<div class="chooseTeam-inner">
							<div class="chooseTeam-wrapper">
								
								<button class="chooseTeam-wrapper__btn-close btn-close" @click="isOpenProfileEdit = !isOpenProfileEdit">
									<img src="/images/icons/close.svg" alt="">
								</button>
								<div class="chooseTeam-body row">
									<div class="col-6">
										<div class="chooseTeam-left w-100 d-flex flex-column justify-content-between align-items-center">
											<h3 class="chooseTeam-title">
												Редактирование профиля
											</h3>
											<label for="avatar-upload">
												<img v-if="inputsProfileRef.avatar_priview" class="profile-avatar rounded-circle" :src="inputsProfileRef.avatar_priview" alt="">
												<img v-else-if="inputsProfileRef.avatar" class="profile-avatar rounded-circle" :src="inputsProfileRef.avatar" alt="">
												<img v-else class="profile-icon" src="/images/icons/profile.svg" alt="">
											</label>
											<label for="avatar-upload" class="upload-text text-center w-100">
												Выбрать фото
											</label>
											<input @change="onAvatarFileSelect" id="avatar-upload" type="file" name="avatar" />
										</div>
									</div>
									<div class="col-6">
										<form
											class="d-flex flex-column justify-content-between align-items-center mt-4"
											style="height: 345px"
										>
											<fieldset class="login-item__fieldset-input fieldset-input">
												<legend>Сменить Nickname</legend>
												<input
													v-model="inputsProfileRef.name"
													class="login-item__form-input input-login"
													:placeholder="inputsProfileRef.name"
													type="text"
													autocomplete="username"
												>
											</fieldset>
											<fieldset class="login-item__fieldset-input fieldset-input">
												<legend>Ссылка на соц.сети</legend>
												<input
													v-model="inputsProfileRef.telegram"
													class="login-item__form-input input-login"
													placeholder="tg.me/username"
													type="text"
													autocomplete="link"
												>
											</fieldset>
											<fieldset class="login-item__fieldset-input fieldset-input">
												<legend>Ссылка на Discord</legend>
												<input
													v-model="inputsProfileRef.discord"
													class="login-item__form-input input-login"
													placeholder="UserName#777"
													type="text"
													autocomplete="link"
												>
											</fieldset>
											<button
												@click.prevent="updateProfile"
												class="login-item__form-btn btn-login mt-4"
											>Сохранить изменения</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<profile-side-nav/>

				</div>
			</div>
		</div>

		<mobile-nav/>
	</div>
</template>

<script>
	import MobileNav from "../UI/MobileNav";
	import HeaderNav from "../header/HeaderNav";
	import ProfileSideNav from "../UI/ProfileSideNav";

	import axios from "axios";
	import emojione from 'emojione';
	import { ref, onBeforeMount } from 'vue';
	import { useRoute, useRouter } from 'vue-router';
	import { mapActions, mapState, useStore } from "vuex";

	export default {
		components: {
			HeaderNav, MobileNav, ProfileSideNav
		},
		computed: {
			...mapState({
				user: state => state.currentUser.user
			})
		},
		methods: {
			...mapActions({
				logout: 'logoutUser'
			})
		},
		setup() {
			const store = useStore();
			const route = useRoute();
			const { user } = store.state.currentUser;
			const isCurrentUser = Number(route.params.id) === user.id || route.params.id === undefined;

			const profileRef = ref(user);
			const inputPostRef = ref('');
			const isFileSelect = ref(false);
			const inputsProfileRef = ref({
				name: profileRef.value.name ?? '',
				avatar: profileRef.value.avatar ?? '',
				discord: profileRef.value.discord ?? '',
				telegram: profileRef.value.telegram ?? '',
			});
			const isOpenProfileEdit = ref(false);

			store.commit('setLoading', true);

			const onInput = (e) => {
				const output = emojione.toImage(e.target.value);

				console.log(output)
			};

			const onAvatarFileSelect = (e) => {
				const reader = new FileReader();

				reader.onload = () => {
					isFileSelect.value = true;
					inputsProfileRef.value.avatar = e.target.files[0];
					inputsProfileRef.value.avatar_priview = reader.result;
				};

				reader.readAsDataURL(e.target.files[0]);
			};

			
			const getProfile = (name) => {
				const id = name === 'profile' || route.params.id === undefined ? user.id : route.params.id;

				axios.get('/api/v1/profiles/' + id).then((response) => {
					const { data } = response;

					profileRef.value = data.data;
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

			const newPost = () => {
				axios.post('/api/v1/posts', {
					content: inputPostRef.value
				}).then((response) => {
					const { data } = response;

					getProfile();
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

			const updateProfile = () => {
				const formData = new FormData();

				formData.append("name", inputsProfileRef.value.name);
				formData.append("avatar", inputsProfileRef.value.avatar);
				formData.append("discord", inputsProfileRef.value.discord);
				formData.append("telegram", inputsProfileRef.value.telegram);

				axios.post('/api/v1/profiles/' + user.id + '/update', formData,{
					onUploadProgress: function(progressEvent) {
						console.log(parseInt(Math.round(( progressEvent.loaded / progressEvent.total) * 100)));
					}
				}).then((response) => {
					const { data } = response.data;

					getProfile();
					store.dispatch('autoLoginUser', {
						user: data
					});
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

			useRouter().afterEach((to, from) => {
				store.commit('setLoading', true);
				getProfile(to.name);
			});

			getProfile();

			return {
				newPost,
				onInput,
				profileRef,
				isFileSelect,
				inputPostRef,
				isCurrentUser,
				updateProfile,
				inputsProfileRef,
				isOpenProfileEdit,
				onAvatarFileSelect,

			};
		}
	}
</script>

<style scoped>
	.profile {
		margin-bottom: 20px;
	}

	.preloader {
		opacity: 1!important;
	}

	.profile-info {
		position: relative;
	}

	.profile-info__user-socials {
		top: 0;
		right: 0;
		display: flex;
		padding: 41px;
		position: absolute;
	}

	.feed-top__user-info {
		font-size: 16px;
		word-break: break-word;
	}

	.chooseTeam {
		background: rgba(23, 23, 33, 0.7)!important;
	}

	.chooseTeam-wrapper {
		height: 55.303vh;
		background: #1d1d2c;
		align-items: normal;
		justify-content: normal;
	}

	.chooseTeam-body {
		width: 100%;
		height: auto;
		display: flex;
	}

	.chooseTeam-title {
		font-family: "GothamPro-Black", sans-serif;
		font-style: normal;
		font-weight: 900;
		font-size: 18px;
		line-height: 120%;
		text-transform: uppercase;
	}

	.chooseTeam-wrapper__btn-close img {
		width: 16px;
		height: 16px;
	}

	.chooseTeam-left {
		height: 350px;
	}

	.upload-text {
		font-family: "GothamPro-Black", sans-serif;
		font-style: normal;
		margin-top: -40px;
		font-weight: 900;
		color: #6E6E86;
	}

	input#avatar-upload {
		display: none;
	}

	.chooseTeam-left > label {
		margin-right: 15px;
	}

	img.profile-avatar {
		width: 200px;
		height: 200px;
		object-fit: cover;
	}

	.profile-icon {
		filter: invert(45%) sepia(11%) saturate(623%) hue-rotate(201deg) brightness(94%) contrast(95%);
	}

	.header-usermenu__iconimg {
		height: 100%;
		width: 100%;
		object-fit: cover;
	}
</style>
