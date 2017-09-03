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

<style lang="scss" scoped>
    $screen-sm:768px;
    body.modal-open {
        padding-right: 0px!important;
        overflow: visible!important;
    }

    .rudolf-modal{
        .modal-dialog {
            width: 750px;
            @media (max-width: $screen-sm) {
            width: calc(100% - 20px);
        }
            .modal-content{
                background: white;
                border-radius: 0;
                border: none;
                padding: 40px 53px;
                .close{
                    background: url("/img/header/ic-close-default.png") no-repeat;
                    background-size: 34px 34px;
                    width: 34px;
                    height: 34px;
                    position: absolute;
                    opacity: 1;
                    top: 21px;
                    right: 21px;
                    @media (max-width: $screen-sm) {
                    background-size: 25px 25px;
                    width: 25px;
                    height: 25px;
                }
            }
                .modal-header {
                    font-size: 36px;
                    font-weight: 600;
                    line-height: 1.39;
                    color: #2d2a2a;
                    text-align: center;
                    border: none;
                    margin-bottom: 18px;
                    padding: 0;
                    @media (max-width: $screen-sm) {
                    font-size: 25px;
                    margin-bottom: 0;
                }
            }
                .modal-body {
                    .bid-form-title {
                        height: 50px;
                        font-size: 18px;
                        font-weight: 600;
                        line-height: 2.78;
                        text-align: left;
                        color: #2d2a2a;
                        margin-bottom: 3px;
                }
                    .bid-form-row {
                        @media (max-width: $screen-sm) {
                        margin-bottom: 0;
                    }
                        margin-bottom: 22px;
                }
                    .bid-form-row-each {
                        @media (max-width: $screen-sm) {
                        margin-bottom: 22px;
                    }
                }
                    button {
                        float: right;
                        margin-right: 15px;
                }
            }
        }
    }
}
</style>
