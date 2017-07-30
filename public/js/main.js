window.onload = function () {
    var Vue = require('vue');
    var VueResource = require('vue-resource');
    var Catalog = require('./components/Catalog.vue');

    Vue.use(VueResource);

    new Vue({
        el: 'body',
        components: {
            Catalog: Catalog,
        }
    });
};
