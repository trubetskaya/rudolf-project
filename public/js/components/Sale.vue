<script>
    module.exports = {
        name: 'sale'
    }
</script>

<template>
<div>
    <div class="container texts">
        <div class="row">
            <div class="texts-title ol-lg-offset-1 col-md-offset-1 col-lg-11 col-md-11 col-sm-12 col-xs-12">
                Продать
            </div>
            <div>
                <!-- Навигация -->
                <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <router-link to="/sale/buyout" tag="li">
                            <a>Срочный выкуп автомобиля</a>
                        </router-link>
                        <router-link to="/sale/trade-in" tag="li">
                            <a>Обмен/Trade-In</a>
                        </router-link>
                        <router-link to="/sale/commission" tag="li">
                            <a>Комиссионная продажа</a>
                        </router-link>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Содержимое вкладок -->
    <div class="sale-tab-content">
        <div :class="this.$route.params.section == 'buyout' ? 'in active' : 'hidden'" role="tabpanel" class="tab-pane row">
            <div class="urgent-sale-top-bg">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-6 urgent-sale-top-bg-left-text">
                            Срочный выкуп
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-6 urgent-sale-top-bg-right-text">
                            <p>
                                В год мы выкупаем более 300 автомобилей с пробегом.<br class="hidden-md hidden-sm hidden-xs">
                                За 8 лет работы мы научились это делать профессионально.<br class="hidden-md hidden-sm hidden-xs">
                                Благодаря тому, что наш салон расположен в Киеве,<br class="hidden-md hidden-sm hidden-xs">
                                мы оценим ваш автомобиль дороже, исходя из<br class="hidden-md hidden-sm hidden-xs">
                                хорошего спроса на поддержаные автомобили в столице.
                            </p>

                            <button type="button" data-toggle="modal" data-target="#bid" class="orange-button">
                                Оправить заявку
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container urgent-sale-box">
                <div class="row">
                    <div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-12 urgent-sale-box-title">
                        Наши преимущества
                    </div>
                    <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-6 urgent-sale-box-info">
                        <div class="urgent-sale-box-image-bg-holder">
                            <img src="/img/icons/ic-09.png">
                        </div>
                        <div class="urgent-sale-box-info-title">Не более 1 часа</div>
                        <div class="urgent-sale-box-info-text">Вы приезжаете в салон, проходите бесплатную диагностику и юридическую проверку автомобиля, после чего эксперт по оценке озвучивает вам сумму выкупа. После вашего согласия, мы оформляем документы и вы получаете свои деньги. Форма расчета по вашему желанию — наличными в кассе или на банковский счет.</div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-6 urgent-sale-box-info">
                        <div class="urgent-sale-box-image-bg-holder">
                            <img src="/img/icons/ic-01.png" style="position:relative; left: -7px;">
                        </div>
                        <div class="urgent-sale-box-info-title">Безопасно и юридически грамотно</div>
                        <div class="urgent-sale-box-info-text">Вы полностью защищены от мошеннических схем при продаже своего автомобиля. Весь процесс проходит безопасно и цивилизованно. Сразу после сделки мы прекращаем повседневную эксплуатацию автомобиля и снимаем его с учета. Вам не надо переживать за штрафы и ДТП, которые могут Вас настигнуть при продаже перекупщикам.</div>
                    </div>
                    <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-6 urgent-sale-box-info">
                        <div class="urgent-sale-box-image-bg-holder">
                            <img src="/img/icons/ic-02.png" style="position:relative; left: -8px;">
                        </div>
                        <div class="urgent-sale-box-info-title">Любые марки и модели</div>
                        <div class="urgent-sale-box-info-text">Для нас нет разницы какой у вас автомобиль. Основные критерии — юридическая чистота и отсутствие серьезных аварий. Для нас не существует непрофильных марок, мы оцениваем по достоинству каждый автомобиль. Мы также выкупаем кредитные автомобили. Для этого вам не нужно самостоятельно гасить кредит — мы сделаем это за вас.</div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-6 urgent-sale-box-info">
                        <div class="urgent-sale-box-image-bg-holder">
                            <img src="/img/icons/ic-03.png" style="position:relative; left: -8px;">
                        </div>
                        <div class="urgent-sale-box-info-title">Обмен \ Trade-in</div>
                        <div class="urgent-sale-box-info-text">Как правило, основной причиной продажи автомобиля, является покупка другого. Мы гарантированно оценим ваш автомобиль дороже, если вы подберете у нас что-то взамен. Только в нашей компании вы можете обменять между собой мотоцикл, легковой и коммерческий автомобиль.</div>
                    </div>
                </div>
            </div>
        </div>
        <div :class="this.$route.params.section == 'trade-in' ? 'in active' : 'hidden'" role="tabpanel" class="tab-pane row">
            <div class="urgent-sale-top-bg">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-6 urgent-sale-top-bg-left-text">
                            Обмен/Trade-In
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-6 urgent-sale-top-bg-right-text">
                            <p>
                                В год мы выкупаем более 300 автомобилей с пробегом.<br class="hidden-md hidden-sm hidden-xs">
                                За 8 лет работы мы научились это делать профессионально.<br class="hidden-md hidden-sm hidden-xs">
                                Благодаря тому, что наш салон расположен в Киеве,<br class="hidden-md hidden-sm hidden-xs">
                                мы оценим ваш автомобиль дороже, исходя из<br class="hidden-md hidden-sm hidden-xs">
                                хорошего спроса на поддержаные автомобили в столице.
                            </p>

                            <button type="button" data-toggle="modal" data-target="#bid" class="orange-button">
                                Оправить заявку
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container urgent-sale-box">
                <div class="row">
                    <div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-12 urgent-sale-box-title">
                        Наши преимущества
                    </div>
                    <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-6 urgent-sale-box-info">
                        <div class="urgent-sale-box-image-bg-holder">
                            <img src="/img/icons/ic-09.png">
                        </div>
                        <div class="urgent-sale-box-info-title">Не более 1 часа</div>
                        <div class="urgent-sale-box-info-text">Вы приезжаете в салон, проходите бесплатную диагностику и юридическую проверку автомобиля, после чего эксперт по оценке озвучивает вам сумму выкупа. После вашего согласия, мы оформляем документы и вы получаете свои деньги. Форма расчета по вашему желанию — наличными в кассе или на банковский счет.</div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-6 urgent-sale-box-info">
                        <div class="urgent-sale-box-image-bg-holder">
                            <img src="/img/icons/ic-01.png" style="position:relative; left: -7px;">
                        </div>
                        <div class="urgent-sale-box-info-title">Безопасно и юридически грамотно</div>
                        <div class="urgent-sale-box-info-text">Вы полностью защищены от мошеннических схем при продаже своего автомобиля. Весь процесс проходит безопасно и цивилизованно. Сразу после сделки мы прекращаем повседневную эксплуатацию автомобиля и снимаем его с учета. Вам не надо переживать за штрафы и ДТП, которые могут Вас настигнуть при продаже перекупщикам.</div>
                    </div>
                    <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-6 urgent-sale-box-info">
                        <div class="urgent-sale-box-image-bg-holder">
                            <img src="/img/icons/ic-02.png" style="position:relative; left: -8px;">
                        </div>
                        <div class="urgent-sale-box-info-title">Любые марки и модели</div>
                        <div class="urgent-sale-box-info-text">Для нас нет разницы какой у вас автомобиль. Основные критерии — юридическая чистота и отсутствие серьезных аварий. Для нас не существует непрофильных марок, мы оцениваем по достоинству каждый автомобиль. Мы также выкупаем кредитные автомобили. Для этого вам не нужно самостоятельно гасить кредит — мы сделаем это за вас.</div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-6 urgent-sale-box-info">
                        <div class="urgent-sale-box-image-bg-holder">
                            <img src="/img/icons/ic-03.png" style="position:relative; left: -8px;">
                        </div>
                        <div class="urgent-sale-box-info-title">Обмен \ Trade-in</div>
                        <div class="urgent-sale-box-info-text">Как правило, основной причиной продажи автомобиля, является покупка другого. Мы гарантированно оценим ваш автомобиль дороже, если вы подберете у нас что-то взамен. Только в нашей компании вы можете обменять между собой мотоцикл, легковой и коммерческий автомобиль.</div>
                    </div>
                </div>
            </div>
        </div>
        <div :class="this.$route.params.section == 'commission' ? 'in active' : 'hidden'" role="tabpanel" class="tab-pane row">
            <div class="urgent-sale-top-bg">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-6 urgent-sale-top-bg-left-text">
                            Комиссионная продажа
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-6 urgent-sale-top-bg-right-text">
                            <p>
                                В год мы выкупаем более 300 автомобилей с пробегом.<br class="hidden-md hidden-sm hidden-xs">
                                За 8 лет работы мы научились это делать профессионально.<br class="hidden-md hidden-sm hidden-xs">
                                Благодаря тому, что наш салон расположен в Киеве,<br class="hidden-md hidden-sm hidden-xs">
                                мы оценим ваш автомобиль дороже, исходя из<br class="hidden-md hidden-sm hidden-xs">
                                хорошего спроса на поддержаные автомобили в столице.
                            </p>

                            <button type="button" data-toggle="modal" data-target="#bid" class="orange-button">
                                Оправить заявку
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container urgent-sale-box">
                <div class="row">
                    <div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-12 urgent-sale-box-title">
                        Наши преимущества
                    </div>
                    <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-6 urgent-sale-box-info">
                        <div class="urgent-sale-box-image-bg-holder">
                            <img src="/img/icons/ic-09.png">
                        </div>
                        <div class="urgent-sale-box-info-title">Не более 1 часа</div>
                        <div class="urgent-sale-box-info-text">Вы приезжаете в салон, проходите бесплатную диагностику и юридическую проверку автомобиля, после чего эксперт по оценке озвучивает вам сумму выкупа. После вашего согласия, мы оформляем документы и вы получаете свои деньги. Форма расчета по вашему желанию — наличными в кассе или на банковский счет.</div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-6 urgent-sale-box-info">
                        <div class="urgent-sale-box-image-bg-holder">
                            <img src="/img/icons/ic-01.png" style="position:relative; left: -7px;">
                        </div>
                        <div class="urgent-sale-box-info-title">Безопасно и юридически грамотно</div>
                        <div class="urgent-sale-box-info-text">Вы полностью защищены от мошеннических схем при продаже своего автомобиля. Весь процесс проходит безопасно и цивилизованно. Сразу после сделки мы прекращаем повседневную эксплуатацию автомобиля и снимаем его с учета. Вам не надо переживать за штрафы и ДТП, которые могут Вас настигнуть при продаже перекупщикам.</div>
                    </div>
                    <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-6 urgent-sale-box-info">
                        <div class="urgent-sale-box-image-bg-holder">
                            <img src="/img/icons/ic-02.png" style="position:relative; left: -8px;">
                        </div>
                        <div class="urgent-sale-box-info-title">Любые марки и модели</div>
                        <div class="urgent-sale-box-info-text">Для нас нет разницы какой у вас автомобиль. Основные критерии — юридическая чистота и отсутствие серьезных аварий. Для нас не существует непрофильных марок, мы оцениваем по достоинству каждый автомобиль. Мы также выкупаем кредитные автомобили. Для этого вам не нужно самостоятельно гасить кредит — мы сделаем это за вас.</div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-6 urgent-sale-box-info">
                        <div class="urgent-sale-box-image-bg-holder">
                            <img src="/img/icons/ic-03.png" style="position:relative; left: -8px;">
                        </div>
                        <div class="urgent-sale-box-info-title">Обмен \ Trade-in</div>
                        <div class="urgent-sale-box-info-text">Как правило, основной причиной продажи автомобиля, является покупка другого. Мы гарантированно оценим ваш автомобиль дороже, если вы подберете у нас что-то взамен. Только в нашей компании вы можете обменять между собой мотоцикл, легковой и коммерческий автомобиль.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<style lang="scss" scoped>
    $screen-sm:768px;
    .sale-tab-content {
        margin-top: 30px;
    }
    .urgent-sale-top-bg {
        overflow: hidden;
        background-color: #555963;
        height: 401px;
        background: url("/img/bg-images/photo-first.png") no-repeat;
        background-size: cover;
        background-position: center;
        z-index: 5;
        margin: 0 auto;
    }
    .urgent-sale-top-bg-left-text {
        margin-top: 90px;
        font-size: 36px;
        font-weight: 600;
        line-height: 1.39;
        text-align: left;
        color: #ffffff;

        @media screen and (max-width: $screen-sm) {
            margin-top: 40px;
        }
    }
    .urgent-sale-top-bg-right-text {
        margin-top: 118px;
        font-size: 16px;
        line-height: 1.25;
        text-align: left;
        color: #ffffff;
        @media screen and (max-width: $screen-sm) {
            margin-top: 38px;
        }
        button {
            margin-top: 41px;
            @media screen and (max-width: $screen-sm) {
                margin-top: 30px;
            }
        }
    }
    .urgent-sale-box-title {
        margin-top: 45px;
        margin-bottom: 34px;
        font-size: 24px;
        font-weight: 600;
        line-height: 2.08;
        text-align: left;
        color: #2d2a2a;
    }
    .urgent-sale-box-image-bg-holder {
        width: 80px;
        overflow: visible;
        float: left;
    }
    .urgent-sale-box-info-title {
        float: left;
        height: 20px;
        font-size: 16px;
        font-weight: 600;
        line-height: 1.39;
        text-align: left;
        color: #2d2a2a;
        margin-bottom: 9px;
        width: calc(100% - 80px);
        @media screen and (max-width: $screen-sm) {
            height: auto;
        }
    }
    .urgent-sale-box-info-text {
        float: left;
        opacity: 0.5;
        font-size: 13px;
        line-height: 1.21;
        text-align: left;
        color: #797979;
        width: calc(100% - 80px);
        padding-bottom: 48px;
        padding-right: 5px;
    }
    .urgent-sale-box {
        margin-bottom: 40px;
    }
    .urgent-sale-box-info{
        @media screen and (max-width: $screen-sm) {
            max-width: 400px;
            width: 100%;
        }
    }
</style>