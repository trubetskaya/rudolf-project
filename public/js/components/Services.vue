<script>
module.exports = {
    props: {
        section: {
            type: String,
            default: 'credit'
        },
    },
    ready() {
        $('.' + this.section).addClass('in active');
    }
}
</script>
