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
                                <a class="profile-info__content-edit" v-if="isCurrentUser" href="#">
									Редактировать профиль
								</a>
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
                                <input class="profile-wall__form-input" placeholder="Что у Вас нового?" type="text">
                                <label class="profile-wall__label">
                                    <input class="profile-wall__label-input" type="file">
                                    <img class="profile-wall__label-file" src="/images/icons/image-icon.svg" alt="">
                                </label>
                                <button class="profile-wall__form-emoji">
                                    <img src="/images/icons/profile-emoji.svg" alt="">
                                </button>
                                <button class="profile-wall__form-btn">
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
												<div class="feed-top__user-info">{{ item.content }}</div>
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

                    <profile-side-nav/>

                </div>
            </div>
        </div>

        <mobile-nav/>
    </div>
</template>

<script>
    import HeaderNav from "../header/HeaderNav";
    import MobileNav from "../UI/MobileNav";
    import ProfileSideNav from "../UI/ProfileSideNav";

	import { ref, onBeforeMount } from 'vue';
	import axios from "axios";
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
			const profileRef = ref({});
			const { user } = store.state.currentUser;
			const isCurrentUser = Number(route.params.id) === user.id || route.params.id === undefined;

			store.commit('setLoading', true);

			const getProfile = (name) => {
				const id = name === 'profile' || route.params.id === undefined ? user.id : route.params.id;

				axios.get('/api/v1/profiles/' + id).then((response) => {
					const { data } = response;

					profileRef.value = data.data;
					store.commit('setLoading', false);
				}).catch((error) => {
					store.commit('setError', error.message);
				});
			};

			useRouter().afterEach((to, from, next) => {
				store.commit('setLoading', true);
				getProfile(to.name);

				next();
			});

			getProfile();

			return {
				profileRef,
				isCurrentUser
			};
		}
    }
</script>

<style>
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
</style>
