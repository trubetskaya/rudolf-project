window.onload = function () {
    var Vue = require('vue');
    var VueResource = require('vue-resource');
    var VueFilter = require('vue-filter');
    var Catalog = require('./components/Catalog.vue');

    Vue.use(VueResource);
    Vue.use(VueFilter);

    var vm = new Vue({
        el: 'body',
        components: {
            Catalog: Catalog
        },
        ready: function () {
            $("select").dropdown();
            $("[type=checkbox], [type=radio]")
                .checkbox();
        }
    });
};
