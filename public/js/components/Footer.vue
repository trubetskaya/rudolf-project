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
                    <router-link :to="{name:'catalog',query:{category:'Легковые'}}" tag="li"><a>Легковые автомобили</a></router-link>
                    <router-link :to="{name:'catalog',query:{category:'Коммерческие'}}" tag="li"><a>Коммерческий транспорт</a></router-link>
                </ul>
            </div>
            <div class="col-lg-5ths col-md-5ths col-sm-5ths">
                <ul>
                    <li>Продать</li>
                    <router-link :to="{name:'sale', params:{section:'buyout'}}" tag="li"><a>Срочный выкуп автомобиля</a></router-link>
                    <router-link :to="{name:'sale', params:{section:'trade-in'}}" tag="li"><a>Обмен/Trade-In</a></router-link>
                    <router-link :to="{name:'sale', params:{section:'commission'}}" tag="li"><a>Комисионная продажа</a></router-link>
                </ul>
            </div>
            <div class="col-lg-5ths col-md-5ths col-sm-5ths">
                <ul>
                    <li>Услуги</li>
                    <router-link :to="{name:'services', params:{section:'credit'}}" tag="li"><a>Кредитование</a></router-link>
                    <router-link :to="{name:'services', params:{section:'insurance'}}" tag="li"><a>Страхование</a></router-link>
                    <router-link :to="{name:'services', params:{section:'expertise'}}" tag="li"><a>Экспертиза</a></router-link>
                    <router-link :to="{name:'services', params:{section:'re-registration'}}" tag="li"><a>Переоформление</a></router-link>
                </ul>
            </div>
            <div class="col-lg-5ths col-md-5ths col-sm-5ths">
                <ul>
                    <li>Компания</li>
                    <router-link to="/company" tag="li"><a>О компании</a></router-link>
                </ul>
            </div>
            <div class="col-lg-5ths col-md-5ths col-sm-5ths">
                <ul>
                    <li>Контакты</li>
                    <router-link to="/contacts" tag="li"><a>Контакты</a></router-link>
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