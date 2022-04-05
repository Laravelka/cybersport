<template>
    <div class="main">

        <!-- header -->

        <div class="header">
            <a class="header__icon" href="#">
                <div class="header__icongradient icon">
                    <img class="header__iconimg" src="images/admin/user/1.png" alt="">
                    <span>10</span>
                </div>
            </a>
            <div class="header__info">
                <a class="header__name user-name" href="#">Kushiro Nara
                    <span class="header__settings-icon">
            <img class="header__settings" src="images/admin/icons/settings.svg" alt="">
          </span>
                </a>
                <div class="header__num purse">999,99 $
                    <span>
            <img class="header__numimg" src="images/admin/icons/purse.svg" alt="">
          </span>
                </div>
            </div>
        </div>

        <div class="wrapper">

            <!-- panel -->

            <div class="panel">
                <a class="logo" href="#">
                    <img class="logo__img" src="images/admin/logo.svg" alt="">
                </a>
                <div class="panel__title title">АДМИН ПАНЕЛЬ</div>
                <div class="panel__list">
                    <a class="panel__list-item" href="#">
                        <img class="panel__list-img" src="images/admin/icons/panel-icon-1.png" alt="">
                        <div class="panel__list-link">Статистика</div>
                    </a>
                    <a class="panel__list-item" href="#">
                        <img class="panel__list-img" src="images/admin/icons/panel-icon-2.png" alt="">
                        <div class="panel__list-link">Предметы и кастом</div>
                    </a>
                    <a class="panel__list-item" href="#">
                        <img class="panel__list-img" src="images/admin/icons/panel-icon-3.png" alt="">
                        <div class="panel__list-link">Матчи</div>
                    </a>
                    <a class="panel__list-item" href="#">
                        <img class="panel__list-img" src="images/admin/icons/panel-icon-4.png" alt="">
                        <div class="panel__list-link">Игрок</div>
                    </a>
                    <a class="panel__list-item" href="#">
                        <img class="panel__list-img" src="images/admin/icons/panel-icon-5.png" alt="">
                        <div class="panel__list-link">Выплаты</div>
                    </a>
                    <a class="panel__list-item" href="#">
                        <img class="panel__list-img" src="images/admin/icons/panel-icon-6.png" alt="">
                        <div class="panel__list-link">Запросы</div>
                    </a>
                    <a class="panel__list-item" href="#">
                        <img class="panel__list-img" src="images/admin/icons/panel-icon-7.png" alt="">
                        <div class="panel__list-link">Бонусы</div>
                    </a>
                    <a class="panel__list-item" href="#">
                        <img class="panel__list-img" src="images/admin/icons/panel-icon-8.png" alt="">
                        <div class="panel__list-link">Турнирные заявки</div>
                    </a>
                    <a class="panel__list-item panel__list-item_active" href="#">
                        <img class="panel__list-img" src="images/admin/icons/panel-icon-9.svg" alt="">
                        <div class="panel__list-link">Чат</div>
                    </a>
                </div>
                <button class="panel__user-btn">
                    <img src="images/admin/icons/exit-icon.png" alt="">
                    Режим пользтователя
                </button>
            </div>

            <!-- adStatistics -->

            <section class="adStatistics admin-container">
                <div class="adStatistics__title section-title">СТАТИСТИКА</div>
                <div class="adStatistics__inner">
                    <div class="adStatistics-top">
                        <div class="adStatistics-top__tabs">
                            <button class="adStatistics-top__tabs-btn adStatistics-top__tabs-btn_active">CS:GO</button>
                            <button class="adStatistics-top__tabs-btn">Dota 2</button>
                            <button class="adStatistics-top__tabs-btn">Все игры</button>
                            <button class="adStatistics-top__tabs-btn">Predict Wars Elite</button>
                            <button class="adStatistics-top__tabs-btn">Predict Wars</button>
                        </div>
                        <div class="adStatistics-top__charts">

                            <div class="adStatistics-bar">
                                <div class="adStatistics-bar__tabs">
                                    <button class="adStatistics-bar__tabs-btn adStatistics-bar__tabs-btn_active">День</button>
                                    <button class="adStatistics-bar__tabs-btn">Неделя</button>
                                    <button class="adStatistics-bar__tabs-btn">Месяц</button>
                                    <button class="adStatistics-bar__tabs-btn">Год</button>
                                    <button class="adStatistics-bar__tabs-btn">За все время</button>
                                </div>
                                <div class="adStatistics-bar__inner-chart">
                                    <div class="adStatistics-bar__vertical-items">
                                        <div class="adStatistics-bar__vertical-item">6000</div>
                                        <div class="adStatistics-bar__vertical-item">5000</div>
                                        <div class="adStatistics-bar__vertical-item">4000</div>
                                        <div class="adStatistics-bar__vertical-item">3000</div>
                                        <div class="adStatistics-bar__vertical-item">2000</div>
                                        <div class="adStatistics-bar__vertical-item">1000</div>
                                    </div>
                                    <div class="adStatistics-bar__gorizontal-items">
                                        <div class="adStatistics-bar__gorizontal-item">1</div>
                                        <div class="adStatistics-bar__gorizontal-item">2</div>
                                        <div class="adStatistics-bar__gorizontal-item">3</div>
                                        <div class="adStatistics-bar__gorizontal-item">4</div>
                                        <div class="adStatistics-bar__gorizontal-item">5</div>
                                        <div class="adStatistics-bar__gorizontal-item">6</div>
                                        <div class="adStatistics-bar__gorizontal-item">7</div>
                                    </div>
                                    <div class="adStatistics-bar__column-items">
                                        <div class="adStatistics-bar__column-item" style="height: 183px;"></div>
                                        <div class="adStatistics-bar__column-item" style="height: 183px;"></div>
                                        <div class="adStatistics-bar__column-item" style="height: 183px;"></div>
                                        <div class="adStatistics-bar__column-item" style="height: 183px;"></div>
                                        <div class="adStatistics-bar__column-item" style="height: 60px;"></div>
                                        <div class="adStatistics-bar__column-item" style="height: 183px;"></div>
                                        <div class="adStatistics-bar__column-item" style="height: 60px;"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="adStatistics-line">
                                <div class="adStatistics-bar__tabs">
                                    <button class="adStatistics-bar__tabs-btn adStatistics-bar__tabs-btn_active">День</button>
                                    <button class="adStatistics-bar__tabs-btn">Неделя</button>
                                    <button class="adStatistics-bar__tabs-btn">Месяц</button>
                                    <button class="adStatistics-bar__tabs-btn">Год</button>
                                    <button class="adStatistics-bar__tabs-btn">За все время</button>
                                </div>
                                <div class="adStatistics-line__inner-chart">
                                    <div class="adStatistics-bar__vertical-items">
                                        <div class="adStatistics-bar__vertical-item">6000</div>
                                        <div class="adStatistics-bar__vertical-item">5000</div>
                                        <div class="adStatistics-bar__vertical-item">4000</div>
                                        <div class="adStatistics-bar__vertical-item">3000</div>
                                        <div class="adStatistics-bar__vertical-item">2000</div>
                                        <div class="adStatistics-bar__vertical-item">1000</div>
                                    </div>
                                    <div class="adStatistics-bar__gorizontal-items">
                                        <div class="adStatistics-bar__gorizontal-item">1</div>
                                        <div class="adStatistics-bar__gorizontal-item">2</div>
                                        <div class="adStatistics-bar__gorizontal-item">3</div>
                                        <div class="adStatistics-bar__gorizontal-item">4</div>
                                        <div class="adStatistics-bar__gorizontal-item">5</div>
                                        <div class="adStatistics-bar__gorizontal-item">6</div>
                                        <div class="adStatistics-bar__gorizontal-item">7</div>
                                    </div>
                                    <div class="adStatistics-line__items">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <button class="adStatistics-top__btn">Изменить объём</button>
                    </div>

                    <div class="adStatistics-bottom">
                        <div class="adStatistics-bottom__percent-inner">
                            <div class="adStatistics-bottom__percent-items">
                                <div class="adStatistics-bottom__percent-item">
                                    <div class="adStatistics-bottom__percent-title">Средний винрейт</div>
                                    <div class="adStatistics-bottom__percent-num">58%</div>
                                    <div class="adStatistics-bottom__percent-num">58%</div>
                                    <div class="adStatistics-bottom__percent-num">58%
                                        <span>
                <img src="images/admin/icons/percent-icon.png" alt="">
            </span>
                                    </div>
                                </div>
                                <div class="adStatistics-bottom__percent-item">
                                    <div class="adStatistics-bottom__percent-title">Среднее
                                        пополнение</div>
                                    <div class="adStatistics-bottom__percent-num">58%</div>
                                    <div class="adStatistics-bottom__percent-num">58%</div>
                                    <div class="adStatistics-bottom__percent-num">58%
                                        <span>
                <img src="images/admin/icons/percent-icon.png" alt="">
            </span>
                                    </div>
                                </div>
                                <div class="adStatistics-bottom__percent-item">
                                    <div class="adStatistics-bottom__percent-title">Среднее кол-во
                                        ставок</div>
                                    <div class="adStatistics-bottom__percent-num">58%</div>
                                    <div class="adStatistics-bottom__percent-num">58%</div>
                                    <div class="adStatistics-bottom__percent-num">58%
                                        <span>
                <img src="images/admin/icons/percent-icon.png" alt="">
            </span>
                                    </div>
                                </div>
                                <div class="adStatistics-bottom__percent-item">
                                    <div class="adStatistics-bottom__percent-title">Сумма ставок</div>
                                    <div class="adStatistics-bottom__percent-num">58%</div>
                                    <div class="adStatistics-bottom__percent-num">58%</div>
                                    <div class="adStatistics-bottom__percent-num">58%
                                        <span>
                <img src="images/admin/icons/percent2-icon.png" alt="">
            </span>
                                    </div>
                                </div>
                                <div class="adStatistics-bottom__percent-item">
                                    <div class="adStatistics-bottom__percent-title">Средний винстрик</div>
                                    <div class="adStatistics-bottom__percent-num">58%</div>
                                    <div class="adStatistics-bottom__percent-num">58%</div>
                                    <div class="adStatistics-bottom__percent-num">58%
                                        <span>
                <img src="images/admin/icons/percent2-icon.png" alt="">
            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="adStatistics-bottom__percent-buttons">
                                <div class="adStatistics-bottom__percentBtn-box">
                                    <button class="adStatistics-bottom__arrow-left">
                                        <img src="images/admin/icons/arrow-left.svg" alt="">
                                    </button>
                                    <button class="adStatistics-bottom__percent-btn">День</button>
                                    <button class="adStatistics-bottom__arrow-right">
                                        <img src="images/admin/icons/arrow-right.svg" alt="">
                                    </button>
                                </div>
                                <div class="adStatistics-bottom__percentBtn-box">
                                    <button class="adStatistics-bottom__arrow-left">
                                        <img src="images/admin/icons/arrow-left.svg" alt="">
                                    </button>
                                    <button class="adStatistics-bottom__percent-btn">Predict Wars</button>
                                    <button class="adStatistics-bottom__arrow-right">
                                        <img src="images/admin/icons/arrow-right.svg" alt="">
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="adStatistics-lineChart">
                            <div class="adStatistics-lineChart__box-btn">
                                <button class="adStatistics-lineChart__btn adStatistics-lineChart__btn_active">День</button>
                                <button class="adStatistics-lineChart__btn">Оборот</button>
                                <button class="adStatistics-lineChart__btn">Кол-во ставок</button>
                            </div>
                            <div class="adStatistics-line">
                                <div class="adStatistics-bar__tabs">
                                    <button class="adStatistics-bar__tabs-btn adStatistics-bar__tabs-btn_active">День</button>
                                    <button class="adStatistics-bar__tabs-btn">Неделя</button>
                                    <button class="adStatistics-bar__tabs-btn">Месяц</button>
                                    <button class="adStatistics-bar__tabs-btn">Год</button>
                                    <button class="adStatistics-bar__tabs-btn">За все время</button>
                                </div>
                                <div class="adStatistics-line__inner-chart">
                                    <div class="adStatistics-bar__vertical-items">
                                        <div class="adStatistics-bar__vertical-item">6000</div>
                                        <div class="adStatistics-bar__vertical-item">5000</div>
                                        <div class="adStatistics-bar__vertical-item">4000</div>
                                        <div class="adStatistics-bar__vertical-item">3000</div>
                                        <div class="adStatistics-bar__vertical-item">2000</div>
                                        <div class="adStatistics-bar__vertical-item">1000</div>
                                    </div>
                                    <div class="adStatistics-bar__gorizontal-items">
                                        <div class="adStatistics-bar__gorizontal-item">1</div>
                                        <div class="adStatistics-bar__gorizontal-item">2</div>
                                        <div class="adStatistics-bar__gorizontal-item">3</div>
                                        <div class="adStatistics-bar__gorizontal-item">4</div>
                                        <div class="adStatistics-bar__gorizontal-item">5</div>
                                        <div class="adStatistics-bar__gorizontal-item">6</div>
                                        <div class="adStatistics-bar__gorizontal-item">7</div>
                                    </div>
                                    <div class="adStatistics-line__items">

                                    </div>
                                </div>
                            </div>
                            <div class="adStatistics-lineChart__color-box">
                                <div class="adStatistics-lineChart__color-item">PW<span style="background-color: #FFF200;"></span></div>
                                <div class="adStatistics-lineChart__color-item">DOTA<span style="background-color: #CE0D12;"></span></div>
                                <div class="adStatistics-lineChart__color-item">CS:GO<span style="background-color: #933DEE;"></span></div>
                                <div class="adStatistics-lineChart__color-item">ELITE<span style="background-color: #56BAE4;"></span></div>
                            </div>
                            <div class="adStatistics-lineChart__profit">
                                <div class="adStatistics-lineChart__profit-title">Profit:</div>
                                <div class="adStatistics-lineChart__profit-num">8000$</div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </div>

    </div>
</template>

<script>

    export default {

    }
</script>