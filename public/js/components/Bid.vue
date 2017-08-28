<script>
    module.exports = {
        data: function () {
            return {
                name: '',
                phone: '',
                city: '',
                email: '',
                comment: '',
            }
        },
        ready() {
            $('#bid-success').on('hidden.bs.modal', function () {
                $('body').css('padding-right', 0);
            })
        },
        methods: {
            submit() {
                this.$http.post('/bid', {
                    name: this.name,
                    phone: this.phone,
                    city: this.city,
                    email: this.email,
                    comment: this.comment,
                }).then(function(responce) {
                    $('#bid').modal('hide');
                    $('#bid-success').modal('show');
                });
            }
        },
    }
</script>
