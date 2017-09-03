<script>
    let _ = require('lodash');
    let Card = require('./Card.vue');

    module.exports = {
        data: function () {
            return {
                marks: {},
                cardList: cardListInit
            }
        },
        components: {
            Card: Card
        },
    }
</script>

<template>
    <div>
        <div id="top-carousel" class="carousel slide">
            <!-- Слайды карусели -->
            <div class="carousel-inner" style="">
                <div class="active item"></div>
                <div class="item"></div>
                <div class="item"></div>
            </div>

            <!-- Индикаторы для карусели -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1">
                        <div class="title">Широкий выбор<br>автомобилей с пробегом</div>
                        <div class="undertitle">Все автомобили прошли полную диагностику, юридическую<br> проверку и предпродажную подготовку.</div>
                        <ol class="carousel-indicators">
                            <li data-target="#top-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#top-carousel" data-slide-to="1"></li>
                            <li data-target="#top-carousel" data-slide-to="2"></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-auto container">
            <div class="row">
                <div class="title col-lg-offset-1 col-md-offset-1 col-lg-11 col-md-11 col-sm-12 col-xs-12">
                    Выберите марку автомобиля
                </div>
                <div>
                    <!-- Навигация -->
                    <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active">
                                <a href="#cars" aria-controls="home" role="tab" data-toggle="tab">
                                    Легковые автомобили
                                </a>
                            </li>
                            <li>
                                <a href="#commercial" aria-controls="profile" role="tab" data-toggle="tab">
                                    Коммерческий транспорт
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Содержимое вкладок -->
                    <div class="tab-content col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div role="tabpanel" class="tab-pane active row" id="cars">
                            <div class="col-lg-2 col-md-2">
                                <ul class="auto-list-list">

                                    <li>
                                        <a href="/catalog">ВАЗ</a>
                                        <span>1</span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane row" id="commercial">
                            <div class="col-lg-2 col-md-2 <?= array_shift($classes)?>">
                                <ul class="auto-list-list">

                                    <li>
                                        <a href="/catalog">ВАЗ</a>
                                        <span>1</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden-lg hidden-md col-sm-12 col-xs-12">
                    <button class="transparent-button all-auto-button">
                        Все марки <span class="custom-caret"></span>
                    </button>
                </div>
            </div>
        </div>
        <div class="services">
            <div class="container">
                <div class="row services-head">
                    <div class="col-lg-offset-1 col-lg-5 col-md-offset-1 col-md-5 col-sm-6 services-head-left">
                        Мы предоставляем<br> различные услуги<br> при покупке и обслуживании<br> автомобиля
                    </div>
                    <div class="services-head-right col-lg-5 col-md-5 col-sm-6">
                        <p class="services-head-right-text">
                            Все автомобили прошли полную диагностику, юридическую<br>проверку и предпродажную подготовку.
                        </p>
                        <button class="orange-button hidden-xs" type="button" data-toggle="modal" data-target="#bid">
                            ЗАКАЗАТЬ УСЛУГУ
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10 col-sm-12">
                        <div class="services-box row col-lg-6 col-md-6 col-sm-6">
                            <div class="services-box-img">
                                <img src="/img/services-icons/ic-small-6.png" alt="">
                            </div>
                            <div class="services-box-text">
                                <div class="services-box-text-title">
                                    12000 грн в подарок
                                </div>
                                <div class="services-box-text-desc">
                                    Дарим 12000 грн. при покупке автомобиля в trade-in.
                                </div>
                            </div>
                        </div>
                        <div class="services-box row col-lg-6 col-md-6 col-sm-6">
                            <div class="services-box-img">
                                <img src="/img/services-icons/ic-small-5.png" alt="">
                            </div>
                            <div class="services-box-text">
                                <div class="services-box-text-title">
                                    Кредитование
                                </div>
                                <div class="services-box-text-desc">
                                    23% наших автомобилей продается в кредит. Менеджеры помогут вам подобрать лучшие условия.
                                </div>
                            </div>
                        </div>
                        <div class="services-box row col-lg-6 col-md-6 col-sm-6">
                            <div class="services-box-img">
                                <img src="/img/services-icons/ic-small-4.png" alt="">
                            </div>
                            <div class="services-box-text">
                                <div class="services-box-text-title">
                                    Страхование
                                </div>
                                <div class="services-box-text-desc">
                                    В нашей компании вы можете выгодно застраховать свой автомобиль.
                                </div>
                            </div>
                        </div>
                        <div class="services-box row col-lg-6 col-md-6 col-sm-6">
                            <div class="services-box-img">
                                <img src="/img/services-icons/ic-small-3.png" alt="">
                            </div>
                            <div class="services-box-text">
                                <div class="services-box-text-title">
                                    Доставка
                                </div>
                                <div class="services-box-text-desc">
                                    Закажите любой автомобиль или мотоцикл и мы доставим его в Ваш город.
                                </div>
                            </div>
                        </div>
                        <div class="services-box row col-lg-6 col-md-6 col-sm-6">
                            <div class="services-box-img">
                                <img src="/img/services-icons/ic-small-1.png" alt="">
                            </div>
                            <div class="services-box-text">
                                <div class="services-box-text-title">
                                    Переоформление
                                </div>
                                <div class="services-box-text-desc">
                                    Постановка на учет. Заключение договора купли-продажи. Перевес и сохранение номерных знаков. Проверка денежных средств через кассу.
                                </div>
                            </div>
                        </div>
                        <div class="services-box row col-lg-6 col-md-6 col-sm-6">
                            <div class="services-box-img">
                                <img src="/img/services-icons/ic-small-2.png" alt="">
                            </div>
                            <div class="services-box-text">
                                <div class="services-box-text-title">
                                    Экспертиза
                                </div>
                                <div class="services-box-text-desc">
                                    Ежедневно в наш салон приезжают технически и юридически проблемные автомобили. За 8 лет работы, мы научились видеть их насквозь.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="orange-button hidden-md hidden-lg hidden-sm services-box-bottom-button" type="button" data-toggle="modal" data-target="#bid">
                    ЗАКАЗАТЬ УСЛУГУ
                </button>
            </div>
        </div>
        <div class="container ">
            <div class="row info-boxes">
                <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-6 top-text-left">
                    Вы можете быть уверены в том, что <br class="hidden-sm hidden-xs">у нас вы приобретете надежный <br class="hidden-sm hidden-xs">автомобиль на лучших условиях
                </div>
                <div class="col-lg-5 col-md-5 col-sm-6 top-text-right">
                    Все автомобили прошли полную диагностику, <br class="hidden-sm hidden-xs">юридическую проверку и предпродажную подготовку.
                </div>
                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-sm-12 col-md-offset-1">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="info-box">
                                <div class="bg-img">
                                    <img src="/img/info-boxes/ic-big-vukup.png" alt="">
                                </div>
                                <div class="info-boxes-title">
                                    Cрочный выкуп автомобиля
                                </div>
                                <div class="info-boxes-text">
                                    Благодаря тому, что наш салон расположен в Киеве, мы оценим ваш автомобиль дороже, исходя из хорошего спроса на поддержаные автомобили в столице.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="info-box">
                                <div class="bg-img">
                                    <img src="/img/info-boxes/ic-big-traid-in.png" alt="">
                                </div>
                                <div class="info-boxes-title">
                                    Обмен/Trade-In
                                </div>
                                <div class="info-boxes-text">
                                    Мы гарантированно оценим ваш автомобиль дороже, если вы подберете у нас что-то взамен. Только в нашей компании вы можете обменять между собой мотоцикл, легковой и коммерческий автомобиль.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="info-box">
                                <div class="bg-img">
                                    <img src="/img/info-boxes/ic-big-komis.png" alt="">
                                </div>
                                <div class="info-boxes-title">
                                    Комиссионная продажа
                                </div>
                                <div class="info-boxes-text">
                                    В год мы продаем более 500. Почти половину из них, нам доверили владельцы, как профессионалам вторичного рынка. С нашей помощью вы продадите свой автомобиль быстро и комфортно.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grey-light-block offers-grid-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-lg-offset-1 col-md-5 col-sm-6 col-md-offset-1 col-xs-6 offers-grid-block-left-text">
                        Здесь представлены лучшие <br class="hidden-sm hidden-xs">предложения для вас по <br class="hidden-sm hidden-xs">выгодным ценам
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6 offers-grid-block-right-text">
                        Все автомобили прошли полную диагностику, <br class="hidden-sm hidden-xs">юридическую проверку и предпродажную подготовку.
                    </div>
                    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-sm-12 col-xs-12 col-md-offset-1">
                        <div class="row">
                            <card
                                    v-for="item in cardList.slice(0, 6)"
                                    :card="item"
                                    :key="item.id">
                            </card>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="info-box-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1">
                        <div class="info-box-bg-text">
                            Для продукции немецкой или японской автомобильной <br class='hidden-md hidden-sm hidden-xs'>промышленности пробег в 100 тысяч км не считается <br class='hidden-md hidden-sm hidden-xs'>критическим, при котором б.у. машина требует <br class='hidden-md hidden-sm hidden-xs'>капитального ремонта.
                        </div>
                        <button class="info-box-bg-button orange-button" type="button"
                                data-toggle="modal" data-target="#bid">
                            ЗАКАЗАТЬ УСЛУГУ
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>