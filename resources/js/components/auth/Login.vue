<template>
        <div class="login popup-bg">
            <div class="login-inner">
                <div class="login-item login-item_gradient">
                    <router-link
                            :to="{ name: 'home' }"
                            class="login-item__arrow btn-arrow">
                        <img src="images/icons/arrow-left.svg" alt="">
                    </router-link>
                    <img class="login-item__img" src="images/logo.svg" alt="">
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
                            >
                        </fieldset>
                        <fieldset class="login-item__fieldset-input fieldset-input">
                            <legend>Введите пароль</legend>
                            <input class="login-item__form-input input-login" placeholder="********" type="password">
                        </fieldset>
                        <button class="login-item__form-btn btn-login">Войти</button>
                    </form>
                    <div class="login-item__info-box">
                        <a class="login-item__restore" href="#">Забыли пароль?</a>
                        <div class="login-item__signup">У вас еще нет аккаунта?
                            <router-link :to="{ name: 'register' }">Зарегистрироваться</router-link>
                        </div>
                        <div class="login-item__social">Войти через:</div>
                        <ul class="login-item__social-list">
                            <li class="login-item__social-item">
                                <a class="login-item__social-link" href="#">
                                    <img class="login-item__social-linkimg" src="images/icons/vk.svg" alt="">
                                </a>
                            </li>
                            <li class="login-item__social-item">
                                <a class="login-item__social-link" href="#">
                                    <img class="login-item__social-linkimg" src="images/icons/yandex.svg" alt="">
                                </a>
                            </li>
                            <li class="login-item__social-item">
                                <a class="login-item__social-link" href="#">
                                    <img class="login-item__social-linkimg" src="images/icons/google.svg" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    import {mapState} from "vuex";

    export default {
        components: {

        },
        data() {
            return {

            }
        },
        computed: {
            ...mapState({
                user: state => state.currentUser.user
            })
        }
    }
</script>