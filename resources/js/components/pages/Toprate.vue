<template>
    <div class="main">

        <header-nav/>

        <div class="match-wrapper">

            <!-- toprate -->
            <section class="toprate">
                <div class="toprate__title title">ТАБЛИЦА РЕЙТИНГА</div>
                <div class="toprate__inner">
                    <div class="toprate__tabs-box">
                        <div class="toprate__tabs-left">
                            <button class="toprate__tab-btn toprate-btn toprate-btn_active">По матчам</button>
                            <button class="toprate__tab-btn toprate-btn">По проценту</button>
                        </div>
                        <div class="toprate__tabs-right">
                            <button class="toprate__tab-btn toprate-btn toprate-btn_active">Награды</button>
                        </div>
                    </div>

                    <div class="toprate__bonus">
                        <div class="toprate__bonus-title title">бонусы топа</div>
                        <div class="toprate__bonus-items">
                            <div class="toprate__bonus-item">
                                <div class="toprate__bonus-num">1-5:
                                    <span>10000$</span></div>
                                <div class="toprate__bonus-num">10-50:
                                    <span>1$</span></div>
                            </div>
                            <div class="toprate__bonus-item">
                                <div class="toprate__bonus-num">5-10:
                                    <span>1$</span></div>
                                <div class="toprate__bonus-num">50-100:
                                    <span>1$</span></div>
                            </div>
                        </div>
                    </div>

                    <div class="toprate__items">
                        <div class="toprate__items-arrows">
                            <button class="toprate__arrow-up">
                                <img src="images/icons/arrow-right.svg" alt="">
                            </button>
                            <button class="toprate__arrow-down">
                                <img src="images/icons/arrow-left.svg" alt="">
                            </button>
                        </div>
                        <div class="toprate__item">
                            <div class="toprate__item-num toprate__item-num_yellow">#1</div>
                            <div class="toprate__icon-box">
                                <a class="header-usermenu__icon" href="#">
                                    <div class="header-usermenu__icongradient icon">
                                        <img class="header-usermenu__iconimg" src="images/user/1.png" alt="">
                                    </div>
                                </a>
                                <img class="toprate__icon-gif" src="images/icons/gif.png" alt="">
                            </div>
                            <div class="toprate__item-name toprate-name">Kushiro Nara</div>
                            <div class="toprate__item-box">
                                <img class="toprate__box-img" src="images/icons/pw-ball.png" alt="">
                                <div class="toprate__box-text">Процент побед: <span>99%</span></div>
                            </div>
                            <div class="toprate__item-box">
                                <img class="toprate__box-img" src="images/icons/played.png" alt="">
                                <div class="toprate__box-text">Кол-во. игр: <span>1337</span></div>
                            </div>
                            <div class="toprate__item-box">
                                <img class="toprate__box-img" src="images/icons/money-stat.png" alt="">
                                <div class="toprate__box-text">Общий счет: <span>228$</span></div>
                            </div>
                        </div>
                        <div class="toprate__item">
                            <div class="toprate__item-num toprate__item-num_yellow">#2</div>
                            <div class="toprate__icon-box">
                                <a class="header-usermenu__icon" href="#">
                                    <div class="header-usermenu__icongradient icon">
                                        <img class="header-usermenu__iconimg" src="images/user/1.png" alt="">
                                    </div>
                                </a>
                                <img class="toprate__icon-gif" src="images/icons/gif.png" alt="">
                            </div>
                            <div class="toprate__item-name toprate-name">Kushiro Nara</div>
                            <div class="toprate__item-box">
                                <img class="toprate__box-img" src="images/icons/pw-ball.png" alt="">
                                <div class="toprate__box-text">Процент побед: <span>99%</span></div>
                            </div>
                            <div class="toprate__item-box">
                                <img class="toprate__box-img" src="images/icons/played.png" alt="">
                                <div class="toprate__box-text">Кол-во. игр: <span>1337</span></div>
                            </div>
                            <div class="toprate__item-box">
                                <img class="toprate__box-img" src="images/icons/money-stat.png" alt="">
                                <div class="toprate__box-text">Общий счет: <span>228$</span></div>
                            </div>
                        </div>
                        <div class="toprate__item">
                            <div class="toprate__item-num toprate__item-num_yellow">#3</div>
                            <div class="toprate__icon-box">
                                <a class="header-usermenu__icon" href="#">
                                    <div class="header-usermenu__icongradient icon">
                                        <img class="header-usermenu__iconimg" src="images/user/1.png" alt="">
                                    </div>
                                </a>
                                <img class="toprate__icon-gif" src="images/icons/gif.png" alt="">
                            </div>
                            <div class="toprate__item-name toprate-name">Kushiro Nara</div>
                            <div class="toprate__item-box">
                                <img class="toprate__box-img" src="images/icons/pw-ball.png" alt="">
                                <div class="toprate__box-text">Процент побед: <span>99%</span></div>
                            </div>
                            <div class="toprate__item-box">
                                <img class="toprate__box-img" src="images/icons/played.png" alt="">
                                <div class="toprate__box-text">Кол-во. игр: <span>1337</span></div>
                            </div>
                            <div class="toprate__item-box">
                                <img class="toprate__box-img" src="images/icons/money-stat.png" alt="">
                                <div class="toprate__box-text">Общий счет: <span>228$</span></div>
                            </div>
                        </div>
                        <div class="toprate__item">
                            <div class="toprate__item-num toprate__item-num_blue">#4</div>
                            <div class="toprate__icon-box">
                                <a class="header-usermenu__icon" href="#">
                                    <div class="header-usermenu__icongradient icon">
                                        <img class="header-usermenu__iconimg" src="images/user/1.png" alt="">
                                    </div>
                                </a>
                                <img class="toprate__icon-gif" src="images/icons/gif.png" alt="">
                            </div>
                            <div class="toprate__item-name toprate-name">Kushiro Nara</div>
                            <div class="toprate__item-box">
                                <img class="toprate__box-img" src="images/icons/pw-ball.png" alt="">
                                <div class="toprate__box-text">Процент побед: <span>99%</span></div>
                            </div>
                            <div class="toprate__item-box">
                                <img class="toprate__box-img" src="images/icons/played.png" alt="">
                                <div class="toprate__box-text">Кол-во. игр: <span>1337</span></div>
                            </div>
                            <div class="toprate__item-box">
                                <img class="toprate__box-img" src="images/icons/money-stat.png" alt="">
                                <div class="toprate__box-text">Общий счет: <span>228$</span></div>
                            </div>
                        </div>
                        <div class="toprate__item">
                            <div class="toprate__item-num toprate__item-num_blue">#5</div>
                            <div class="toprate__icon-box">
                                <a class="header-usermenu__icon" href="#">
                                    <div class="header-usermenu__icongradient icon">
                                        <img class="header-usermenu__iconimg" src="images/user/1.png" alt="">
                                    </div>
                                </a>
                                <img class="toprate__icon-gif" src="images/icons/gif.png" alt="">
                            </div>
                            <div class="toprate__item-name toprate-name">Kushiro Nara</div>
                            <div class="toprate__item-box">
                                <img class="toprate__box-img" src="images/icons/pw-ball.png" alt="">
                                <div class="toprate__box-text">Процент побед: <span>99%</span></div>
                            </div>
                            <div class="toprate__item-box">
                                <img class="toprate__box-img" src="images/icons/played.png" alt="">
                                <div class="toprate__box-text">Кол-во. игр: <span>1337</span></div>
                            </div>
                            <div class="toprate__item-box">
                                <img class="toprate__box-img" src="images/icons/money-stat.png" alt="">
                                <div class="toprate__box-text">Общий счет: <span>228$</span></div>
                            </div>
                        </div>
                        <div class="toprate__item">
                            <div class="toprate__item-num toprate__item-num_blue">#6</div>
                            <div class="toprate__icon-box">
                                <a class="header-usermenu__icon" href="#">
                                    <div class="header-usermenu__icongradient icon">
                                        <img class="header-usermenu__iconimg" src="images/user/1.png" alt="">
                                    </div>
                                </a>
                                <img class="toprate__icon-gif" src="images/icons/gif.png" alt="">
                            </div>
                            <div class="toprate__item-name toprate-name">Kushiro Nara</div>
                            <div class="toprate__item-box">
                                <img class="toprate__box-img" src="images/icons/pw-ball.png" alt="">
                                <div class="toprate__box-text">Процент побед: <span>99%</span></div>
                            </div>
                            <div class="toprate__item-box">
                                <img class="toprate__box-img" src="images/icons/played.png" alt="">
                                <div class="toprate__box-text">Кол-во. игр: <span>1337</span></div>
                            </div>
                            <div class="toprate__item-box">
                                <img class="toprate__box-img" src="images/icons/money-stat.png" alt="">
                                <div class="toprate__box-text">Общий счет: <span>228$</span></div>
                            </div>
                        </div>
                        <div class="toprate__item">
                            <div class="toprate__item-num toprate__item-num_purple">#7</div>
                            <div class="toprate__icon-box">
                                <a class="header-usermenu__icon" href="#">
                                    <div class="header-usermenu__icongradient icon">
                                        <img class="header-usermenu__iconimg" src="images/user/1.png" alt="">
                                    </div>
                                </a>
                                <img class="toprate__icon-gif" src="images/icons/gif.png" alt="">
                            </div>
                            <div class="toprate__item-name toprate-name">Kushiro Nara</div>
                            <div class="toprate__item-box">
                                <img class="toprate__box-img" src="images/icons/pw-ball.png" alt="">
                                <div class="toprate__box-text">Процент побед: <span>99%</span></div>
                            </div>
                            <div class="toprate__item-box">
                                <img class="toprate__box-img" src="images/icons/played.png" alt="">
                                <div class="toprate__box-text">Кол-во. игр: <span>1337</span></div>
                            </div>
                            <div class="toprate__item-box">
                                <img class="toprate__box-img" src="images/icons/money-stat.png" alt="">
                                <div class="toprate__box-text">Общий счет: <span>228$</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <chat/>

        </div>

        <mobile-nav/>
    </div>
</template>

<script>
    import HeaderNav from "../header/HeaderNav";
    import Chat from "../chat/Chat";
    import MobileNav from "../UI/MobileNav";

    export default {
        components: {
            HeaderNav, Chat, MobileNav
        }
    }
</script>