<script>
    module.exports = {
        name: 'company',
        data: function () {
            return {}
        }
    }
</script>

<template>
<div>
    <div class="container texts">
        <div class="row">
            <div class="texts-title ol-lg-offset-1 col-md-offset-1 col-lg-11 col-md-11 col-sm-12 col-xs-12">
                Компания
            </div>
        </div>
    </div>
    <div class="company">
        <div class="info-common-top-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-6  info-common-top-bg-left-text">
                        Rudolf AutoHaus
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-6 info-common-top-bg-right-text">
                        <p>
                            8 лет работы, 25 профессионалов в
                            команде, 3 направления - легковые,
                            коммерческие, мото, 500 проданных
                            авто ежегодно
                        </p>
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
                        <div class="info-common-main-box-title">Философия бренда</div>
                        <div class="info-common-main-box-text">
                            Rudolf AutoHaus сконцентрировал свою деятельность
                            на достижения европейского качества услуг.
                            Мы ставим интересы клиента на первое место
                            и делаем все возможное чтоб он стал нашим
                            постоянным клиентом.
                            За 8 лет успешной работы мы достигли результата 43.5%
                            сделок связаны с нашими постоянными клиентами
                            Наша цель сделать Украинский рынок б.у. авто цивилизированным

                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-6 info-common-main-box-box">
                        <div class="info-common-main-box-image-bg-holder">
                            <img src="/img/icons/ic-12.png">
                        </div>
                        <div class="info-common-main-box-title">Юридическая проверка</div>
                        <div class="info-common-main-box-text">
                            Все автомобили юридически чисты.
                            Мы проверяем не только данные автомобиля,
                            но и его собственников. Сертифицированные
                            эксперты-криминалисты, позволяют нам на 100%
                            гарантировать юридическую чистоту каждого автомобиля.
                        </div>
                    </div>
                    <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-6 info-common-main-box-box-small">
                        <div class="info-common-main-box-image-bg-holder">
                            <img src="/img/icons/ic-07.png">
                        </div>
                        <div class="info-common-main-box-title">Диагностика</div>
                        <div class="info-common-main-box-text">
                            Автомобили проходят техническую проверку.
                            Мы, как эксперты вторичного рынка, знаем
                            как правильно проверить автомобиль любой марки.
                            В диагностическом листе мы указываем
                            все необходимые рекомендации.
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-6 info-common-main-box-box-small">
                        <div class="info-common-main-box-image-bg-holder">
                            <img src="/img/icons/ic-02.png" style="position:relative; left: -8px;">
                        </div>
                        <div class="info-common-main-box-title">Предпродажная подготовка</div>
                        <div class="info-common-main-box-text">
                            Химчистка салона, полировка кузова, устранение кузовных дефектов,
                            а также необходимое для безопасной эксплуатации, техническое обслуживание.
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
    .company {
        margin-top: 30px;
        .info-common-top-bg {
            overflow: hidden;
            background-color: #555963;
            background-position: center;
            background-size: cover;
            z-index: 5;
            margin: 0 auto;
            height: 401px;
            background-image: url("/img/bg/img-avto-klub.png");
            background-repeat: no-repeat;
        }
        .info-common-top-bg-left-text {
            margin-top: 90px;
            font-size: 36px;
            font-weight: 600;
            line-height: 1.39;
            text-align: left;
            color: #ffffff;
            @media screen and (max-width: $screen-sm) {
                margin-top: 60px;
            }
        }
        .info-common-top-bg-right-text {
            p{
                margin-top: 118px;
                font-size: 16px;
                line-height: 1.25;
                text-align: left;
                color: #ffffff;
                @media screen and (max-width: $screen-sm) {
                    margin-top: 50px;
                }
            }
            button {
                margin-top: 41px;
                @media screen and (max-width: $screen-sm) {
                    margin-top: 41px;
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
        .info-common-main-box-text {
            float: left;
            opacity: 0.5;
            font-size: 13px;
            line-height: 1.21;
            text-align: left;
            color: #797979;
            width: calc(100% - 80px);
            padding-bottom: 48px;
            padding-right: 10px;
        }
        .info-common-main-box{
            background-color: #f3f4f5;
            padding-bottom: 45px;
        }
        .info-common-main-box-box{
            float: left;
            height: 160px;
            @media screen and (max-width: $screen-sm) {
                max-width: 400px;
                width: 100%;
                height: auto;
            }
        }
        .info-common-main-box-box-small{
            float: left;
            height: 124px;
            @media screen and (max-width: $screen-sm) {
                max-width: 400px;
                width: 100%;
                height: auto;
            }
        }
    }

</style>
