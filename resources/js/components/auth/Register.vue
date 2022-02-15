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
                        <input class="signup-item__form-input input-login" placeholder="USER322@mail.ru" type="text">
                    </fieldset>
                    <fieldset class="signup-item__fieldset-input fieldset-input">
                        <legend>Имя пользователя</legend>
                        <input class="signup-item__form-input input-login" placeholder="Kushiro Nara" type="text">
                    </fieldset>
                    <fieldset class="signup-item__fieldset-input fieldset-input">
                        <legend>Введите пароль</legend>
                        <input class="signup-item__form-input input-login" placeholder="********" type="text">
                    </fieldset>
                    <fieldset class="signup-item__fieldset-input fieldset-input">
                        <legend>Повторите пароль</legend>
                        <input class="signup-item__form-input input-login" placeholder="********" type="text">
                    </fieldset>
                    <button class="signup-item__form-btn btn-login">Зарегистрироваться</button>
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
    export default {
        components: {

        },
        data() {
            return {

            }
        },
        computed: {

        }
    }
</script>