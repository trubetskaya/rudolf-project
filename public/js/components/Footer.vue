<script>
    module.exports = {
        name: 'app-footer',
        data: function () {
            return {}
        }
    }
</script>

<template>
    <footer>
        <div class="container hidden-xs hidden-sm" id="footer-link-list">
            <div class="col-lg-5ths col-md-5ths col-sm-5ths">
                <ul>
                    <li>Купить</li>
                    <li><a href="/catalog">Легковые автомобили</a></li>
                    <li><a href="/catalog">Коммерческий транспорт</a></li>
                </ul>
            </div>
            <div class="col-lg-5ths col-md-5ths col-sm-5ths">
                <ul>
                    <li>Продать</li>
                    <li><a href="sale">Срочный выкуп автомобиля</a></li>
                </ul>
            </div>
            <div class="col-lg-5ths col-md-5ths col-sm-5ths">
                <ul>
                    <li>Услуги</li>
                    <li><a href="/services/credit">Кредитование</a></li>
                    <li><a href="/services/insurance">Страхование</a></li>
                    <li><a href="/services/expertise">Экспертиза</a></li>
                    <li><a href="/services/re-registration">Переоформление</a></li>
                </ul>
            </div>
            <div class="col-lg-5ths col-md-5ths col-sm-5ths">
                <ul>
                    <li>Компания</li>
                    <li>
                        <a href="<?=$this->url('company')?>" target="_blank">
                            О компании
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-5ths col-md-5ths col-sm-5ths">
                <ul>
                    <li>Контакты</li>
                    <li>
                        <a href="<?=$this->url('contacts')?>" target="_blank">
                            Контакты
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="copyright">
            <div class="container">
                <b>&copy; 2017 Rudolf Autohaus.</b> Все права защищены
            </div>
        </div>
    </footer>
</template>

<style lang="scss" scoped>
    $gray:#555963;
    $gray-light:#e3e3e3;
    $white:#ffffff;
    $orange:#f76a3a;

    $screen-sm:768px;

    .col-xs-5ths,
    .col-sm-5ths,
    .col-md-5ths,
    .col-lg-5ths {
        position: relative;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
    }

    .col-xs-5ths {
        width: 20%;
        float: left;
    }

    @media (min-width: 768px) {
        .col-sm-5ths {
            width: 20%;
            float: left;
        }
    }

    @media (min-width: 992px) {
        .col-md-5ths {
            width: 20%;
            float: left;
        }
    }

    @media (min-width: 1200px) {
        .col-lg-5ths {
            width: 20%;
            float: left;
        }
    }

    footer {
        border-top: #f3f4f5 1px solid;
        #footer-link-list {
            padding-top: 50px;
            padding-bottom: 60px;
            div {
                ul {
                    list-style: none;
                    padding-left: 0;
                    li {
                        text-align: left;
                        text-transform: uppercase;
                        &:first-child {
                            font-size: 12px;
                            font-weight: 600;
                            letter-spacing: 0.2px;
                            color: #131212;
                            padding-bottom: 9px;
                        }
                        a {
                            line-height: 26px;
                            text-transform: uppercase;
                            font-size: 12px;
                            letter-spacing: 0.2px;
                            text-align: left;
                            color: #797979;
                        }
                    }
                }
            }
        }
    }

    #copyright {
        height: 60px;
        background-color: #f3f4f5;
        overflow: hidden;
        @media (max-width: 992px) {
            border-top: #fff solid 1px;
        }
        .container {
            white-space: nowrap;
        }
        div {
            line-height: 60px;
            color: #cdcdcd;
            b {
                font-weight: normal;
                color: #797979;
            }
        }
    }
</style>