<script>
    /*https://github.com/GitHubTochkaDev/pagination-tutorial*/
    var Pagination = require('./Pagination.vue');

    module.exports = {
        data: function () {
            return {
                totalCards: 0,
                perPage: 12,
                currentPage: 1,
                allFilters: true,
            }
        },
        components: {
            Pagination: Pagination,
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
