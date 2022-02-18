<template>
    <div class="signup popup-bg">
        <div class="signup-inner">
            <div class="signup-item signup-item_gradient">
                <router-link
                        :to="{ name: 'home' }"
                        class="signup-item__arrow btn-arrow">
                    <img src="images/icons/arrow-left.svg" alt="">
                </router-link>
                <img class="signup-item__img" src="images/logo.svg" alt="">
                <h5 class="signup-item__title popup-title">Регистрация</h5>
                <form
                        @submit.prevent
                        action="#"
                        class="signup-item__form"
                >
                    <fieldset class="signup-item__fieldset-input fieldset-input">
                        <legend>Почта или номер телефона</legend>
                        <input
                                v-model="user.email"
                                class="signup-item__form-input input-login"
                                placeholder="USER322@mail.ru"
                                type="text"
                                autocomplete="email"
                        >
                    </fieldset>
                    <fieldset class="signup-item__fieldset-input fieldset-input">
                        <legend>Имя пользователя</legend>
                        <input
                                v-model="user.name"
                                class="signup-item__form-input input-login"
                                placeholder="Kushiro Nara"
                                type="text"
                                autocomplete="username"
                        >
                    </fieldset>
                    <fieldset class="signup-item__fieldset-input fieldset-input">
                        <legend>Введите пароль</legend>
                        <input
                                v-model="user.password"
                                class="signup-item__form-input input-login"
                                placeholder="********"
                                type="password"
                                autocomplete="new-password"
                        >
                    </fieldset>
                    <fieldset class="signup-item__fieldset-input fieldset-input">
                        <legend>Повторите пароль</legend>
                        <input
                                v-model="user.confirm_password"
                                class="signup-item__form-input input-login"
                                placeholder="********"
                                type="password"
                                autocomplete="new-password"
                        >
                    </fieldset>
                    <button
                            @click="register(this.user)"
                            class="signup-item__form-btn btn-login"
                    >Зарегистрироваться</button>
                </form>
                <div class="signup-item__info-box">
                    <div class="login-item__signup">У вас есть аккаунт?
                        <router-link :to="{ name: 'login' }">Войти</router-link>
                    </div>
                    <div class="signup-item__social">Войти через:</div>
                    <ul class="signup-item__social-list">
                        <li class="signup-item__social-item">
                            <a class="signup-item__social-link" href="#">
                                <img class="signup-item__social-linkimg" src="images/icons/vk.svg" alt="">
                            </a>
                        </li>
                        <li class="signup-item__social-item">
                            <a class="signup-item__social-link" href="#">
                                <img class="signup-item__social-linkimg" src="images/icons/yandex.svg" alt="">
                            </a>
                        </li>
                        <li class="signup-item__social-item">
                            <a class="signup-item__social-link" href="#">
                                <img class="signup-item__social-linkimg" src="images/icons/google.svg" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions} from "vuex";

    export default {
        components: {

        },
        data() {
            return {
                user: {
                    email: "",
                    name: "",
                    password: "",
                    confirm_password: ""
                }
            }
        },
        computed: {

        },
        methods: {
            ...mapActions({
                register: 'registerUser'
            })
        }
    }
</script>