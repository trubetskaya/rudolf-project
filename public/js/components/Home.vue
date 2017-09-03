<script>
    let _ = require('lodash');
    let Card = require('./Card.vue');

    module.exports = {
        data: function () {
            return {
                categories: categories,
                cardList: cardListInit
            }
        },
        components: {
            Card: Card
        }
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

<style lang="scss">
    $gray:#555963;
    $gray-light:#e3e3e3;
    $white:#ffffff;
    $orange:#f76a3a;

    $screen-sm:768px;
    $screen-md:992px;

    .list-auto {
        padding-top: 76px;
        padding-bottom: 89px;
        .title {
            font-size: 24px;
            font-weight: 600;
            line-height: 2.08;
            letter-spacing: -0.3px;
            text-align: left;
            color: #2d2a2a;
            @media screen and (max-width:$screen-sm) {
                font-size: 22px;
                white-space: nowrap;
            }
        }
        ul.nav-tabs {
            border-bottom: none;
            padding-top: 19px;
            li {
                border-bottom: 1px $gray-light solid;
                padding-right: 45px;
                @media screen and (max-width:$screen-sm) {
                    padding-right: 25px;
                }
                &:last-child {
                    padding-right: 0;
                }
                &.active {
                    border-bottom: 2px $orange solid;
                    a {
                        position: relative;
                        top: 1px;
                        background: transparent;
                        color: $gray;
                        border-left: 0;
                        border-top: 0;
                        border-right: 0;
                        border-bottom: 1px $orange solid;
                    }
                }
                &:hover:not(.active), &:focus:not(.active), &:active:not(.active) {
                    border-bottom: 1px $gray-light solid;
                    a {
                        position: relative;
                        top: 1px;
                        background: transparent;
                        color: $gray;
                        border-left: 0;
                        border-top: 0;
                        border-right: 0;
                        border-bottom: 2px $orange solid;
                    }
                }
                a {
                    margin: 0;
                    padding: 0;
                    border-left: 0;
                    border-right: 0;
                    line-height: 29px;
                    font-size: 12px;
                    text-transform: uppercase;
                    color: $gray-light;
                }
            }
        }
        .tab-content {
            padding-top: 30px;
            ul.auto-list-list {
                list-style: none;
                padding-left: 0;
                li {
                    font-size: 18px;
                    line-height: 45px;
                    a {
                        color: $gray;
                        font-family: ".SNFS-Medium", Fallback, sans-serif;
                    }
                    span {
                        color: #cdcdcd;
                        padding-left: 5px;
                    }
                }
            }
        }
        .all-auto-button {
            max-width: 291px;
            margin-top: 14px;
            .custom-caret {
                background: url("/img/auto-list/ic-down-bold-default.png") no-repeat;
                width: 12px;
                height: 8px;
                display: inline-block;
                margin: 0 0 0 5px;
            }
        }
    }

    #top-carousel {
        @media screen and (max-width:$screen-sm) {
            height: 512px;
        }
        height: 650px;
        width: 100%;
        background-color: $gray;
        .carousel-inner {
            position: absolute;
            height: 650px;
            @media screen and (max-width:$screen-sm) {
                height: 512px;
            }
            div {
                height: 650px;
                @media screen and (max-width:$screen-sm) {
                    height: 512px;
                }
            }
            div:first-child {
                background-image: url("/img/carousel/photo-homepage.png");
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
            }
            div:nth-child(2) {
                background-image: url("/img/carousel/photo-homepage.png");
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
            }
            div:nth-child(3) {
                background-image: url("/img/carousel/photo-homepage.png");
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;

            }
        }
        .container {
            .row {
                position: relative;
                height: 650px;
                @media screen and (max-width:$screen-sm) {
                    height: 512px;
                }
                .carousel-indicators {
                    width: 9px;
                    right: 60px;
                    left: auto;
                    top: 267px;
                    @media screen and (max-width:$screen-sm) {
                        -webkit-transform: rotate(-90deg); /* Safari and Chrome */
                        -moz-transform: rotate(-90deg);   /* Firefox */
                        -ms-transform: rotate(-90deg);   /* IE 9 */
                        -o-transform: rotate(-90deg);   /* Opera */
                        transform: rotate(-90deg);
                        display: block;
                        margin: 220px auto 0;
                        bottom: 20px;
                        left: 0;
                    }
                    li {
                        width: 9px;
                        height: 9px;
                        -moz-border-radius: 4.5px;
                        -webkit-border-radius: 4.5px;
                        border-radius: 4.5px;
                        border: none;
                        background-color: $gray-light;
                        &.active {
                            padding: 0;
                            margin: 1px;
                            background-color: $orange;
                        }
                    }
                }
                .title {
                    font-size: 52px;
                    line-height: 55px;
                    float: left;
                    margin: 239px 0 0 /*150px*/0;
                    color: $white;
                    @media screen and (max-width:$screen-sm) {
                        font-size: 36px;
                        font-weight: 500;
                        line-height: 1.17;
                        text-align: left;
                        color: #ffffff;
                        margin: 167px 0 37px 0;
                    }
                }
                .undertitle {
                    font-size: 16px;
                    line-height: 20px;
                    float: left;
                    margin: 36px 0 0 /*157px*/ 0;
                    padding: 0 0 0 20px;
                    color: $white;
                    border-left: 2px solid $orange;
                    @media screen and (max-width:$screen-sm) {
                        font-size: 16px;
                        font-weight: 500;
                        line-height: 1.25;
                        text-align: left;
                        color: #ffffff;
                    }
                }
            }
        }
    }

    .offers {
        background-color: $gray-light;
        .row {
            overflow: hidden;
            white-space: nowrap;
            padding: 61px 0 98px;
            .title {
                width: 278px;
                height: 50px;
                font-size: 24px;
                font-weight: 600;
                line-height: 2.08;
                letter-spacing: -0.3px;
                text-align: left;
                color: #2d2a2a;
            }
            .slider {
                margin-right: -15px;
                .item {
                    display: inline-block;
                    float: left;
                    width: 306.4px;
                }
                img {
                    width: 306.4px;
                    height: 210px;
                }
                p.name {
                    line-height: 32px;
                    font-size: 18px;
                    font-weight: 600;
                    letter-spacing: -0.2px;
                    text-align: left;
                    color: #161616;
                    margin: 19px 0 7px;
                }
                p.desc {
                    font-size: 14px;
                    line-height: 1.07;
                    text-align: left;
                    color: #a8a8a8;
                }
            }
        }
    }

    .info-boxes {
        padding: 72px 0 108px;
        @media screen and (max-width:$screen-md) {
            padding-bottom: 33px;
        }
        .top-text-left {
            font-size: 24px;
            font-weight: 600;
            line-height: 1.38;
            text-align: left;
            color: #2d2a2a;
            margin-bottom: 70px;
            @media screen and (max-width:$screen-md) {
                margin-bottom: 20px;
            }
        }
        .top-text-right {
            padding-top: 7px;
            font-size: 14px;
            font-weight: 300;
            line-height: 1.29;
            text-align: left;
            color: #797979;
            @media screen and (max-width:$screen-md) {
                margin-bottom: 48px;
            }
        }
        .info-box {
            border-top: solid 1px #dddddd;
            border-right:solid 1px #dddddd;
            border-bottom:solid 3px #f76a3a;
            border-left:solid 1px #dddddd;
            padding: 30px;
            height: calc(260px + 30px + 30px);
            @media screen and (max-width:$screen-md) {
                margin-bottom: 33px;
            }
            @media screen and (min-width:$screen-sm) and (max-width:$screen-md) {
                padding: 30px 20px;
            }
            @media screen and (max-width:$screen-sm) {
                max-width: 350px;
                width: 100%;
            }

            .bg-img {
                margin-bottom: 33px;
                height: 54px;
            }
            .info-boxes-title {
                height: 40px;
                font-size: 18px;
                font-weight: 600;
                line-height: 1.11;
                text-align: left;
                color: #2d2a2a;
                margin-bottom: 23px;
            }
            .info-boxes-text {
                font-size: 14px;
                font-weight: 300;
                line-height: 1.14;
                text-align: left;
                color: #797979;
            }
        }
    }
    .services {
        background-color: $gray;
        background-image: url("/img/bg/photo-fon-2.png");
        background-size: cover;
        background-position: center;
        .container {
            padding-top: 78px;
            padding-bottom: 45px;
            .services-head {
                margin-bottom: 60px;
                @media screen and (max-width:$screen-md) {
                    margin-bottom: 27px;
                }
                .services-head-left {
                    font-size: 24px;
                    font-weight: 600;
                    line-height: 1.38;
                    text-align: left;
                    color: #ffffff;
                    @media screen and (max-width:$screen-md) {
                        margin-bottom: 19px;
                    }
                }
                .services-head-right {
                    .services-head-right-text {
                        opacity: 0.5;
                        font-size: 14px;
                        line-height: 1.43;
                        text-align: left;
                        color: #ffffff;
                    }
                    button {
                        margin-top: 25px;
                    }
                }
            }
            .services-box {
                @media screen and (min-width: 600px) and (max-width: $screen-sm) {
                    width: 50%;
                    float: left;
                }
                .services-box-img {
                    float: left;
                    width: 40px;
                    margin-right: 17px;
                    height: 100%;
                }
                .services-box-text {
                    float: left;
                    width: calc(100% - 40px - 17px);
                    margin-bottom: 42px;
                    .services-box-text-title {
                        font-size: 18px;
                        font-weight: 600;
                        line-height: 1.39;
                        letter-spacing: -0.2px;
                        text-align: left;
                        color: #ffffff;
                        margin-bottom: 9px;
                    }
                    .services-box-text-desc {
                        opacity: 0.5;
                        font-size: 14px;
                        line-height: 1.21;
                        text-align: left;
                        color: #ffffff;
                    }
                }
            }
            .services-box-bottom-button {
                max-width: 320px;
                width: 100%;
                margin: 0 auto;
                display: block;
            }
        }
    }

    .info-box-bg {
        @media screen and (max-width:$screen-sm) {
            height: auto;
        }
        overflow: hidden;
        background-color: $gray;
        height: 440px;
        background: url("/img/bg-images/photo-fon-1.png") no-repeat;
        background-size: cover;
        background-position: center;
        z-index: 5;
        margin: 0 auto;
        .row {
            padding: 98px 0 99px;
            @media screen and (max-width:$screen-sm) {
                padding: 60px 0 80px;
            }
            .info-box-bg-text {
                @media screen and (max-width:$screen-sm) {
                    font-size: 32px;
                    font-weight: 300;
                    line-height: 1.25;
                    text-align: left;
                    color: #ffffff;
                    margin-bottom: 32px;
                }
                font-size: 32px;
                font-weight: 300;
                line-height: 1.25;
                text-align: left;
                color: #ffffff;
                margin-bottom: 43px;
            }
            .info-box-bg-button {

            }
        }
    }

    .offers-grid-block {
        padding: 54px 0 25px;
        @media screen and (max-width:$screen-md) {
            padding-bottom: 0;

        }
        .row {
            .offers-grid-block-left-text {
                font-size: 24px;
                font-weight: 600;
                line-height: 1.38;
                text-align: left;
                color: #2d2a2a;
                margin-bottom: 58px;

                @media screen and (max-width:$screen-md) {
                    margin-bottom: 23px;
                }
                @media screen and (max-width:650px) {
                    width: 100%;
                }
            }
            .offers-grid-block-right-text {
                padding-top: 7px;
                font-size: 14px;
                font-weight: 300;
                line-height: 1.29;
                text-align: left;
                color: #797979;

                @media screen and (max-width:$screen-md) {
                    margin-bottom: 31px;
                }
                @media screen and (max-width:650px) {
                    width: 100%;
                }
            }
        }

        .offers-grid-block-tile {
            margin-bottom: 74px;
            @media screen and (max-width:515px) {
                max-width: 400px;
                width: 100%;
                margin-bottom: 26px;
            }
            @media screen and (min-width:$screen-md) {
                &:nth-child(3n+1) {
                    padding-right: 50px;
                }
                &:nth-child(3n+2) {
                    padding-right: 25px;
                    padding-left: 25px;
                }
                &:nth-child(3n+3) {
                    padding-left: 50px;
                }
            }
            .offers-grid-block-grid-bg {
                border: 1px solid $gray;
                display: block;
                width: 100%;
                height: auto;
                img {
                }
                margin-bottom: 15px;
            }
            .offers-grid-block-grid-name {
                font-size: 18px;
                font-weight: 600;
                line-height: 1.39;
                letter-spacing: -0.2px;
                text-align: left;
                width: 100%;
                display: block;
                a {
                    color: #161616;
                }
                .price {
                    color: #f76a3a;
                }
                padding-bottom: 13px;
            }
            .offers-grid-block-grid-desc {
                font-size: 16px;
                font-weight: 300;
                line-height: 1.25;
                text-align: left;
                color: #a8a8a8;
            }
        }
        .offer-grid-more-button {
            display: block;
            margin: 14px auto 81px;
            max-width: 300px;
            width: 100%;
            @media screen and (min-width:515px) and (max-width:$screen-md) {
                margin: -32px auto 50px;
            }
        }
    }

    .texts {
        .texts-title {
            margin-top: 26px;
            font-size: 24px;
            font-weight: 600;
            line-height: 2.08;
            text-align: left;
            color: #2d2a2a;
        }
        ul.nav-tabs {
            border-bottom: none;
            padding-top: 0;
            li {
                border-bottom: 1px $gray-light solid;
                padding-right: 45px;
                &:last-child {
                    padding-right: 0;
                }
                &.active {
                    a {
                        position: relative;
                        top: 1px;
                        background: transparent;
                        color: $gray;
                        border-left: 0;
                        border-top: 0;
                        border-right: 0;
                        border-bottom: 2px $orange solid;
                    }
                }
                &:hover:not(.active), &:focus:not(.active), &:active:not(.active) {
                    border-bottom: 1px $gray-light solid;
                    a {
                        position: relative;
                        top: 1px;
                        background: transparent;
                        color: $gray;
                        border-left: 0;
                        border-top: 0;
                        border-right: 0;
                        border-bottom: 2px $orange solid;
                    }
                }
                a {
                    margin: 0;
                    padding: 0;
                    border-left: 0;
                    border-right: 0;
                    line-height: 29px;
                    font-size: 12px;
                    text-transform: uppercase;
                    color: $gray-light;
                }
            }
        }
        .address-map {
            margin-top: 40px;
            margin-bottom: 40px;
            #map {
                height: 300px;
                padding: 0 15px;
            }
            .address-map-title {
                margin: 23px 0 1px;
                font-size: 18px;
                font-weight: 600;
                line-height: 1.39;
                text-align: left;
                color: #161616;
            }
            .address-map-text {
                font-size: 16px;
                line-height: 1.56;
                text-align: left;
                color: #797979;
                a {
                    color: #797979;
                }
            }
        }
    }
</style>
