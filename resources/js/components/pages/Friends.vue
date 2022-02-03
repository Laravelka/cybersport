<template>
    <div class="main-profile">

        <header-nav/>

        <div class="friends">
            <div class="container-lg">
                <div class="friends__inner">
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
                        <button class="profile-info__btn">Выйти</button>
                    </div>

                    <div class="friends-content">

                        <div class="friends-list">
                            <div class="friends-list__title title">Друзья</div>
                            <div class="friends-list__items">
                                <div class="friends-list__item">
                                    <button class="friends-list__close-btn btn-close">
                                        <img src="images/icons/close-friends.svg" alt="">
                                    </button>
                                    <a class="header-usermenu__icon" href="#">
                                        <div class="header-usermenu__icongradient icon">
                                            <img class="header-usermenu__iconimg" src="images/user/1.png" alt="">
                                        </div>
                                    </a>
                                    <div class="friends-list__item-box">
                                        <div class="friends-list__name-box">
                                            <div class="friends-list__item-id profile-id">#112233</div>
                                            <a class="friends-list__item-name user-name" href="#">Kushiro Nara
                                            </a>
                                            <a class="friends-list__item-online friends-online" href="#">В сети</a>
                                        </div>
                                        <button class="friends-list__item-btn friends-btn friends-list__item-btn_gray">Удалить из
                                            друзей</button>
                                    </div>
                                </div>
                                <div class="friends-list__item">
                                    <button class="friends-list__close-btn btn-close">
                                        <img src="images/icons/close-friends.svg" alt="">
                                    </button>
                                    <a class="header-usermenu__icon" href="#">
                                        <div class="header-usermenu__icongradient icon">
                                            <img class="header-usermenu__iconimg" src="images/user/1.png" alt="">
                                        </div>
                                    </a>
                                    <div class="friends-list__item-box">
                                        <div class="friends-list__name-box">
                                            <div class="friends-list__item-id profile-id">#112233</div>
                                            <a class="friends-list__item-name user-name" href="#">Kushiro Nara
                                            </a>
                                            <a class="friends-list__item-online friends-online" href="#">В сети</a>
                                        </div>
                                        <button class="friends-list__item-btn friends-btn friends-list__item-btn_gray">Удалить из
                                            друзей</button>
                                    </div>
                                </div>
                                <div class="friends-list__item">
                                    <button class="friends-list__close-btn btn-close">
                                        <img src="images/icons/close-friends.svg" alt="">
                                    </button>
                                    <a class="header-usermenu__icon" href="#">
                                        <div class="header-usermenu__icongradient icon">
                                            <img class="header-usermenu__iconimg" src="images/user/1.png" alt="">
                                        </div>
                                    </a>
                                    <div class="friends-list__item-box">
                                        <div class="friends-list__name-box">
                                            <div class="friends-list__item-id profile-id">#112233</div>
                                            <a class="friends-list__item-name user-name" href="#">Kushiro Nara
                                            </a>
                                            <a class="friends-list__item-online friends-online" href="#">В сети</a>
                                        </div>
                                        <button class="friends-list__item-btn friends-btn friends-list__item-btn_gray">Удалить из
                                            друзей</button>
                                    </div>
                                </div>
                            </div>
                            <button class="friends-list__btn friends-yet">еще 10</button>
                            <div class="friends-list__arrows-box">
                                <button class="friends-list__arrow-btn">
                                    <img src="images/icons/arrow-left.svg" alt="">
                                </button>
                                <button class="friends-list__arrow-btn">
                                    <img src="images/icons/arrow-right.svg" alt="">
                                </button>
                            </div>
                            <ul class="friends-list__dots-list">
                                <li class="friends-list__dots-item">
                                    <button class="friends-list__dots-btn"></button>
                                </li>
                                <li class="friends-list__dots-item friends-list__dots-item_active">
                                    <button class="friends-list__dots-btn"></button>
                                </li>
                                <li class="friends-list__dots-item">
                                    <button class="friends-list__dots-btn"></button>
                                </li>
                                <li class="friends-list__dots-item">
                                    <button class="friends-list__dots-btn"></button>
                                </li>
                            </ul>
                        </div>

                        <div class="friends-list">
                            <div class="friends-list__title title">Заявки в друзья</div>
                            <div class="friends-list__items">
                                <div class="friends-list__item">
                                    <button class="friends-list__close-btn btn-close">
                                        <img src="images/icons/close-friends.svg" alt="">
                                    </button>
                                    <a class="header-usermenu__icon" href="#">
                                        <div class="header-usermenu__icongradient icon">
                                            <img class="header-usermenu__iconimg" src="images/user/1.png" alt="">
                                        </div>
                                    </a>
                                    <div class="friends-list__item-box">
                                        <div class="friends-list__name-box">
                                            <div class="friends-list__item-id profile-id">#112233</div>
                                            <a class="friends-list__item-name user-name" href="#">Kushiro Nara
                                            </a>
                                            <a class="friends-list__item-online friends-online" href="#">В сети</a>
                                        </div>
                                        <div class="friends-list__btn-box">
                                            <button class="friends-list__item-btn friends-btn friends-list__item-btn_purple">Добавить
                                                в друзья</button>
                                            <button class="friends-list__item-btn friends-btn friends-list__item-btn_gray">Оставить в
                                                подписчиках</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="friends-list__item">
                                    <button class="friends-list__close-btn btn-close">
                                        <img src="images/icons/close-friends.svg" alt="">
                                    </button>
                                    <a class="header-usermenu__icon" href="#">
                                        <div class="header-usermenu__icongradient icon">
                                            <img class="header-usermenu__iconimg" src="images/user/1.png" alt="">
                                        </div>
                                    </a>
                                    <div class="friends-list__item-box">
                                        <div class="friends-list__name-box">
                                            <div class="friends-list__item-id profile-id">#112233</div>
                                            <a class="friends-list__item-name user-name" href="#">Kushiro Nara
                                            </a>
                                            <a class="friends-list__item-online friends-online" href="#">В сети</a>
                                        </div>
                                        <div class="friends-list__btn-box">
                                            <button class="friends-list__item-btn friends-btn friends-list__item-btn_purple">Добавить
                                                в друзья</button>
                                            <button class="friends-list__item-btn friends-btn friends-list__item-btn_gray">Оставить в
                                                подписчиках</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="friends-list__item">
                                    <button class="friends-list__close-btn btn-close">
                                        <img src="images/icons/close-friends.svg" alt="">
                                    </button>
                                    <a class="header-usermenu__icon" href="#">
                                        <div class="header-usermenu__icongradient icon">
                                            <img class="header-usermenu__iconimg" src="images/user/1.png" alt="">
                                        </div>
                                    </a>
                                    <div class="friends-list__item-box">
                                        <div class="friends-list__name-box">
                                            <div class="friends-list__item-id profile-id">#112233</div>
                                            <a class="friends-list__item-name user-name" href="#">Kushiro Nara
                                            </a>
                                            <a class="friends-list__item-online friends-online" href="#">В сети</a>
                                        </div>
                                        <div class="friends-list__btn-box">
                                            <button class="friends-list__item-btn friends-btn friends-list__item-btn_purple">Добавить
                                                в друзья</button>
                                            <button class="friends-list__item-btn friends-btn friends-list__item-btn_gray">Оставить в
                                                подписчиках</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="friends-list__btn friends-yet">еще 10</button>
                            <div class="friends-list__arrows-box">
                                <button class="friends-list__arrow-btn">
                                    <img src="images/icons/arrow-left.svg" alt="">
                                </button>
                                <button class="friends-list__arrow-btn">
                                    <img src="images/icons/arrow-right.svg" alt="">
                                </button>
                            </div>
                            <ul class="friends-list__dots-list">
                                <li class="friends-list__dots-item">
                                    <button class="friends-list__dots-btn"></button>
                                </li>
                                <li class="friends-list__dots-item friends-list__dots-item_active">
                                    <button class="friends-list__dots-btn"></button>
                                </li>
                                <li class="friends-list__dots-item">
                                    <button class="friends-list__dots-btn"></button>
                                </li>
                                <li class="friends-list__dots-item">
                                    <button class="friends-list__dots-btn"></button>
                                </li>
                            </ul>
                        </div>

                        <div class="friends-list">
                            <div class="friends-list__title title">Подписчики</div>
                            <div class="friends-list__items">
                                <div class="friends-list__item">
                                    <button class="friends-list__close-btn btn-close">
                                        <img src="images/icons/close-friends.svg" alt="">
                                    </button>
                                    <a class="header-usermenu__icon" href="#">
                                        <div class="header-usermenu__icongradient icon">
                                            <img class="header-usermenu__iconimg" src="images/user/1.png" alt="">
                                        </div>
                                    </a>
                                    <div class="friends-list__item-box">
                                        <div class="friends-list__name-box">
                                            <div class="friends-list__item-id profile-id">#112233</div>
                                            <a class="friends-list__item-name user-name" href="#">Kushiro Nara
                                            </a>
                                            <a class="friends-list__item-online friends-online" href="#">В сети</a>
                                        </div>
                                        <button class="friends-list__item-btn friends-btn friends-list__item-btn_purple">Добавить в
                                            друзья</button>
                                    </div>
                                </div>
                                <div class="friends-list__item">
                                    <button class="friends-list__close-btn btn-close">
                                        <img src="images/icons/close-friends.svg" alt="">
                                    </button>
                                    <a class="header-usermenu__icon" href="#">
                                        <div class="header-usermenu__icongradient icon">
                                            <img class="header-usermenu__iconimg" src="images/user/1.png" alt="">
                                        </div>
                                    </a>
                                    <div class="friends-list__item-box">
                                        <div class="friends-list__name-box">
                                            <div class="friends-list__item-id profile-id">#112233</div>
                                            <a class="friends-list__item-name user-name" href="#">Kushiro Nara
                                            </a>
                                            <a class="friends-list__item-online friends-online" href="#">В сети</a>
                                        </div>
                                        <button class="friends-list__item-btn friends-btn friends-list__item-btn_purple">Добавить в
                                            друзья</button>
                                    </div>
                                </div>
                                <div class="friends-list__item">
                                    <button class="friends-list__close-btn btn-close">
                                        <img src="images/icons/close-friends.svg" alt="">
                                    </button>
                                    <a class="header-usermenu__icon" href="#">
                                        <div class="header-usermenu__icongradient icon">
                                            <img class="header-usermenu__iconimg" src="images/user/1.png" alt="">
                                        </div>
                                    </a>
                                    <div class="friends-list__item-box">
                                        <div class="friends-list__name-box">
                                            <div class="friends-list__item-id profile-id">#112233</div>
                                            <a class="friends-list__item-name user-name" href="#">Kushiro Nara
                                            </a>
                                            <a class="friends-list__item-online friends-online" href="#">В сети</a>
                                        </div>
                                        <button class="friends-list__item-btn friends-btn friends-list__item-btn_purple">Добавить в
                                            друзья</button>
                                    </div>
                                </div>
                            </div>
                            <button class="friends-list__btn friends-yet">еще 10</button>
                            <div class="friends-list__arrows-box">
                                <button class="friends-list__arrow-btn">
                                    <img src="images/icons/arrow-left.svg" alt="">
                                </button>
                                <button class="friends-list__arrow-btn">
                                    <img src="images/icons/arrow-right.svg" alt="">
                                </button>
                            </div>
                            <ul class="friends-list__dots-list">
                                <li class="friends-list__dots-item">
                                    <button class="friends-list__dots-btn"></button>
                                </li>
                                <li class="friends-list__dots-item friends-list__dots-item_active">
                                    <button class="friends-list__dots-btn"></button>
                                </li>
                                <li class="friends-list__dots-item">
                                    <button class="friends-list__dots-btn"></button>
                                </li>
                                <li class="friends-list__dots-item">
                                    <button class="friends-list__dots-btn"></button>
                                </li>
                            </ul>
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