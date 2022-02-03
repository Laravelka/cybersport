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
                                    <img class="header-usermenu__iconimg" src="images/user/1.png" alt="">
                                </div>
                            </a>
                            <div class="profile-info__content">
                                <div class="profile-info__content-id profile-id">#112233</div>
                                <a class="profile-info__content-name profile-name" href="#">Kushiro Nara
                                    <span>
                                        <img class="profile-info__content-crown" src="images/icons/crown.png" alt="">
                                    </span>
                                </a>
                                <div class="profile-info__content-subname profile-subname">Связь со мной: tg/predictwars</div>
                                <a class="profile-info__content-edit" href="#">Редактировать профиль</a>
                            </div>
                        </div>
                        <ul class="profile-info__list">
                            <li class="profile-info__list-item info-list">
                                <a class="profile-info__list-link info-link" href="#">Друзей:</a>
                                <div class="profile-info__list-num profile-info__list-num_blue">100</div>
                            </li>
                            <li class="profile-info__list-item info-list">
                                <a class="profile-info__list-link info-link" href="#">Подписчики:</a>
                                <div class="profile-info__list-num profile-info__list-num_blue">120</div>
                            </li>
                            <li class="profile-info__list-item info-list">
                                <a class="profile-info__list-link info-link" href="#">PW баллы:</a>
                                <div class="profile-info__list-num profile-info__list-num_blue">999</div>
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
                        <!-- <button class="profile-info__btn">Выйти</button> -->
                    </div>

                    <div class="profile-wall">
                        <div class="profile-wall__title title">СТЕНА ПОЛЬЗОВАТЕЛЯ</div>
                        <form class="profile-wall__form" action="#">
                            <div class="profile-wall__form-box">
                                <input class="profile-wall__form-input" placeholder="Что у Вас нового?" type="text">
                                <label class="profile-wall__label">
                                    <input class="profile-wall__label-input" type="file">
                                    <img class="profile-wall__label-file" src="images/icons/image-icon.svg" alt="">
                                </label>
                                <button class="profile-wall__form-emoji">
                                    <img src="images/icons/profile-emoji.svg" alt="">
                                </button>
                                <button class="profile-wall__form-btn">
                                    <img src="images/icons/profile-search.svg" alt="">
                                </button>
                            </div>
                        </form>
                        <div class="profile-wall__record">
                            <div class="profile-wall__record-notext">Пользователь не выложил пока не одну запись</div>
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

    export default {
        components: {
            HeaderNav, MobileNav, ProfileSideNav
        }
    }
</script>