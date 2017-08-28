<script>

var Bid = require('./Bid.vue');

module.exports = {
    props: {
        section: {
            type: String,
            default: 'credit'
        },
    },
    ready() {
        $('.' + this.section).addClass('in active');
    },
    components: {
        Bid: Bid,
    },
}
</script>
