<script>

    var _ = require('lodash');

    var years = _.map(_.uniqBy(cardListInit, 'year'), function (item) {
        return item.year;
    });
    var minYearInit = Math.min.apply(Math, years);
    var maxYearInit = Math.max.apply(Math, years);

    var prices = _.map(_.uniqBy(cardListInit, 'priceUSD'), function (item) {
        return item.priceUSD;
    });
    var minPriceInit = Math.floor(Math.min.apply(Math, prices) / 1000) * 1000;
    var maxPriceInit = Math.ceil(Math.max.apply(Math, prices) / 1000) * 1000;

    module.exports = {
        props:['cardList'],
        data: function () {
            return {
                'allFilters' : true,
                'filters' : {
                    'model' : null,
                    'year-from' : null,
                    'year-to' : null,
                    'price-from' : null,
                    'price-to' : null,
                },
                'loadingOverlay' : false,
            }
        },
        ready: function() {
            $("select").on("change", function(e) {
                if ($(e.target).val() != '') {
                    this.loadingOverlay = true;
                    setTimeout(function() {
                        this.filters[$(e.target).attr('name')] = $(e.target).val();
                        this.$dispatch('filterList', this.filters);
                    }.bind(this), 0);
                    setTimeout(function() {
                        this.loadingOverlay = false;
                    }.bind(this), 500);
                }
            }.bind(this));
        },
        methods: {
            resetFilters() {
                this.loadingOverlay = true;
                setTimeout(function () {
                    this.filters = {
                        'year-from' : null,
                        'year-to' : null,
                        'price-from' : null,
                        'price-to' : null,
                    };
                    $("#catalog-filters select[name]").each(function () {
                        $(this).val('').trigger("change");
                    });
                    this.$dispatch('resetList', this.filters);
                }.bind(this), 0);
                setTimeout(function () {
                    this.loadingOverlay = false;
                }.bind(this), 1000)
            },
            getMarks: function () {
                var marks = {};
                for (var i = 0; i < cardListInit.length; i++) {
                    if (typeof marks[cardListInit[i].mark.name] == 'undefined') {
                        marks[cardListInit[i].mark.name] = [];
                    }
                    if (marks[cardListInit[i].mark.name].indexOf(cardListInit[i].model.name) === -1) {
                        marks[cardListInit[i].mark.name].push(cardListInit[i].model.name)
                    }
                }
                return marks;
            },
        },
        computed: {
            yearsFrom: function () {
                var yearsRange = [];
                var maxYear = this.filters['year-to'] ? this.filters['year-to'] :  maxYearInit;
                for (var i = minYearInit; i <= maxYear; i++) {
                    yearsRange.push(i)
                }
                return yearsRange;
            },
            yearsTo: function () {
                var yearsRange = [];
                var minYear = this.filters['year-from'] ? this.filters['year-from'] : minYearInit;
                for (var i = minYear; i <= maxYearInit; i++) {
                    yearsRange.push(i)
                }
                return yearsRange;
            },
            priceUSDFrom: function () {
                var maxPrice = this.filters['price-to'] ? this.filters['price-to'] : maxPriceInit;
                var pricesRange = [];
                for (var i = minPriceInit; i <= maxPrice; i = i + 1000) {
                    pricesRange.push(i)
                }
                return pricesRange;
            },
            priceUSDTo: function () {
                var minPrice = this.filters['price-from'] ? this.filters['price-from'] : minPriceInit;
                var pricesRange = [];
                for (var i = minPrice; i <= maxPriceInit; i = i + 1000) {
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
            <div id="catalog-filters" class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10 col-sm-12 col-xs-12 catalog">
                <div v-show="loadingOverlay" class="loading-overlay"></div>
                <h2>Купить</h2>
                <div class="row catalog-filter-group">
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 xs-margin-top">
                        <label>Марка</label>
                        <select name="model" data-dropdown-options='{"label":"Марка"}'>
                            <optgroup v-for="(mark, models) in getMarks()" :label="mark">
                                <option v-for="model in models" :value="model">{{model}}</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="catalog-clear-box-sm hidden-lg hidden-md hidden-xs"></div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 xs-margin-top">
                        <label for="yearFrom">Год</label>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <select id="yearFrom" name="year-from" data-dropdown-options='{"label":"От"}'>
                                    <option v-if="$index!=(yearsFrom.length - 1)" v-for="year in yearsFrom| orderBy +1" :value="year">{{year}}</option>
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <select id="yearTo" name="year-to" data-dropdown-options='{"label":"До"}'>
                                    <option v-if="$index!=(yearsTo.length - 1)"  v-for="year in yearsTo| orderBy -1" :value="year">{{year}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 xs-margin-top">
                        <label for="priceFrom">Цена</label>
                        <select id="priceFrom" name="price-from" data-dropdown-options='{"label":"От"}'>
                            <option v-if="$index!=(priceUSDFrom.length - 1)" v-for="price in priceUSDFrom| orderBy +1" :value="price">{{price}}</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 no-label">
                        <select id="priceTo" name="price-to" data-dropdown-options='{"label":"До"}'>
                            <option v-if="$index!=(priceUSDTo.length - 1)" v-for="price in priceUSDTo| orderBy -1" :value="price">{{price}}</option>
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
                                <a class="catalog-drop-filters" href="javascript:"
                                   @click="resetFilters();"
                                >
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