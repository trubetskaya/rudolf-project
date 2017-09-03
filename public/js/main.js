let Navigation = require('./components/Navigation.vue'),
    Bid = require('./components/Bid.vue');

let Home = require('./components/Home.vue'),
    Catalog = require('./components/Catalog.vue'),
    Services = require('./components/Services.vue'),
    Company = require('./components/Company.vue'),
    Contacts = require('./components/Contacts.vue'),
    Sale = require('./components/Sale.vue');

let Vue = require('vue');
let VueResource = require('vue-resource'),
    VueFilter = require('vue-filter');

Vue.use(VueResource);
Vue.use(VueFilter);

let routes = {
    '/': Home,
    '/catalog': Catalog,

    '/sale': Sale,
    '/company': Company,
    '/contacts': Contacts,

    '/services': Services,
    '/services/credit': Services,
    '/services/expertise': Services,
    '/services/re-registration': Services,
};

new Vue({
    el: '#app',
    data: function() {
      return {
          currentRoute: window.location.pathname,
      };
    },
    components: {
        Navigation: Navigation,
        Bid: Bid,
    },
    computed: {
        currentView() {
            return routes[this.currentRoute];
        }
    },

});

$('.list-auto ul[role="tablist"] li:first-child').addClass('active');
$('.list-auto div[role="tabpanel"]:first-child').addClass('active');
$('#top-carousel').parent('div').addClass('content-holder');