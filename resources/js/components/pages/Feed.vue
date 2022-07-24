<template>
    <div class="main">

        <header-nav/>

        <section class="feed">
            <div class="feed__inner">
                <div class="feed-item">
                    <div class="feed-top">
                        <div class="feed-top__box">
                            <a class="feed-top__icon" href="#">
                                <div class="feed-top__icongradient icon">
                                    <span>10</span>
                                    <img class="feed-top__iconimg" src="images/user/1.png" alt="">
                                </div>
                            </a>
                            <div class="feed-top__box-name">
                                <div class="feed-top__user-name">Kushiro Nara<span>,  120 игр</span></div>
                                <div class="feed-top__user-info">Открытый Бета-Сервер будет доступен уже сегодня!</div>
                            </div>
                            <div class="feed-top__settings-box">
                                <button class="feed-top__settings-btn">
                                    <svg width="24" height="6" viewBox="0 0 24 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="3" cy="3" r="3" fill="#6E6E86" />
                                        <circle cx="12" cy="3" r="3" fill="#6E6E86" />
                                        <circle cx="21" cy="3" r="3" fill="#6E6E86" />
                                    </svg>
                                </button>
                                <div class="feed-top__report-box">
                                    <button class="feed-top__report-btn">Пожаловаться</button>
                                    <button class="feed-top__report-btn">Скрыть</button>
                                </div>
                            </div>
                        </div>
                        <img class="feed-top__img" src="images/decor/feed-img.png" alt="">
                        <div class="feed-top__box">
                            <button class="feed-top__like">300</button>
                            <button class="feed-top__comment">1</button>
                            <button class="feed-top__emoji">
                                <img src="images/icons/feed-emoji.svg" alt="">
                            </button>
                            <ul class="feed-top__list">
                                <li class="feed-top__list-item">
                                    <button class="feed-top__list-link">
                                        <img src="images/icons/feed-1.png" alt="">
                                    </button>
                                </li>
                                <li class="feed-top__list-item">
                                    <button class="feed-top__list-link">
                                        <img src="images/icons/feed-2.png" alt="">
                                    </button>
                                </li>
                                <li class="feed-top__list-item">
                                    <button class="feed-top__list-link">
                                        <img src="images/icons/feed-3.png" alt="">
                                    </button>
                                </li>
                                <li class="feed-top__list-item">
                                    <button class="feed-top__list-link">
                                        <img src="images/icons/feed-4.png" alt="">
                                    </button>
                                </li>
                            </ul>
                            <button class="feed-top__reaction">13 Реакций</button>
                            <div class="feed-top__time-published">5 минут назад</div>
                        </div>
                    </div>

                    <div class="feed-bottom">
                        <div class="feed-bottom__title">Последние комментарии</div>
                        <div class="feed-bottom__box">
                            <a class="feed-bottom__icon" href="#">
                                <div class="feed-bottom__icongradient icon">
                                    <img class="feed-bottom__iconimg" src="images/user/1.png" alt="">
                                </div>
                            </a>
                            <div class="feed-bottom__box-name">
                                <div class="feed-bottom__user-name">Kushiro Nara, 13 игр</div>
                                <div class="feed-bottom__user-time">49 минут назад</div>
                            </div>
                        </div>
                        <div class="feed-bottom__comment">Коментарий пользователя. Коментарий пользователя. Коментарий пользователя.
                            Коментарий пользователя. Коментарий
                            пользователя.</div>
                        <img class="feed-bottom__img" src="images/decor/feed-img.png" alt="">
                        <button class="feed-bottom__comment-btn">Показать остальные комментарии</button>
                        <form class="feed-bottom__form" action="#">
                            <div class="feed-bottom__form-box">
                                <input class="feed-bottom__form-input" placeholder="Быстрый комментарий" type="text">
                                <label class="feed-bottom__label">
                                    <input class="feed-bottom__label-input" type="file">
                                    <img class="feed-bottom__label-file" src="images/icons/image-icon.svg" alt="">
                                </label>
                                <button class="feed-bottom__form-emoji">
                                    <img src="images/icons/profile-emoji.svg" alt="">
                                </button>
                                <button class="feed-bottom__form-btn">
                                    <img src="images/icons/profile-search.svg" alt="">
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>

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
        },
        setup() {
            
        }
    }
</script>
