<script>
module.exports = {
    name: 'services'
}
</script>

<template>
    <div>
        <div class="container texts">
            <div class="row">
                <div class="texts-title ol-lg-offset-1 col-md-offset-1 col-lg-11 col-md-11 col-sm-12 col-xs-12">
                    Услуги
                </div>
                <div class="">
                    <!-- Навигация -->
                    <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                        <ul class="nav nav-tabs" role="tablist">
                            <router-link to="/services/credit" tag="li">
                                <a>Кредитование</a>
                            </router-link>
                            <router-link to="/services/insurance" tag="li">
                                <a>Cтрахование</a>
                            </router-link>
                            <router-link to="/services/expertise" tag="li">
                                <a>Экспертиза</a>
                            </router-link>
                            <router-link to="/services/re-registration" tag="li">
                                <a>Переоформление</a>
                            </router-link>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="services-tab-content">
            <div :class="this.$route.params.section == 'credit' ? 'in active' : 'hidden'" role="tabpanel" class="tab-pane row" id="tab1">
                <div class="info-common-top-bg credit">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-6  info-common-top-bg-left-text">
                                Кредитование
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-6 info-common-top-bg-right-text">
                                <p>
                                    23% наших автомобилей продается в
                                    кредит. Менеджеры помогут вам
                                    подобрать лучшие условия из более
                                    10 банков-партнеров
                                </p>
                                <button  type="button" data-toggle="modal" data-target="#bid" class="orange-button">
                                    Отправить заявку
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info-common-main-box">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-12 info-common-main-title">
                                Наши преимущества
                            </div>
                            <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-6 info-common-main-box-box">
                                <div class="info-common-main-box-image-bg-holder">
                                    <img src="/img/icons/ic-01.png" style="position:relative; left: -7px;">
                                </div>
                                <div class="info-common-main-box-title">Заявка менеджеру</div>
                                <div class="info-common-main-box-text">
                                    Заполните данные и мы свяжемся с вами в течение 30 минут (с 09:00 до 21:00 без выходных).
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-6 info-common-main-box-box">
                                <div class="info-common-main-box-image-bg-holder">
                                    <img src="/img/icons/ic-09.png">
                                </div>
                                <div class="info-common-main-box-title">Быстро и профессионально</div>
                                <div class="info-common-main-box-text">
                                    Подать заявку можно по 3-м документам и получить ответ от банка в течение 1 дня.
                                </div>
                            </div>
                            <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-6 info-common-main-box-box">
                                <div class="info-common-main-box-image-bg-holder">
                                    <img src="/img/icons/ic-06.png" style="position:relative; left: 0;">
                                </div>
                                <div class="info-common-main-box-title">Покупатели из других регионов</div>
                                <div class="info-common-main-box-text">Доступно для всех видов транспорта и покупателей из любой области.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div :class="this.$route.params.section == 'insurance' ? 'in active' : 'hidden'" role="tabpanel" class="tab-pane row" id="tab2">
                <div class="info-common-top-bg insurance">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-6 info-common-top-bg-left-text">
                                Страхование
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-6 info-common-top-bg-right-text">
                                <p>
                                    В нашей компании вы можете выгодно застраховать свой автомобиль.
                                    Менеджер поможет вам сориентироваться в тарифах и выбрать лучший
                                </p>
                                <button  type="button" data-toggle="modal" data-target="#bid" class="orange-button">
                                    Отправить заявку
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info-common-main-box">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-12 info-common-main-title">
                                Наши преимущества
                            </div>
                            <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-6 info-common-main-box-box">
                                <div class="info-common-main-box-image-bg-holder">
                                    <img src="/img/icons/ic-01.png" style="position:relative; left: -7px;">
                                </div>
                                <div class="info-common-main-box-title">Заявка менеджеру</div>
                                <div class="info-common-main-box-text">Заполните данные и мы свяжемся с вами в течение 30 минут (с 09:00 до 21:00 без выходных).</div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-6 info-common-main-box-box">
                                <div class="info-common-main-box-image-bg-holder">
                                    <img src="/img/icons/ic-09.png">
                                </div>
                                <div class="info-common-main-box-title">Страхование</div>
                                <div class="info-common-main-box-text">
                                    Все виды страхования — осаго, каско, жизнь, имущество.
                                    Различные варианты оплаты — франшиза, рассрочка, кредит.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div :class="this.$route.params.section == 'expertise' ? 'in active' : 'hidden'" role="tabpanel" class="tab-pane row" id="tab3">
                <div class="info-common-top-bg expertise">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-6 info-common-top-bg-left-text">
                                Экспертиза
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-6 info-common-top-bg-right-text">
                                <p>
                                    Ежедневно в наш салон приезжают
                                    технически и юридически проблемные
                                    автомобили. За 8 лет работы, мы
                                    научились видеть их насквозь
                                </p>
                                <button  type="button" data-toggle="modal" data-target="#bid" class="orange-button">
                                    Отправить заявку
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info-common-main-box">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-12 info-common-main-title">
                                Наши преимущества
                            </div>
                            <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-6 info-common-main-box-box">
                                <div class="info-common-main-box-image-bg-holder">
                                    <img src="/img/icons/ic-13.png">
                                </div>
                                <div class="info-common-main-box-title">Техническая диагностика</div>
                                <div class="info-common-main-box-text">
                                    В день мы проводим диагностику более 3
                                    автомобилей разных марок и моделей.
                                    Для этого в нашей компании работают лучшие
                                    технические специалисты. Профессиональное
                                    оборудование позволяет полностью проверить
                                    абсолютно любой автомобиль. По результату проверки
                                    вы получаете подробный диагностический лист со всеми
                                    рекомендациями по обслуживанию.
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-6 info-common-main-box-box">
                                <div class="info-common-main-box-image-bg-holder">
                                    <img src="/img/icons/ic-12.png">
                                </div>
                                <div class="info-common-main-box-title">Юридическая проверка</div>
                                <div class="info-common-main-box-text">
                                    Штат высококвалифицированных экспертов-криминалистов позволяет со 100%
                                    уверенностью определить юридическую чистоту автомобиля.
                                    Мы проверяем не только сам автомобиль и его документы,
                                    но и его собственников, а также историю покупки.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div :class="this.$route.params.section == 're-registration' ? 'in active' : 'hidden'" role="tabpanel" class="tab-pane row" id="tab4">
                <div class="info-common-top-bg re-registration">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-6 info-common-top-bg-left-text">
                                Переоформление
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-6 info-common-top-bg-right-text">
                                <p>
                                    Любые услуги "под ключ".
                                </p>
                                <button  type="button" data-toggle="modal" data-target="#bid" class="orange-button">
                                    Отправить заявку
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info-common-main-box">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-12 info-common-main-title">
                                Наши преимущества
                            </div>

                            <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-6 info-common-main-box">
                                <div class="info-common-main-box-image-bg-holder">
                                    <img src="/img/icons/ic-01.png" style="position:relative; left: -7px;">
                                </div>
                                <div class="info-common-main-box-title">Заявка менеджеру</div>
                                <div class="info-common-main-box-text">
                                    Заполните данные и мы свяжемся с вами в течение 30 минут (с 09:00 до 21:00 без выходных).
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-6 info-common-main-box">
                                <div class="info-common-main-box-image-bg-holder">
                                    <img src="/img/icons/ic-18.png">
                                </div>
                                <div class="info-common-main-box-title">Любые услуги "под ключ"</div>
                                <div class="info-common-main-box-text">
                                    Постановка на учет.
                                    Заключение договора купли-продажи.
                                    Перевес и сохранение номерных знаков.
                                    Проверка денежных средств через кассу.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
    $screen-sm:768px;
    .services-tab-content {
        margin-top: 30px;
    }

    .info-common-top-bg {
        overflow: hidden;
        background-color: #555963;
        height: 401px;
        background-size: cover;
        background-position: center;
        z-index: 5;
        margin: 0 auto;
        &.insurance {
            background-image: url("/img/bg/img-strahovaniye.png");
        }

        &.credit {
            background-image: url("/img/bg/img-kreditovaniye.png");
        }

        &.expertise {
            background-image: url("/img/bg/img-ekspertisa.png");
        }

        &.re-registration {
            background-image: url("/img/bg/img-pereoformleniye.png");
        }
    }
    .info-common-top-bg-left-text {
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
    .info-common-top-bg-right-text {
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
    .info-common-main-title {
     margin-top: 45px;
    margin-bottom: 34px;
    font-size: 24px;
    font-weight: 600;
    line-height: 2.08;
    text-align: left;
    color: #2d2a2a;
}
    .info-common-main-box-image-bg-holder {
        width: 80px;
        overflow: visible;
        float: left;
    }
    .info-common-main-box-title {
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
    .info-common-main-box-text{
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
    .info-common-main-box {
        margin-bottom: 40px;
    }
    .info-common-main-box-box {
        @media screen and (max-width: $screen-sm) {
            max-width: 400px;
            width: 100%;
        }
    }
</style>
