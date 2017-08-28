<script>
    /*https://github.com/GitHubTochkaDev/pagination-tutorial*/
    let Pagination = require('./Pagination.vue');
    let Card = require('./Card.vue');
    let Filter = require('./Filter.vue');

    let _ = require('lodash');

    module.exports = {
        data: function () {
            return {
                totalCards: 0,
                perPage: 12,
                currentPage: 1,
                allFilters: true,
                cardList: cardListInit,
            }
        },
        components: {
            Card: Card,
            Pagination: Pagination,
            Filter: Filter
        },
        ready() {
            $(".offers-grid-block select").dropdown().on("change", function(e) {
                if ($(e.target).val() == 'price') {
                    function compare(a,b) {
                        return (a.price < b.price) ? -1 : 1;
                    }
                    this.cardList.sort(compare);
                } else if ($(e.target).val() == 'updated') {
                    function compare(a,b) {
                        return new Date(a.updated).getTime() < new Date(b.updated).getTime() ? -1 : 1;
                    }
                    this.cardList.sort(compare);
                }
            }.bind(this));
        },
        methods: {
            onFilter(params) {
                let model = params['model'];
                if (typeof model === 'string') {
                    model = model.split(",");
                }

                let yearFrom = parseInt(params['year-from']),
                    yearTo = parseInt(params['year-to']);

                let priceFrom = parseInt(params['price-from']),
                    priceTo = parseInt(params['price-to']);

                let body = params['body'],
                    transmission = params['transmission'],
                    drive = params['drive'],
                    fuel = params['fuel'],
                    tags = params['tags'];

                this.cardList = cardListInit;

                this.cardList = _.filter(this.cardList, function (item) {
                    return (model ? model.indexOf(item.model.name) !== -1 : true)
                        && (yearFrom ? item.year >= yearFrom : true) && (yearTo ? item.year <= yearTo : true)
                        && (priceFrom ? item.priceUSD >= priceFrom : true) && (priceTo ? item.priceUSD <= priceTo : true)
                        && (transmission ? item.transmission.name === transmission : true)
                        && (drive ? item.drive.name === drive : true)
                        && (body ? item.body.name === body : true)
                        && (fuel ? item.fuel.name === fuel : true)
                        && (tags.length > 0 ?
                            (_.filter(item.tags, function (elem) {
                                return tags.indexOf(elem.id) > -1;
                            }).length == tags.length)
                            : true)
                        ;
                });

                this.$nextTick(this.dropdownUpdate);
            },
            onReset() {
                this.cardList = cardListInit;
                this.$nextTick(this.dropdownUpdate);
            },
            dropdownUpdate() {
                $("select").dropdown('update');
                $("#model-dropdown").find(".fs-scrollbar-content").find("button").each(function(i, option) {
                    if ($(option).data('value') && $(option).data('value') != option.innerHTML) {
                        $(option).addClass('optiongroup');
                    }
                });
            }
        },
        created: function() {
            if ($(window).width() < 768) {
                this.allFilters = false;
            }
        },
        events: {
            filterList : 'onFilter',
            dropdownUpdate: 'dropdownUpdate',
            resetList : 'onReset',
        }
    }
</script>
