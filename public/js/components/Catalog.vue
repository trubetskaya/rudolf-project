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
                var yearFrom = parseInt(filterValues['year-from']);
                var yearTo = parseInt(filterValues['year-to']);
                var priceFrom = parseInt(filterValues['price-from']);
                var priceTo = parseInt(filterValues['price-to']);
                var model = filterValues['model'];
                var body = filterValues['body'];
                this.cardList = cardListInit;
                this.cardList = _.filter(this.cardList, function (item) {
                    return (yearFrom ? item.year >= yearFrom : true)
                        && (yearTo ? item.year <= yearTo : true)
                        && (priceFrom ? item.priceUSD >= priceFrom : true)
                        && (priceTo ? item.priceUSD <= priceTo : true)
                        && (model ? item.model.name == model : true)
                        && (body ? item.body.name == body : true);
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
