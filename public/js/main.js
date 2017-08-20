window.onload = function () {
    var Vue = require('vue');
    var VueResource = require('vue-resource');
    var VueFilter = require('vue-filter');
    var Catalog = require('./components/Catalog.vue');
    var Services = require('./components/Services.vue');

    Vue.use(VueResource);
    Vue.use(VueFilter);

    var vm = new Vue({
        el: 'body',
        components: {
            Catalog: Catalog,
            Services: Services
        },
        ready: function () {
            $("select").dropdown();
            $("[type=checkbox], [type=radio]")
                .checkbox();

            /**
             * Управление прозрачностью зафиксированного навигационного меню
             * если это необходимо
             */
            if ($('nav').data('transparent')) {
                if ($(window).scrollTop() > (650 -70)) {
                    $('nav').removeClass('transparent');
                }
                $(window).scroll(function() {
                    if ($(window).scrollTop() > (650 -70)) {
                        $('nav').removeClass('transparent');
                    } else {
                        $('nav').addClass('transparent');
                    }
                });
            }
        }
    });
};
