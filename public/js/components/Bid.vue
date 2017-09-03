<template>
    <!-- Modal -->
    <div>
        <div id="bid" class="rudolf-modal modal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" @click="$emit('close')"></button>
                    <div class="modal-header">
                        Заявка менеджеру
                    </div>
                    <div class="modal-body">
                        <div class="bid-form-title">Ваши контакты</div>
                        <form>
                            <div class="row">
                                <div class="bid-form-row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="bid-form-row-each col-lg-4 col-md-4">
                                            <label>Имя</label>
                                            <input type="text" v-model="name">
                                        </div>
                                        <div class="bid-form-row-each col-lg-4 col-md-4">
                                            <label>Контактный телефон</label>
                                            <input type="text" v-model="phone">
                                        </div>
                                        <div class="bid-form-row-each col-lg-4 col-md-4">
                                            <label>Город</label>
                                            <input type="text" v-model="city">
                                        </div>
                                    </div>
                                </div>
                                <div class="bid-form-row-each bid-form-row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8">
                                            <label>Желаемый автомобиль</label>
                                            <input type="text" v-model="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="bid-form-row-each bid-form-row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label>Комментарий</label>
                                    <textarea v-model="comment">

                            </textarea>
                                </div>
                                <button type="button" class="orange-button" @click="submit()">
                                    Оправить заявку
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div id="bid-success" class="rudolf-modal modal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal"></button>
                    <div class="modal-header">
                        Заявка принята
                    </div>
                    <div class="modal-body">
                        <div class="bid-form-title">Менеджер свяжется с Вами в ближайшее время.</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    module.exports = {
        name: 'bid',
        data: function () {
            return {
                name: '',
                phone: '',
                city: '',
                email: '',
                comment: ''
            }
        },
        created: function() {
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
