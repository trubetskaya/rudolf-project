<script>
    module.exports = {
        props: ['id'],
        data: function () {
            return {
                card: cards[this.id]
            }
        }
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
                    <div class="jcarousel-wrapper">
                        <div class="jcarousel">
                            <ul>
                                <li v-for="file in card.files">
                                    <img :src="file" :alt="card.taxonomy" class="hidden-xs" width="487" height="350"/>
                                    <img :src="file.replace('487x350', '281x202')" :alt="card.taxonomy"
                                         class="hidden-sm hidden-md hidden-lg" width="281" height="202"/>
                                </li>
                            </ul>
                        </div>
                        <a href="#" class="jcarousel-control-prev hidden-xs"></a>
                        <a href="#" class="jcarousel-control-next hidden-xs"></a>
                    </div>
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