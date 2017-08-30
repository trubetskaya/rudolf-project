const Catalog = require('./components/Catalog.vue');
const Navigation = require('./components/Navigation.vue'),
    Services = require('./components/Services.vue'),
    Bid = require('./components/Bid.vue');

var Vue = require('vue');
var VueResource = require('vue-resource'),
    VueFilter = require('vue-filter');

Vue.use(VueResource);
Vue.use(VueFilter);

var vm = new Vue({
    el: 'body',
    data: function() {
      return {
          currentRoute: window.location.pathname
      };
    },
    components: {
        Catalog: Catalog,
        Services: Services,
        Navigation: Navigation,
        Bid: Bid
    }
});

console.info(vm);