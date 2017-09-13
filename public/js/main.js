Array.prototype.partition = function (num, count) {
    let p = Math.ceil(this.length/count);
    return this.slice(p*(num-1), p*num);
};

let AppFooter = require('./components/Footer.vue'),
    Navigation = require('./components/Navigation.vue'),
    Bid = require('./components/Bid.vue');

let Vue = require('vue');
let VueRouter = require('vue-router'),
    VueResource = require('vue-resource'),
    VueFilter = require('vue-filter');

Vue.use(VueRouter);
Vue.use(VueResource);
Vue.use(VueFilter);

let routes = store.nav;
routes.home.component = require("./components/Home.vue");

routes.catalog.component = require("./components/Catalog.vue");
routes.company.component = require("./components/Company.vue");
routes.contacts.component = require("./components/Contacts.vue");

routes.sale.props = true;
routes.sale.href = routes.sale.path + "/buyout";
routes.sale.component = require("./components/Sale.vue");
routes.sale.path += "/:section";

routes.services.props = true;
routes.services.href = routes.services.path + "/credit";
routes.services.component = require("./components/Services.vue");
routes.services.path += "/:section";

routes.card.props = true;
routes.card.component = require("./components/CardFull.vue");
routes.card.path += "/:id";

let v = [];
for (let i in routes) {
    if (routes.hasOwnProperty(i)) {
        v.push(routes[i]);
    }
}

let router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'active',
    routes: v,
    scrollBehavior (to, _, savedPosition) {
        if (savedPosition) {
            return savedPosition
        } else {
            if (to.hash) {
                return {selector: to.hash}
            }
        }

        return {x:0, y:0};
    }
});

router.afterEach((to, from) => {
    document.title = to.meta.title + "::" + document.title.split("::").pop();
});

new Vue({
    el: '#app',
    router,
    components: {
        AppFooter: AppFooter,
        AppNavigation: Navigation,
        AppOrder: Bid,
    }
});