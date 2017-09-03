let AppFooter = require('./components/Footer.vue'),
    Navigation = require('./components/Navigation.vue'),
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
          showContent: false,
          currentRoute: window.location.pathname,
          app: {
              content: "app-content",
              footer: "app-footer"
          }
      };
    },
    components: {
        AppFooter: AppFooter,
        Navigation: Navigation,
        Bid: Bid,
    },
    computed: {
        currentView() {
            this.showContent = false;
            return routes[this.currentRoute];
        }
    },
    mounted: function () {
        console.info('mounted');
        let interval = function () {
            this.showContent = true;
            setTimeout(interval.bind(this), 300);
        };
        setTimeout(interval.bind(this), 300);
    }
});

// $('.list-auto ul[role="tablist"] li:first-child').addClass('active');
// $('.list-auto div[role="tabpanel"]:first-child').addClass('active');
// $('#top-carousel').parent('div').addClass('content-holder');