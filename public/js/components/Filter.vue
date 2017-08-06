<script>

    var _ = require('lodash');

    module.exports = {
        props:['cardList'],
        data: function () {
            return {
                'allFilters' : true
            }
        },
        ready: function() {

        },
        methods: {
            reset() {

            }
        },
        computed: {
            marks: function () {
                return this.cardList.map(function(i) {
                    return i.mark.name;
                });
            },
            models: function () {
                return this.cardList.map(function(i) {
                    return i.model.name;
                });
            },
            years: function () {
                var years = _.map(_.uniqBy(this.cardList, 'year'), function (item) {
                    return item.year;
                });
                var yearsRange = [];
                var minYear = Math.min.apply(Math, years);
                var maxYear = Math.max.apply(Math, years);
                for (var i = minYear; i <= maxYear; i++) {
                    yearsRange.push(i)
                }
                return yearsRange;
            },
            priceUSD: function () {
                var prices = _.map(_.uniqBy(this.cardList, 'priceUSD'), function (item) {
                    return item.priceUSD;
                });
                var minPrice = Math.floor(Math.min.apply(Math, prices) / 1000) * 1000;
                var maxPrice = Math.ceil(Math.max.apply(Math, prices) / 1000) * 1000;
                var pricesRange = [];
                for (var i = minPrice; i <= maxPrice; i = i + 1000) {
                    pricesRange.push(i)
                }
                return pricesRange;
            }

        }
    }
</script>

<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-offset-1 col-md-offset-1 col-lg-11 col-md-11 breadcrumbs">
                <a href="<?= $this->url('catalog" class="back">
                    <span></span>Назад
                </a>
            </div>
            <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10 col-sm-12 col-xs-12 catalog">
                <h2>Купить</h2>
                <div class="row catalog-filter-group">
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 xs-margin-top">
                        <label>Марка</label>
                        <select name="model">
                            <optgroup label="<?=$mark;?>">
                                <option value="<?=$id?>"></option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="catalog-clear-box-sm hidden-lg hidden-md hidden-xs"></div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 xs-margin-top">
                        <label for="yearFrom">Год</label>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <select id="yearFrom" name="year[from]" data-dropdown-options='{"label":"От"}'>
                                    <option v-if="$index!=(years.length - 1)" v-for="year in years| orderBy +1" :value="year">{{year}}</option>
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <select id="yearTo" name="year[to]" data-dropdown-options='{"label":"До"}'>
                                    <option v-if="$index!=(years.length - 1)"  v-for="year in years| orderBy -1" :value="year">{{year}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 xs-margin-top">
                        <label for="priceFrom">Цена</label>
                        <select id="priceFrom" name="price[from]" data-dropdown-options='{"label":"От"}'>
                            <option v-if="$index!=(priceUSD.length - 1)" v-for="price in priceUSD| orderBy +1" :value="price">{{price}}</optionv-if>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 no-label">
                        <select id="priceTo" name="price[to]" data-dropdown-options='{"label":"До"}'>
                            <option v-if="$index!=(priceUSD.length - 1)" v-for="price in priceUSD| orderBy -1" :value="price">{{price}}</option>
                        </select>
                    </div>
                </div>

                <div v-show="allFilters" class="hidden row catalog-filter-group">
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 xs-margin-top">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                                <label>Поколение</label>
                                <select>
                                    <option value="1">One</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                                <label>Кузов</label>
                                <select>
                                    <option value="1">One</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4  col-sm-3 col-xs-12">
                                <label>Двигатель</label>
                                <select>
                                    <option value="1">One</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="catalog-clear-box-sm hidden-lg hidden-md hidden-xs"></div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 xs-margin-top">
                        <label>Мощность</label>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <select>
                                    <option value="1">One</option>
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <select>
                                    <option value="1">One</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 xs-margin-top">
                        <label>Коробка</label>
                        <select>
                            <option value="1">One</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 xs-margin-top">
                        <label>Привод</label>
                        <select>
                            <option value="1">One</option>
                        </select>
                    </div>
                </div>
                <div class="row catalog-filter-group-checkboxes">
                    <div v-show="allFilters" class="col-lg-5 col-md-5 col-sm-7 col-xs-12 xs-margin-top">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <input type="checkbox">
                                <label>Со скидкой</label>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <input type="checkbox">
                                <label>Selected</label>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <input type="checkbox">
                                <label>Новые</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-5 col-xs-12 xs-margin-top">
                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-sm-6 hidden-xs"></div>
                            <div class="hidden-lg hidden-md hidden-sm col-xs-6">
                                <a class="catalog-hide-filters {{allFilters ? '' : 'collapsed'}}"
                                   href="javascript:"
                                   @click="allFilters=!allFilters"
                                >
                                    {{allFilters ? 'Скрыть фильтры' : 'Все фильтры'}}
                                </a>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6">
                                <a class="catalog-drop-filters" href="javascript:" @click="reset();">
                                    Сбросить фильтры
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
