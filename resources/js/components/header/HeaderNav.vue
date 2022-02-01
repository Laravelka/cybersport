<template>
    <header class="header">
        <div class="container">
            <div class="header-inner">
                <div class="header-inner__left">
                    <router-link class="logo" to="/">
                        <img class="logo__img" src="images/logo.svg" alt="">
                    </router-link>
                    <div class="header-social__inner">
                        <a class="header-social__link" href="https://www.twitch.tv/" target="_blank">
                            <img class="header-social__img" src="images/icons/twitch.svg" alt="">
                        </a>
                        <a class="header-social__link" href="https://discord.com/" target="_blank">
                            <img class="header-social__img" src="images/icons/discord.svg" alt="">
                        </a>
                        <a class="header-social__link" href="https://vk.com/" target="_blank">
                            <img class="header-social__img" src="images/icons/vk.svg" alt="">
                        </a>
                    </div>
                    <nav class="menu">
                        <ul class="menu__list">
                            <li class="menu__list-item">
                                <router-link class="menu__list-link" to="/feed">Лента</router-link>
                            </li>
                            <li class="menu__list-item">
                                <router-link class="menu__list-link" to="#">Топ</router-link>
                            </li>
                            <li class="menu__list-item">
                                <router-link class="menu__list-link" to="#">Инструкция</router-link>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="header-inner__right">
                    <div class="header-teamname__inner">
                        <div class="header-teamname__item">
                            <div class="header-teamname__name">Team Name</div>
                        </div>
                        <div class="header-teamname__item">
                            <div class="header-teamname__versus">VS</div>
                            <div class="header-teamname__live live">Live</div>
                        </div>
                        <div class="header-teamname__item">
                            <div class="header-teamname__namebox">
                                <div class="header-teamname__name">Team Name</div>
                            </div>
                        </div>
                    </div>
                    <div class="header-usermenu">
                        <router-link class="header-usermenu__icon" to="/profile">
                            <div class="header-usermenu__icongradient icon">
                                <img class="header-usermenu__iconimg" src="images/user/1.png" alt="">
                            </div>
                        </router-link>
                        <div class="header-usermenu__info">
                            <router-link class="header-usermenu__name user-name" to="/profile">Kushiro Nara
                                <span class="header-usermenu__settings-icon">
                                    <img class="header-usermenu__settings" src="images/icons/settings.svg" alt="">
                                </span>
                                <span class="header-usermenu__exit-icon">
                                    <img class="header-usermenu__exit" src="images/icons/exit-icon.svg" alt="">
                                </span>
                            </router-link>
                            <div class="header-usermenu__num purse">999,99 $
                                <span>
                                    <img class="header-usermenu__numimg" src="images/icons/purse.svg" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mobile-logo">
                    <img class="mobile-logo__img" src="images/mobile-logo.svg" alt="" >
                </div>

                <button class="burger-btn">
                    <span></span>
                </button>

                <div class="mobile-menu">
                    <div class="mobile-menu__inner">
                        <div class="mobile-menu__title">ЛИЧНЫЙ КАБИНЕТ</div>
                        <button class="mobile-menu__close-btn">
                            <img src="images/icons/close.svg" alt="">
                        </button>
                        <button class="mobile-menu__settings-btn">
                            <img src="images/icons/settings.svg" alt="">
                        </button>
                        <div class="mobile-menu__usermenu">
                            <router-link class="mobile-menu__usermenu-icon" to="/profile">
                                <div class="mobile-menu__usermenu-icongradient icon">
                                    <img class="mobile-menu__usermenu-iconimg" src="images/user/1.png" alt="">
                                </div>
                            </router-link>
                            <div class="mobile-menu__usermenu-info">
                                <router-link class="mobile-menu__usermenu-name" to="/profile">Kushiro Nara
                                    <span>
                                    </span>
                                </router-link>
                                <div class="mobile-menu__usermenu-num">999,99 $
                                    <span>
                                        <img class="mobile-menu__usermenu-numimg" src="images/icons/purse.svg" alt="">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-menu__box">
                            <div class="mobile-menu__lk">
                                <ul class="mobile-menu__list">
                                    <li class="mobile-menu__list-item">
                                        <svg class="mobile-menu__list-img" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1224:4902)">
                                                <path
                                                        d="M1.20715 17.07V15.6329C1.23381 15.1093 1.40307 14.603 1.69666 14.1686C1.99024 13.7343 2.39697 13.3885 2.87287 13.1686C7.4467 11.3314 12.5533 11.3314 17.1272 13.1686C17.603 13.3885 18.0098 13.7343 18.3034 14.1686C18.5969 14.603 18.7662 15.1093 18.7929 15.6329V17.07C18.7927 17.4552 18.7166 17.8366 18.5689 18.1924C18.4212 18.5481 18.2049 18.8713 17.9323 19.1434C17.6596 19.4155 17.336 19.6312 16.9799 19.7782C16.6239 19.9252 16.2424 20.0006 15.8572 20H4.14287C3.75767 20.0006 3.37613 19.9252 3.02007 19.7782C2.66401 19.6312 2.34041 19.4155 2.06777 19.1434C1.79513 18.8713 1.57878 18.5481 1.43111 18.1924C1.28344 17.8366 1.20734 17.4552 1.20715 17.07ZM10 2.08952e-07C9.03365 -0.000282354 8.0889 0.28602 7.28526 0.822697C6.48162 1.35937 5.85519 2.12232 5.48518 3.01504C5.11517 3.90777 5.01822 4.89016 5.20657 5.83799C5.39493 6.78582 5.86013 7.65651 6.54335 8.33993C7.22658 9.02335 8.09713 9.48881 9.0449 9.67745C9.99268 9.86608 10.9751 9.76941 11.8679 9.39966C12.7608 9.02992 13.5239 8.4037 14.0608 7.60022C14.5977 6.79674 14.8843 5.85208 14.8843 4.88571C14.8845 4.24418 14.7583 3.60889 14.5129 3.01614C14.2675 2.42339 13.9078 1.88478 13.4542 1.43108C13.0007 0.97738 12.4622 0.617479 11.8695 0.371931C11.2768 0.126383 10.6415 1.81512e-07 10 2.08952e-07Z"
                                                        fill="#6E6E86" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1224:4902">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <a class="mobile-menu__list-link" href="#">Профиль</a>
                                    </li>
                                    <li class="mobile-menu__list-item">
                                        <svg class="mobile-menu__list-img" width="16" height="18" viewBox="0 0 16 18" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M13 6C14.6569 6 16 4.65685 16 3C16 1.34315 14.6569 0 13 0C11.3431 0 10 1.34315 10 3C10 3.38587 10.0729 3.75473 10.2056 4.09357L5.2793 7.04933C4.72908 6.40702 3.91207 6 3 6C1.34315 6 0 7.34315 0 9C0 10.6569 1.34315 12 3 12C3.91207 12 4.72908 11.593 5.2793 10.9507L10.2056 13.9064C10.0729 14.2453 10 14.6141 10 15C10 16.6569 11.3431 18 13 18C14.6569 18 16 16.6569 16 15C16 13.3431 14.6569 12 13 12C12.0879 12 11.2709 12.407 10.7207 13.0493L5.79445 10.0936C5.92715 9.75473 6 9.38587 6 9C6 8.61413 5.92715 8.24527 5.79445 7.90643L10.7207 4.95067C11.2709 5.59298 12.0879 6 13 6Z"
                                                  fill="#6E6E86" />
                                        </svg>
                                        <a class="mobile-menu__list-link" href="#">Рефералка</a>
                                    </li>
                                    <li class="mobile-menu__list-item">
                                        <svg class="mobile-menu__list-img" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6 0H12V18H6V0ZM0 7H5V18H0V7ZM18 5H13V18H18V5Z"
                                                  fill="#6E6E86" />
                                        </svg>
                                        <a class="mobile-menu__list-link" href="#">Статистика</a>
                                    </li>
                                    <li class="mobile-menu__list-item">
                                        <svg class="mobile-menu__list-img" width="16" height="22" viewBox="0 0 16 22" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M15.1656 2.56836C15.1656 3.94907 14.0464 5.06836 12.6656 5.06836C11.2849 5.06836 10.1656 3.94907 10.1656 2.56836C10.1656 1.18765 11.2849 0.0683594 12.6656 0.0683594C14.0464 0.0683594 15.1656 1.18765 15.1656 2.56836ZM12.4156 1.31836V2.31836H11.4156V2.81836H12.4156V3.81836H12.9156V2.81836H13.9156V2.31836H12.9156V1.31836H12.4156ZM12.9858 5.55157C12.8806 5.56273 12.7738 5.56845 12.6657 5.56845C11.0088 5.56845 9.66565 4.22531 9.66565 2.56845C9.66565 2.12285 9.76281 1.69993 9.93709 1.31973C9.34134 1.06915 8.68684 0.930664 8 0.930664C5.23858 0.930664 3 3.16924 3 5.93066C3 8.69209 5.23858 10.9307 8 10.9307C10.7614 10.9307 13 8.69209 13 5.93066C13 5.80313 12.9952 5.67671 12.9858 5.55157ZM16 16.9307C16 19.6921 12.4183 21.9307 8 21.9307C3.58172 21.9307 0 19.6921 0 16.9307C0 14.1692 3.58172 11.9307 8 11.9307C12.4183 11.9307 16 14.1692 16 16.9307Z"
                                                  fill="#6E6E86" />
                                        </svg>

                                        <a class="mobile-menu__list-link" href="#">Подписчики
                                            и друзья</a>
                                    </li>
                                    <li class="mobile-menu__list-item">
                                        <svg class="mobile-menu__list-img" width="16" height="20" viewBox="0 0 16 20" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M9.01121 1.90039C9.01121 1.34201 8.55856 0.889361 8.00018 0.889361C7.44181 0.889361 6.98915 1.34201 6.98915 1.90039H9.01121ZM6.98915 1.90039V2.80039H9.01121V1.90039H6.98915Z"
                                                    fill="#6E6E86" />
                                            <path
                                                    d="M14.2959 14.5H1.7041C1.39197 14.5 1.1975 14.1614 1.35477 13.8918L3.07411 10.9444C3.43489 10.3259 3.625 9.62271 3.625 8.90668V7.2762C3.625 6.13721 4.06919 5.04312 4.86315 4.22648C6.58111 2.45943 9.41889 2.45943 11.1369 4.22648C11.9308 5.04312 12.375 6.13721 12.375 7.2762V8.90668C12.375 9.62271 12.5651 10.3259 12.9259 10.9444L14.6452 13.8918C14.8025 14.1614 14.608 14.5 14.2959 14.5Z"
                                                    fill="#6E6E86" />
                                            <path
                                                    d="M14.6452 13.8918L15.5185 13.3824L15.5185 13.3824L14.6452 13.8918ZM12.9259 10.9444L12.0526 11.4538L12.0526 11.4538L12.9259 10.9444ZM3.07411 10.9444L3.94741 11.4538L3.94741 11.4538L3.07411 10.9444ZM1.35477 13.8918L2.22808 14.4012L2.22808 14.4012L1.35477 13.8918ZM4.86315 4.22648L5.58805 4.93124L5.58805 4.93124L4.86315 4.22648ZM11.1369 4.22648L10.4119 4.93124L10.4119 4.93124L11.1369 4.22648ZM1.7041 15.511H14.2959V13.489H1.7041V15.511ZM15.5185 13.3824L13.7992 10.435L12.0526 11.4538L13.7719 14.4012L15.5185 13.3824ZM13.386 8.90668V7.2762H11.364V8.90668H13.386ZM2.61397 7.2762V8.90668H4.63603V7.2762H2.61397ZM2.2008 10.435L0.481467 13.3824L2.22808 14.4012L3.94741 11.4538L2.2008 10.435ZM2.61397 8.90668C2.61397 9.4437 2.47139 9.97109 2.2008 10.435L3.94741 11.4538C4.39839 10.6807 4.63603 9.80171 4.63603 8.90668H2.61397ZM4.13824 3.52171C3.1608 4.52708 2.61397 5.874 2.61397 7.2762H4.63603C4.63603 6.40042 4.97757 5.55917 5.58805 4.93124L4.13824 3.52171ZM11.8618 3.52171C9.74679 1.34632 6.25321 1.34632 4.13824 3.52171L5.58805 4.93124C6.909 3.57255 9.091 3.57255 10.4119 4.93124L11.8618 3.52171ZM13.386 7.2762C13.386 5.874 12.8392 4.52708 11.8618 3.52171L10.4119 4.93124C11.0224 5.55917 11.364 6.40042 11.364 7.2762H13.386ZM13.7992 10.435C13.5286 9.97109 13.386 9.4437 13.386 8.90668H11.364C11.364 9.80171 11.6016 10.6807 12.0526 11.4538L13.7992 10.435ZM14.2959 15.511C15.3883 15.511 16.069 14.326 15.5185 13.3824L13.7719 14.4012C13.536 13.9968 13.8277 13.489 14.2959 13.489V15.511ZM1.7041 13.489C2.17228 13.489 2.46398 13.9968 2.22808 14.4012L0.481467 13.3824C-0.0689747 14.326 0.611673 15.511 1.7041 15.511V13.489Z"
                                                    fill="#6E6E86" />
                                            <path
                                                    d="M6.24988 17.2002V16.1892C5.84354 16.1892 5.47669 16.4324 5.31856 16.8067C5.16042 17.181 5.24173 17.6136 5.52498 17.905L6.24988 17.2002ZM9.74988 17.2002L10.4748 17.905C10.758 17.6136 10.8393 17.181 10.6812 16.8067C10.5231 16.4324 10.1562 16.1892 9.74988 16.1892V17.2002ZM6.24988 18.2112H9.74988V16.1892H6.24988V18.2112ZM9.02498 16.4954L8.72478 16.8042L10.1746 18.2137L10.4748 17.905L9.02498 16.4954ZM7.27498 16.8042L6.97478 16.4954L5.52498 17.905L5.82517 18.2137L7.27498 16.8042ZM8.72478 16.8042C8.32777 17.2125 7.67198 17.2125 7.27498 16.8042L5.82517 18.2137C7.01619 19.4388 8.98357 19.4388 10.1746 18.2137L8.72478 16.8042Z"
                                                    fill="#6E6E86" />
                                        </svg>
                                        <a class="mobile-menu__list-link" href="#">Уведомления</a>
                                    </li>
                                </ul>
                                <div class="mobile-menu__instruction-box">
                                    <svg width="10" height="20" viewBox="0 0 10 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M4.76243 6.25143C6.48872 6.25143 7.88815 4.852 7.88815 3.12571C7.88815 1.39943 6.48872 0 4.76243 0C3.03615 0 1.63672 1.39943 1.63672 3.12571C1.63672 4.852 3.03615 6.25143 4.76243 6.25143Z"
                                                fill="#A2A3C2" />
                                        <path
                                                d="M8.35696 17.4996C8.10828 17.4996 7.86977 17.4009 7.69379 17.2252C7.51782 17.0495 7.41877 16.8111 7.41839 16.5624V9.41956C7.41839 9.17102 7.31965 8.93265 7.1439 8.7569C6.96816 8.58116 6.72979 8.48242 6.48124 8.48242H1.64124C1.3927 8.48242 1.15433 8.58116 0.978584 8.7569C0.802836 8.93265 0.704102 9.17102 0.704102 9.41956V10.0453C0.704102 10.2938 0.802836 10.5322 0.978584 10.7079C1.15433 10.8837 1.3927 10.9824 1.64124 10.9824C1.88979 10.9824 2.12816 11.0812 2.3039 11.2569C2.47965 11.4327 2.57839 11.671 2.57839 11.9196V16.5696C2.57839 16.8181 2.47965 17.0565 2.3039 17.2322C2.12816 17.408 1.88979 17.5067 1.64124 17.5067C1.3927 17.5067 1.15433 17.6054 0.978584 17.7812C0.802836 17.9569 0.704102 18.1953 0.704102 18.4438V19.0696C0.705987 19.3169 0.805552 19.5534 0.981097 19.7276C1.15664 19.9018 1.39393 19.9996 1.64124 19.9996H8.35553C8.4786 19.9996 8.60046 19.9753 8.71416 19.9282C8.82786 19.8811 8.93117 19.8121 9.01819 19.7251C9.10521 19.6381 9.17424 19.5347 9.22134 19.421C9.26843 19.3073 9.29267 19.1855 9.29267 19.0624V18.4367C9.29267 18.1884 9.19414 17.9503 9.0187 17.7746C8.84326 17.5988 8.60526 17.4999 8.35696 17.4996Z"
                                                fill="#A2A3C2" />
                                    </svg>
                                    <a class="mobile-menu__list-link" href="#">Инструкция</a>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-menu__social-items">
                            <a class="mobile-menu__social-link" href="https://www.twitch.tv/" target="_blank">
                                <img class="mobile-menu__social-img" src="images/icons/twitch.svg" alt="">
                            </a>
                            <a class="mobile-menu__social-link" href="https://discord.com/" target="_blank">
                                <img class="mobile-menu__social-img" src="images/icons/discord.svg" alt="">
                            </a>
                            <a class="mobile-menu__social-link" href="https://vk.com/" target="_blank">
                                <img class="mobile-menu__social-img" src="images/icons/vk.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>
</template>

<script>

</script>