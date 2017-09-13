<script>
    let { Carousel, Slide } = require('vue-carousel');
    module.exports = {
        props: ['id'],
        components: {
            Carousel,
            Slide
        },
        computed: {
            perPage() {
                let w = $(document).width(),
                    sm = 487, xs = 281;

                let pp = Math.floor(w > sm ? w/sm : w/xs);
                return pp > 0 ? pp : 1;
            }
        },
        data: function () {
            return {
                card: cards[this.id]
            }
        },
        beforeRouteEnter (to, _, next) {
            next(vm => {
                vm.card = cards[to.params.id];
            });
        },
    }
</script>
<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-lg-offset-1 col-md-offset-1 col-lg-11 col-md-11 breadcrumbs">
                    <router-link to="/catalog" class="back"><span></span>Каталог</router-link>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-offset-1 col-md-offset-1 col-lg-11 col-md-11">
                    <div class="auto-card-title">
                        {{ card.taxonomy }} {{ card.name }}
                    </div>
                    <div class="auto-card-price" v-html="card.priceView"></div>
                    <carousel :navigationEnabled="true"
                              :navigationNextLabel="''" :navigationPrevLabel="''"
                              :navigationClickTargetSize="0"
                              :paginationEnabled="false"
                              :perPage="perPage">
                        <slide v-for="file in card.files">
                            <img :src="file" :alt="card.taxonomy" class="hidden-sm hidden-xs" width="487" height="350"/>
                            <img :src="file.replace('487x350', '281x202')" :alt="card.taxonomy"
                                 class="hidden-md hidden-lg" width="281" height="202"/>
                        </slide>
                    </carousel>
                </div>
            </div>
        </div>
        <div class="container">
        <div class="row">
            <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10 col-sm-12">
                <div class="auto-card-info-box">
                    <div class="auto-card-info-title">
                        Технические характеристики
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-5 auto-card-into-column">
                            <ul>
                                <li><span>Марка</span>{{ card.mark }}</li>
                                <li><span>Модель</span>{{ card.model }}</li>
                                <li><span>Модификация</span>{{ card.name }}</li>
                                <li><span>Год</span>{{ card.year }}</li>
                                <li><span>Пробег</span>{{ card.mileage }}</li>
                            </ul>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 auto-card-into-column">
                            <ul>
                                <li><span>Тип двигателя</span>{{ card.fuel }}</li>
                                <li><span>Объем двигателя</span>{{ card.volume }}л</li>
                                <li><span>КПП</span>{{ card.transmission }}</li>
                                <li><span>Кузов</span>{{ card.body }}</li>
                                <li><span>Привод</span>{{ card.drive }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="auto-card-info-box">
                    <div class="auto-card-info-title">
                        Комплектация
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-5 auto-card-into-column">
                            <ul>
                                <li v-for="option in card.options.slice(0, Math.ceil(card.options.length/2))">
                                    {{ option }}
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 auto-card-into-column">
                            <ul>
                                <li v-for="option in card.options.slice(Math.ceil(card.options.length/2))">
                                    {{ option }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="auto-card-info-box">
                    <div class="auto-card-info-title">
                        Комплектация
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-7 auto-card-into-text">
                            {{ card.description }}
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
    .auto-card-title {
        font-size: 36px;
        font-weight: 600;
        line-height: 1.39;
        text-align: left;
        color: #2d2a2a;
        margin: 8px 0 6px;
    }
    .auto-card-price {
        font-size: 24px;
        font-weight: 600;
        line-height: 1.04;
        text-align: left;
        color: #f76a3a;
    }
    .auto-card-info-box {
        margin-bottom: 37px;
        padding-bottom: 43px;
        @media (max-width:$screen-sm) {
            margin-bottom: 26px;
            padding-bottom: 28px;
        }
        border-bottom: solid 1px rgba(67,64,64, 0.1);
        &:last-child {
            border-bottom: none;
        }
        .auto-card-info-title {
            font-size: 24px;
            font-weight: 600;
            line-height: 2.08;
            text-align: left;
            color: #2d2a2a;
            margin-bottom: 9px;
        }
        .auto-card-into-text {
            font-size: 16px;
            line-height: 1.56;
            text-align: left;
            color: #797979;
        }
        .auto-card-into-column {
            ul {
                list-style: none;
                padding: 0;
                li{
                    font-size: 16px;
                    line-height: 2.19;
                    text-align: left;
                    color: #797979;
                    margin-bottom: 9px;
                    font-weight: 300;
                    &:last-child {
                        margin-bottom: 0;
                    }
                    span{
                        font-size: 16px;
                        font-weight: 500;
                        line-height: 2.19;
                        text-align: left;
                        color: #2d2a2a;
                        padding-right: 10px;
                    }
                }
            }
        }
    }
    .VueCarousel {
        position: relative;
        margin: 38px 0 26px;
        width: 974px;

        @media (max-width: 974px) {
            margin: 26px 0 13px;
            width: 562px;
        }

        @media (max-width: 562px) {
            margin: 26px 0 13px;
            width: 281px;
        }

        .VueCarousel-wrapper {
            .VueCarousel-inner {
                .VueCarousel-slide {
                    flex-basis: auto;
                }
            }
        }
    }
</style>

<style lang="scss">
    .VueCarousel {
        .VueCarousel-navigation {
            .VueCarousel-navigation-button {
                right: 0;
                left: auto;
                position: absolute;
                background-repeat: no-repeat;
                transform: none;
                cursor: pointer;
                display: block;
                height: 42px;
                width: 42px;
                opacity: 1;

                &.VueCarousel-navigation-prev {
                    background-image: url("/img/icons/ic-left-big-default.png");
                    top: 131px;
                }

                &.VueCarousel-navigation-next {
                    background-image: url("/img/icons/ic-right-big-default.png");
                    top: 179px;
                }

                @media (max-width: 974px) {
                    display: none;
                }
            }
        }
    }
</style>