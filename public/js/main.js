window.onload = function () {

    var Catalog = require('./components/Catalog.vue'),
        Services = require('./components/Services.vue');

    var VueResource = require('vue-resource'),
        VueFilter = require('vue-filter');

    var Vue = require('vue');
    Vue.use(VueResource);
    Vue.use(VueFilter);

    new Vue({
        el: 'body',
        components: {
            Catalog: Catalog,
            Services: Services
        },
        ready: function () {
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
