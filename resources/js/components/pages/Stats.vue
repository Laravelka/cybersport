<template>
    <div class="main-profile">

        <header-nav/>

        <div class="statistics">
            <div class="container-lg">
                <div class="statistics__inner">

                    <div class="statistics-poeple">
                        <div class="statistics-poeple__title title">Статистика по матчам</div>
                        <div class="statistics-poeple__items">
                            <div class="statistics-poeple__item-chart">
                                <figure class="chart">
                                    <svg width="100%" height="100%" viewBox="0 0 42 42" class="donut">
                                        <circle class="donut-hole" cx="21" cy="21" r="15.91549430918954" fill="#212136"></circle>
                                        <circle class="donut-ring" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#2B2B42"
                                                stroke-width="7">
                                        </circle>
                                        <circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="url(#Gradient2)"
                                                stroke-width="7" stroke-dasharray="85 15" stroke-dashoffset="25">
                                        </circle>
                                        <defs>
                                            <linearGradient id="Gradient2" x1="0" x2="0" y1="0" y2="1">
                                                <stop offset="0%" stop-color="#FD03A3" />
                                                <stop offset="100%" stop-color="#FEAC00" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                    <figcaption class="chart-text">
                                        <div class="chart-text__num chart-num">150</div>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="statistics-poeple__item">
                                <div class="statistics-poeple__played-text">Сыграно матчей</div>
                                <div class="statistics-poeple__played-num">150</div>
                                <div class="statistics-poeple__played">Выиграно матчей: <span>75</span></div>
                                <div class="statistics-poeple__played">Проиграно матчей: 75</div>
                            </div>
                        </div>
                    </div>

                    <div class="statistics-content">
                        <div class="statistics-content__items">

                            <div class="statistics-private">
                                <div class="statistics-private__title title">ЛИЧНАЯ СТАТИСТИКА</div>
                                <div class="statistics-private__inner">
                                    <div class="statistics-private__user">
                                        <a class="header-usermenu__icon" href="#">
                                            <div class="header-usermenu__icongradient icon">
                                                <img class="header-usermenu__iconimg" src="images/user/1.png" alt="">
                                            </div>
                                        </a>
                                        <a class="header-usermenu__name profile-name" style="margin-left: -12px;" href="#">Kushiro Nara
                                        </a>
                                    </div>
                                    <div class="statistics-private__items">
                                        <div class="statistics-private__item">
                                            <img class="statistics-private__item-img" src="images/icons/pw-ball.png" alt="">
                                            <div class="statistics-private__item-box">
                                                <div class="statistics-private__box-text">PW баллы</div>
                                                <div class="statistics-private__box-num">31</div>
                                            </div>
                                        </div>
                                        <div class="statistics-private__item">
                                            <img class="statistics-private__item-img" src="images/icons/played.png" alt="">
                                            <div class="statistics-private__item-box">
                                                <div class="statistics-private__box-text">Игр сыграно</div>
                                                <div class="statistics-private__box-num">300</div>
                                            </div>
                                        </div>
                                        <div class="statistics-private__item">
                                            <img class="statistics-private__item-img" src="images/icons/money-stat.png" alt="">
                                            <div class="statistics-private__item-box">
                                                <div class="statistics-private__box-text">Оборот игрока</div>
                                                <div class="statistics-private__box-num">999 999</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="statistics-plays">
                                <div class="statistics-plays__title title">Игровая статистика</div>
                                <div class="statistics-plays__box-tabs">
                                    <button class="statistics-plays__tabs-btn statistics-plays__tabs-btn_active">По матчам</button>
                                    <button class="statistics-plays__tabs-btn">Сумма взносов</button>
                                </div>
                                <div class="statistics-plays__inner">

                                    <div class="statistics-bar">
                                        <div class="statistics-bar__box">
                                            <div class="statistics-bar__vertical">
                                                <div class="statistics-bar__vertical-num">8</div>
                                                <div class="statistics-bar__vertical-num">7</div>
                                                <div class="statistics-bar__vertical-num">6</div>
                                                <div class="statistics-bar__vertical-num">5</div>
                                                <div class="statistics-bar__vertical-num">4</div>
                                                <div class="statistics-bar__vertical-num">3</div>
                                                <div class="statistics-bar__vertical-num">2</div>
                                                <div class="statistics-bar__vertical-num">1</div>
                                            </div>
                                            <div class="statistics-bar__horizontal">
                                                <div class="statistics-bar__horizontal-num">1
                                                    <div class="statistics-bar__horizontal-item" style="height: 133px;"></div>
                                                </div>
                                                <div class="statistics-bar__horizontal-num">2
                                                    <div class="statistics-bar__horizontal-item" style="height: 100px;"></div>
                                                </div>
                                                <div class="statistics-bar__horizontal-num">3
                                                    <div class="statistics-bar__horizontal-item" style="height: 155px;"></div>
                                                </div>
                                                <div class="statistics-bar__horizontal-num">4
                                                    <div class="statistics-bar__horizontal-item" style="height: 135px;"></div>
                                                </div>
                                                <div class="statistics-bar__horizontal-num">5
                                                    <div class="statistics-bar__horizontal-item" style="height: 135px;"></div>
                                                </div>
                                                <div class="statistics-bar__horizontal-num">6
                                                    <div class="statistics-bar__horizontal-item" style="height: 54px;"></div>
                                                </div>
                                                <div class="statistics-bar__horizontal-num">7
                                                    <div class="statistics-bar__horizontal-item" style="height: 133px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="statistics-bar__descr">Количество ставок</div>
                                    </div>

                                    <div class="statistics-graph">
                                        <div class="statistics-graph__box">
                                            <div class="statistics-graph__vertical">
                                                <div class="statistics-graph__vertical-num">1000</div>
                                                <div class="statistics-graph__vertical-num">800</div>
                                                <div class="statistics-graph__vertical-num">600</div>
                                                <div class="statistics-graph__vertical-num">400</div>
                                                <div class="statistics-graph__vertical-num">200</div>
                                                <div class="statistics-graph__vertical-num">0</div>
                                            </div>
                                            <div class="statistics-graph__horizontal">
                                                <div class="statistics-graph__horizontal-num">1
                                                    <div class="statistics-graph__horizontal-item" style="bottom: 98px;"></div>
                                                </div>
                                                <div class="statistics-graph__horizontal-num">2
                                                    <div class="statistics-graph__horizontal-item" style="bottom: 78px;"></div>
                                                </div>
                                                <div class="statistics-graph__horizontal-num">3
                                                    <div class="statistics-graph__horizontal-item" style="bottom: 98px;"></div>
                                                </div>
                                                <div class="statistics-graph__horizontal-num">4
                                                    <div class="statistics-graph__horizontal-item" style="bottom: 90px;"></div>
                                                </div>
                                                <div class="statistics-graph__horizontal-num">5
                                                    <div class="statistics-graph__horizontal-item" style="bottom: 98px;"></div>
                                                </div>
                                                <div class="statistics-graph__horizontal-num">6
                                                    <div class="statistics-graph__horizontal-item" style="bottom: 90px;"></div>
                                                </div>
                                                <div class="statistics-graph__horizontal-num">7
                                                    <div class="statistics-graph__horizontal-item" style="bottom: 78px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="statistics-graph__descr">Сумма ставок</div>
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

    export default {
        components: {
            HeaderNav, MobileNav, ProfileSideNav
        }
    }
</script>