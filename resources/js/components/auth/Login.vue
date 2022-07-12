<template>
	<div class="login popup-bg">
		<div class="login-inner">
			<div class="login-item login-item_gradient">
				<router-link
						:to="{ name: 'home' }"
						class="login-item__arrow btn-arrow">
					<img src="/images/icons/arrow-left.svg" alt="">
				</router-link>
				<img class="login-item__img" src="/images/logo.svg" alt="">
				<h5 class="login-item__title popup-title">Добро пожаловать</h5>
				<form
						@submit.prevent
						action="#"
						class="login-item__form"
				>
					<fieldset class="login-item__fieldset-input fieldset-input">
						<legend>Введите почту или телефон</legend>
						<input
								v-model="user.email"
								class="login-item__form-input input-login"
								placeholder="USER322@mail.ru"
								type="text"
								autocomplete="email"
						>
					</fieldset>
					<fieldset class="login-item__fieldset-input fieldset-input">
						<legend>Введите пароль</legend>
						<input
								v-model="user.password"
								class="login-item__form-input input-login"
								placeholder="********"
								type="password"
								autocomplete="current-password"
						>
					</fieldset>
					<button
							@click="login(this.user)"
							class="login-item__form-btn btn-login"
					>Войти</button>
				</form>
				<div class="login-item__info-box">
					<a class="login-item__restore" href="#">Забыли пароль?</a>
					<div class="login-item__signup">У вас еще нет аккаунта?
						<router-link :to="{ name: 'register' }">Зарегистрироваться</router-link>
					</div>
					<div class="login-item__social">Войти через:</div>
					<ul class="signup-item__social-list">
                        <li class="signup-item__social-item">
                            <a class="signup-item__social-link" href="/vkontakte/redirect">
                                <img class="signup-item__social-linkimg" src="/images/icons/vk.svg" alt="">
                            </a>
                        </li>
                        <li class="signup-item__social-item">
                            <a class="signup-item__social-link" href="/yandex/redirect">
                                <img class="signup-item__social-linkimg" src="/images/icons/yandex.svg" alt="">
                            </a>
                        </li>
                        <li class="signup-item__social-item">
                            <a class="signup-item__social-link" href="/google/redirect">
                                <img class="signup-item__social-linkimg" src="/images/icons/google.svg" alt="">
                            </a>
                        </li>
                        <li class="login-item__social-item">
                            <a class="login-item__social-link" href="/steam/redirect">
                                <img
									class="login-item__social-linkimg"
									src="/images/icons/steam.svg"
									alt=""
									style="filter: invert(57%) sepia(9%) saturate(694%) hue-rotate(209deg) brightness(96%) contrast(89%)"
								>
                            </a>
                        </li>
                    </ul>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
    import { mapActions } from "vuex";

    export default {
        components: {

        },
        data() {
            return {
                user: {
                    email: "",
                    password: ""
                }
            }
        },
        computed: {

        },
        methods: {
            ...mapActions({
                login: 'loginUser'
            })
        },
        created() {
			if (window.arrUser) {
				this.$store.dispatch('autoLoginUser', {
					user: window.arrUser,
					token: window.accessToken
				});
				this.$router.replace({name: 'matches'});
			}

            if (this.$route.query['authError']) {
                this.$store.dispatch('setError', 'Для доступа к данной странице необходимо войти или зарегистрироваться');
            }
        }
    }
</script>
