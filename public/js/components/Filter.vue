<script>

    let filters = {
        'model' : null,
        'transmission' : null,
        'year-from' : null,
        'year-to' : null,
        'price-from' : null,
        'price-to' : null,
        'body' : null,
        'drive' : null,
        'fuel' : null,
    };

    let _ = require('lodash');
    if (typeof cardListInit !== 'undefined') {

    }

    module.exports = {
        props:['cardList'],
        data: function () {
            return {
                allFilters : true,
                filters : $.extend({}, filters),
                loadingOverlay : false,
                optgroupClass: {
                    'fs-dropdown-item_disabled': true
                },
            }
        },
        ready: function() {
            $("select").dropdown().on("change", function(e) {
                if ($(e.target).val() != '') {
                    this.loadingOverlay = true;
                    setTimeout(function() {
                        this.filters[$(e.target).attr('name')] =
                            ($(e.target).val() == 'null') ? null : $(e.target).val();
                        this.$dispatch('filterList', this.filters);
                    }.bind(this), 0);

                    setTimeout(function() {
                        this.loadingOverlay = false;
                    }.bind(this), 500);
                }
            }.bind(this));

            this.$dispatch('dropdownUpdate');
            $("[type=checkbox], [type=radio]")
                .checkbox();
        },
        methods: {
            resetFilters() {
                this.loadingOverlay = true;
                setTimeout(function () {
                    this.filters = $.extend({}, filters);
                    $("#catalog-filters").find("select[name]").each(function () {
                        $(this).val('').trigger("change");
                    });

                    this.$dispatch('resetList');
                }.bind(this), 0);

                setTimeout(function () {
                    this.loadingOverlay = false;
                }.bind(this), 1000)
            },
            getByName(prop) {
                let props = [];
                for (let i = 0; i < this.cardList.length; i++) {
                    if (props.indexOf(this.cardList[i][prop].name) === -1) {
                        props.push(this.cardList[i][prop].name)
                    }
                }

                return props;
            },
            getModels: function () {
                let list = this.cardList;
                if (this.filters['model'] !== null) {
                    list = cardListInit;
                }

                let marks = {};
                for (let i = 0; i < list.length; i++) {
                    marks[list[i].mark.name] = marks[list[i].mark.name] || [];
                    if (marks[list[i].mark.name].indexOf(list[i].model.name) === -1) {
                        marks[list[i].mark.name].push(list[i].model.name)
                    }
                }
                return marks;
            },
            rangeFrom: function (prop) {
                let step = (prop === "price" ? 1000 : 1);
                let min = Math.floor(Math.min.apply(Math, cardListInit.map(function(i){ return i[prop] })) / step) * step,
                    max = Math.ceil(Math.max.apply(Math, this.cardList.map(function(i){ return i[prop] })) / step) * step;

                let selected = this.filters[prop + '-to'];
                if (selected && parseInt(selected) > max) {
                    max = parseInt(selected);
                }

                console.info(prop, min, max, step);
                let range = [];
                for (let i = min; i < max; i += step) {
                    range.push(i)
                }

                return range;
            },

            rangeTo: function (prop) {
                let step = (prop === "price" ? 1000 : 1);
                let min = Math.floor(Math.min.apply(Math, this.cardList.map(function(i){ return i[prop] })) / step) * step,
                    max = Math.ceil(Math.max.apply(Math, cardListInit.map(function(i){ return i[prop] })) / step) * step;

                let selected = this.filters[prop + '-from'];
                if (selected && parseInt(selected) < min) {
                    min = parseInt(selected);
                }

                let range = [];
                for (let i = min + step; i <= max; i += step) {
                    range.push(i)
                }

                return range;
            },
        }
    }
</script>

<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-offset-1 col-md-offset-1 col-lg-11 col-md-11 breadcrumbs">
                <a href="" class="back">
                    <span></span>Назад
                </a>
            </div>
            <div id="catalog-filters" class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10 col-sm-12 col-xs-12 catalog">
                <div v-show="loadingOverlay" class="loading-overlay"></div>
                <h2>Купить</h2>
                <div class="row catalog-filter-group">
                    <div class="col-lg-5 col-md-5 col-sm-10 col-xs-12 xs-margin-top">
                        <label for="model">Модель</label>
                        <select class="dropdown multiple" id="model" name="model" data-dropdown-options='{"label":"Модель"}'>
                            <option value="null">Модель</option>
                            <template v-for="(mark, models) in getModels()">
                                <option :value="models" v-bind:class="optgroupClass">{{mark}}</option>
                                <option v-for="model in models" :value="model">{{model}}</option>
                            </template>
                        </select>
                    </div>
                    <div class="catalog-clear-box-sm hidden-lg hidden-md hidden-xs"></div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 xs-margin-top">
                        <label for="yearFrom">Год</label>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <select id="yearFrom" name="year-from" data-dropdown-options='{"label":"От"}'>
                                    <option value="null">От</option>
                                    <option v-for="year in rangeFrom(`year`) | orderBy +1" :value="year">{{year}}</option>
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <select id="yearTo" name="year-to" data-dropdown-options='{"label":"До"}'>
                                    <option value="null">До</option>
                                    <option v-for="year in rangeTo('year') | orderBy -1" :value="year">{{year}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 xs-margin-top">
                        <label for="priceFrom">Цена</label>
                        <select id="priceFrom" name="price-from" data-dropdown-options='{"label":"От"}'>
                            <option value="null">От</option>
                            <option v-for="price in rangeFrom('price') | orderBy +1" :value="price">{{price}}</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 no-label">
                        <select id="priceTo" name="price-to" data-dropdown-options='{"label":"До"}'>
                            <option value="null">До</option>
                            <option v-for="price in rangeTo('price') | orderBy -1" :value="price">{{price}}</option>
                        </select>
                    </div>
                </div>

                <div v-show="allFilters" class="row catalog-filter-group">
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 xs-margin-top">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-3 col-xs-12">
                                <label>Кузов</label>
                                <select id="body" name="body" data-dropdown-options='{"label":"Любой"}'>
                                    <option value="null">Любой</option>
                                    <option v-for="body in getByName('body')" :value="body">{{body}}</option>
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-3 col-xs-12">
                                <label>Двигатель</label>
                                <select id="fuel" name="fuel" data-dropdown-options='{"label":"Любой"}'>
                                    <option value="null">Любой</option>
                                    <option v-for="fuel in getByName('fuel')" :value="fuel">{{fuel}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="catalog-clear-box-sm hidden-lg hidden-md hidden-xs"></div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 xs-margin-top">
                        <label>Коробка</label>
                            <select id="transmission" name="transmission" data-dropdown-options='{"label":"Любая"}'>
                                <option value="null">Любой</option>
                                <option v-for="transmission in getByName('transmission')" :value="transmission">{{transmission}}</option>
                            </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 xs-margin-top">
                        <label>Привод</label>
                        <select id="drive" name="drive" data-dropdown-options='{"label":"Любой"}'>
                            <option value="null">Любой</option>
                            <option v-for="drive in getByName('drive')" :value="drive">{{drive}}</option>
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