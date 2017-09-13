<template>
<div>
    <div class="container" id="filters">
        <div class="row">
            <div class="col-lg-offset-1 col-md-offset-1 col-lg-11 col-md-11 breadcrumbs">
                <a href="#" @click="$router.go(-1)" class="back"><span></span>Назад</a>
            </div>
            <div id="catalog-filters" class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10 col-sm-12 col-xs-12 catalog">
                <div v-show="loadingOverlay" class="loading-overlay"></div>
                <h2>Купить</h2>
                <div class="row catalog-filter-group">
                    <div class="col-lg-5 col-md-5 col-sm-10 col-xs-12 xs-margin-top">
                        <label for="model">Модель</label>
                        <select class="form-control" id="model" name="model" data-dropdown-options='{"label":"Любая"}'>
                            <option :value="null">Модель</option>
                            <template v-for="(models, mark) in getModels()">
                                <option :value="models" :class="'optgroup'">{{mark}}</option>
                                <option v-for="model in models" :value="model">&nbsp;&nbsp;{{model}}</option>
                            </template>
                        </select>
                    </div>
                    <div class="catalog-clear-box-sm hidden-lg hidden-md hidden-xs"></div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 xs-margin-top">
                        <label>Год</label>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <select id="yearFrom" name="year-from" class="form-control" data-dropdown-options='{"label":"От"}'>
                                    <option :value="null">От</option>
                                    <option v-for="year in rangeFrom('year')" :value="year">{{year}}</option>
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <select class="form-control"  id="yearTo" name="year-to" data-dropdown-options='{"label":"До"}'>
                                    <option :value="null">До</option>
                                    <option v-for="year in rangeTo('year')" :value="year">{{year}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 xs-margin-top">
                        <label>Цена</label>
                        <select class="form-control"  id="priceFrom" name="price-from" data-dropdown-options='{"label":"От"}'>
                            <option :value="null">От</option>
                            <option v-for="price in rangeFrom('price')" :value="price">{{price}}</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6 no-label">
                        <select class="form-control"  id="priceTo" name="price-to" data-dropdown-options='{"label":"До"}'>
                            <option :value="null">До</option>
                            <option v-for="price in rangeTo('price')" :value="price">{{price}}</option>
                        </select>
                    </div>
                </div>

                <div v-show="allFilters" class="row catalog-filter-group">
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 xs-margin-top">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-3 col-xs-12">
                                <label for="body">Кузов</label>
                                <select class="form-control"  id="body" name="body" data-dropdown-options='{"label":"Любой"}'>
                                    <option :value="null">Любой</option>
                                    <option v-for="body in getByName('body')" :value="body">{{body}}</option>
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-3 col-xs-12">
                                <label for="fuel">Двигатель</label>
                                <select class="form-control"  id="fuel" name="fuel" data-dropdown-options='{"label":"Любой"}'>
                                    <option :value="null">Любой</option>
                                    <option v-for="fuel in getByName('fuel')" :value="fuel">{{fuel}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="catalog-clear-box-sm hidden-lg hidden-md hidden-xs"></div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 xs-margin-top">
                        <label>Коробка</label>
                        <select class="form-control" id="transmission" name="transmission" data-dropdown-options='{"label":"Любая"}'>
                            <option :value="null">Любой</option>
                            <option v-for="transmission in getByName('transmission')" :value="transmission">{{transmission}}</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 xs-margin-top">
                        <label>Привод</label>
                        <select class="form-control"  id="drive" name="drive" data-dropdown-options='{"label":"Любой"}'>
                            <option :value="null">Любой</option>
                            <option v-for="drive in getByName('drive')" :value="drive">{{drive}}</option>
                        </select>
                    </div>
                </div>
                <div class="row catalog-filter-group-checkboxes">
                    <div v-show="allFilters" class="col-lg-5 col-md-5 col-sm-7 col-xs-12 xs-margin-top">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <input value="sales" type="checkbox" class="tags" name="tags">
                                <label>Со скидкой</label>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <input value="new" type="checkbox" class="tags" name="tags">
                                <label>Новые</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-5 col-xs-12 xs-margin-top">
                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-sm-6 hidden-xs"></div>
                            <div class="hidden-lg hidden-md hidden-sm col-xs-6">
                                <a href="javascript:" class="catalog-hide-filters"
                                   :class="allFilters ? '' : 'collapsed'"
                                   @click="allFilters=!allFilters">
                                    {{allFilters ? 'Скрыть фильтры' : 'Все фильтры'}}
                                </a>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6">
                                <a class="catalog-drop-filters" href="javascript:"
                                   @click="resetList()">
                                    Сбросить фильтры
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grey-light-block offers-grid-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-md-5 col-sm-8 col-xs-12 col-md-offset-1 catalog-offers-grid-block-title">
                    Каталог легковых автомобилей
                    <p>найдено автомобилей: {{ cardList.length }}</p>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12 catalog-offers-grid-block-filter">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-2 hidden-xs">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-12">
                            <select class="form-control" name="sort-cards" id="sorting">
                                <option value="">Сортировать...</option>
                                <option value="updated">По дате добавления</option>
                                <option value="price">По цене</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-sm-12 col-xs-12 col-md-offset-1">
                    <div v-if="cardList.length > 0" class="row">
                        <card
                                v-for="item in cardList"
                                :card="item"
                                :key="item.id">
                        </card>
                    </div>
                    <div v-else>
                        <div сlass="row">
                            <p class="catalog-no-result">
                                Поиск не дал результов.
                            </p>
                        </div>
                    </div>
                    <pagination
                            v-if="totalCards > 12"
                            :current="currentPage"
                            :total="totalCards"
                            :perPage="perPage"
                            @page-changed="fetchCards"
                    ></pagination>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    let Card = require('./Card.vue'),
        Pagination = require('./Pagination.vue');

    let emptyFilter = {model:null, category:null, transmission:null, body:null, drive:null, fuel:null, tags:[],
        'year-from':null, 'year-to':null, 'price-from':null, 'price-to':null};

    module.exports = {
        data() {
            return {
                perPage: 12,
                totalCards: 0,
                currentPage: 1,

                allFilters: true,
                loadingOverlay : false,

                cardList: cardListInit,
                filters : emptyFilter
            }
        },

        watch: {
            loadingOverlay: function (show) {
                if (show === false) return;

                this.filterList();
                setTimeout(function () {
                    this.loadingOverlay = false;
                }.bind(this), 500);
            }
        },
        
        methods: {
            getModels() {
                let marks = {}, list = cardListInit;
                for (let i = 0; i < list.length; i++) {
                    marks[list[i].mark] = marks[list[i].mark] || [];
                    if (marks[list[i].mark].indexOf(list[i].model) === -1) {
                        marks[list[i].mark].push(list[i].model)
                    }
                }
                return marks;
            },
            getByName(prop) {
                let props = [], list = cardListInit;
                for (let i = 0; i < list.length; i++) {
                    if (props.indexOf(list[i][prop]) === -1) {
                        props.push(list[i][prop])
                    }
                }

                return props;
            },
            rangeFrom(prop) {
                let step = (prop === "price" ? 1000 : 1);
                let min = Math.floor(Math.min.apply(Math, cardListInit.map(function(i){ return i[prop] })) / step) * step,
                    max = Math.ceil(Math.max.apply(Math, this.cardList.map(function(i){ return i[prop] })) / step) * step;

                let selected = this.filters[prop + '-to'];
                if (selected && parseInt(selected) > max) {
                    max = parseInt(selected);
                }

                let range = [];
                for (let i = min; i <= max; i += step) {
                    range.push(i)
                }

                return range;
            },
            rangeTo(prop) {
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

                return range.reverse();
            },

            onFiltersChange(e) {
                let v = e.target.value!==''?e.target.value:null;
                if (v && e.target.name === "model") v = v.split(',');
                if (v && e.target.name === "tags") v = $.makeArray($('[name="tags"]:checked')
                    .map(function(_,i){ return i.value }));

                this.filters[e.target.name] = v;
                this.loadingOverlay = true;
            },
            onSortingChange(e) {
                let v = e.target.value;
                let cpm = v === 'updated' ? function(a,b) { return new Date(a[v]).getTime() < new Date(b[v]).getTime() ? -1 : 1 } :
                    function(a,b) { return a[v] < b[v] ? -1 : 1 };
                this.cardList.sort(cpm);
            },

            filterList() {

                this.filters.category = null;
                if (this.$route.query.category) {
                    this.filters.category = this.$route.query.category;
                }

                let params = this.filters;
                let yearFrom = parseInt(this.filters['year-from']),
                    yearTo = parseInt(this.filters['year-to']);

                let priceFrom = parseInt(this.filters['price-from']),
                    priceTo = parseInt(this.filters['price-to']);

                this.cardList = cardListInit.filter(function (i) {
                    return (params.model ? params.model.indexOf(i.model) !== -1 : true)
                        && (params.category ? params.category === i.category.name : true)
                        && (yearFrom ? i.year >= yearFrom : true) && (yearTo ? i.year <= yearTo : true)
                        && (priceFrom ? i.price >= priceFrom : true) && (priceTo ? i.price <= priceTo : true)
                        && (params.tags.length > 0 ? (params.tags.filter(function (e) { return i.tags[e] }).length === params.tags.length) : true)
                        && (params.transmission ? params.transmission === i.transmission : true)
                        && (params.drive ? params.drive === i.drive : true)
                        && (params.body ? params.body === i.body : true)
                        && (params.fuel ? params.fuel === i.fuel : true)
                });
            },
            resetList() {
                $("#filters select").val(null).trigger("change");
                $("input[type=checkbox]").removeAttr('checked')
                    .removeProp('checked')
                    .trigger("change");
            }
        },

        components: {
            Card: Card,
            Pagination: Pagination,
        },
        
        mounted() {
            $("select#sorting").on("change", this.onSortingChange);
            $("div#filters").find("select, input[type='checkbox']")
                .on("change", this.onFiltersChange);
        },

        beforeRouteEnter(to, _, next) {
            next(vm => {
                let models = $("select#model");
                $('option.optgroup', models).each(function () {
                    if (this.innerHTML === to.query.mark) {
                        $(this).attr('selected', true).prop('selected', true);
                        return $(this).parent().trigger('change')
                    }
                });
            });
        },
    }
</script>

<style lang="scss">
    $black: #2d2a2a;

    .breadcrumbs {
        margin-top: 36px;
        margin-bottom: 3px;
        .back {
            span {
                background: url("/img/bg-collections/ic-down-bold-default.png") no-repeat;
                transform: rotate(90deg);
                width: 12px;
                height: 8px;
                display: inline-block;
                padding-right: 7px;
            }

            opacity: 0.5;
            font-size: 12px;
            font-weight: 900;
            line-height: 1.42;
            letter-spacing: 1px;
            text-align: left;
            color: #2d2a2a;
            text-transform: uppercase;
        }
    }
</style>
<style lang="scss" scoped>
    $gray:#555963;
    $gray-light:#e3e3e3;
    $white:#ffffff;
    $orange:#f76a3a;
    $black: #2d2a2a;

    $screen-sm:768px;

    .catalog {
        @media (max-width: $screen-sm) {
            padding-bottom: 62px;
        }
        .catalog-filter-group {
            margin-bottom: 22px;
            @media (max-width: $screen-sm) {
                margin-bottom: 0;
                max-width: 500px;
            }
        }
        .xs-margin-top {
            @media (max-width: $screen-sm) {
                margin-top: 12px;
            }
        }
        .catalog-filter-group-checkboxes {
            margin-top: 32px;
            margin-bottom: 53px;
            @media (max-width: $screen-sm) {
                max-width: 500px;
                margin-top: 0;
                margin-bottom: 0;
            }
            .col-xs-12 .row {
                @media (max-width: $screen-sm) {
                    white-space: nowrap;
                }
            }
            label {
                line-height: 1.79;
            }
        }
        .catalog-clear-box-sm {
            height: 22px;
            width: 100%;
            float: left;
        }
        label {
            min-width: 1px;
            line-height: 25px;
            height: 25px;
            font-size: 14px;
            text-align: left;
            color: #797979;
            font-weight: normal;
            margin-bottom: 3px;
        }
        .no-label{
            margin-top: 28px;
            @media (max-width: $screen-sm) {
                margin-top: 40px;
            }
        }
        .catalog-hide-filters {
            display: inline-block;
            padding: 0 0 1px 35px;
            background: url("/img/icons/ic-filter-defoult.png") no-repeat;
            font-size: 14px;
            line-height: 22px;
            text-align: left;
            color: $black;
            white-space: nowrap;
            text-decoration: none;
            &:hover, &.collapsed {
                background: url("/img/icons/ic-filter-hover.png") no-repeat;
                text-decoration: none;
            }
        }
        .catalog-drop-filters {
            position: relative;
            top:-3px;
            display: inline-block;
            padding: 2px 0 0 35px;
            background: url("/img/icons/ic-error-default.png") no-repeat;
            font-size: 14px;
            line-height: 24px;
            text-align: left;
            color: #797979;
            white-space: nowrap;
            &:hover, &:active, &:focus, &.hidden {
                color: $black;
                text-decoration: none;
            }
        }
    }

    .offers-grid-block {
        .catalog-offers-grid-block-title {
            font-size: 24px;
            font-weight: 600;
            line-height: 42px;
            text-align: left;
            color: $black;
            margin-bottom: 40px;
            @media (max-width: $screen-sm) {
                margin-bottom: 10px;
            }
            p {
                position: relative;
                top:-7px;
                font-size: 18px;
                font-weight: 600;
                text-align: left;
                color: #7a7a7a;
                margin-bottom: 0;

            }
        }

        .catalog-offers-grid-block-filter{
            @media (max-width: $screen-sm) {
                max-width: 400px;
                margin-bottom: 39px;
            }
        }
    }

    .rudolf-pagination {
        list-style: none;
        padding: 0;
        margin: 20px 0 0 0;
        li {
            float: left;
            margin-right: 10px;
            &.active a {
                color: #f76a3a;
            }
            a {
                font-size: 16px;
                font-weight: 900;
                line-height: 1.25;
                letter-spacing: 0.5px;
                text-align: left;
                color: #797979;
                &:hover, &:active, &:focus {
                    text-decoration: underline;
                }
            }
            &.prev {
                background: url("/img/icons/ic-left-big-default.png") no-repeat;
                background-size: 32px;
                width: 32px;
                height: 32px;
                display: inline-block;
                line-height: 32px;
                position: relative;
                top: -7px;
            }
            &.next {
                background: url("/img/icons/ic-right-big-default.png") no-repeat;
                background-size: 32px;
                width: 32px;
                height: 32px;
                display: inline-block;
                line-height: 32px;
                position: relative;
                top: -7px;
            }
        }
    }

    .loading-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 10;
        opacity: 0.5;
        background: url("/img/icons/loading.gif") no-repeat;
        background-color: white;
        background-size: 30px 30px;
        background-position: center;
    }

    .catalog-no-result {
        font-size: 18px;
        font-weight: 600;
        text-align: left;
        color: #a8a8a8;
        margin-bottom: 0;
    }

    select.form-control {
        color: #797979;
        height: 42px;
        border-radius: 4px;
        border: solid 1px #e3e3e3;
        box-shadow: none;
        font-size: 16px;
        text-align: left;
        background-repeat: no-repeat;
        background-image: url(/img/auto-list/ic-down-bold-default.png);
        background-position-x: calc(100% - 8px);
        background-position-y: 17px;
        background-size: 12px 8px;
        -webkit-appearance: none;
        -moz-appearance: none;
        text-indent: 1px;
        text-overflow: '';

        &::-ms-expand {
            display: none !important;
        }

        > option {
            letter-spacing: normal;

            &.optgroup {
                color: $black;
                font-weight: 600;

            }

            &:hover {
                background-color: #EEEEEE;
            }
        }
    }

</style>
