<script>
    /*https://github.com/GitHubTochkaDev/pagination-tutorial*/
    var Pagination = require('./Pagination.vue');
    var Card = require('./Card.vue');
    var Filter = require('./Filter.vue');

    var _ = require('lodash');

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
            Pagination: Pagination,
            Card: Card,
            Filter: Filter,
        },
        methods: {
            onFilter(filterValues) {
                var yearFrom = filterValues['year-from'];
                var yearTo = filterValues['year-to'];
                var priceFrom = filterValues['price-from'];
                var priceTo = filterValues['price-to'];
                this.cardList = cardListInit;
                this.cardList = _.filter(this.cardList, function (item) {
                    return (yearFrom ? item.year >= yearFrom : true)
                        && (yearTo ? item.year <= yearTo : true)
                        && (priceFrom ? item.priceUSD >= priceFrom : true)
                        && (priceTo ? item.priceUSD <= priceTo : true);
                });

                this.$nextTick(function() {
                    $("select").dropdown('update');
                });
            },
            onReset() {
                this.cardList = cardListInit;
                this.$nextTick(function() {
                    $("select").dropdown('update');
                });
            }
        },
        created: function() {
            if ($(window).width() < 768) {
                this.allFilters = false;
            }
        },
        events: {
            'filterList' : 'onFilter',
            'resetList' : 'onReset',
        }
    }
</script>
