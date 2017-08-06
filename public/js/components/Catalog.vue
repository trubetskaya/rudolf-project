<script>
    /*https://github.com/GitHubTochkaDev/pagination-tutorial*/
    var Pagination = require('./Pagination.vue');
    var Card = require('./Card.vue');
    var Filter = require('./Filter.vue');

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
            fetchCards: function(page) {
            }
        },
        created: function() {
            if ($(window).width() < 768) {
                this.allFilters = false;
            }
        }
    }
</script>
