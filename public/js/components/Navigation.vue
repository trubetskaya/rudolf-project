<script>
    const Home = require('./Home.vue'),
        Catalog = require('./Catalog.vue');

    module.exports = {
        data: function () {
            return {
                links: store.nav
            };
        },
        methods: {
            getActive (link) {
                return link.href === this.$root.currentRoute ? 'active' : false },
            getDropdown (link) { return $(window).innerWidth() <= 768 && link.dropdown ? 'dropdown' : false },
            route(link) { this.$root.currentRoute = link; }
        },
        ready: function () {
            if (this.$root.currentRoute === '/') {
                $(window).scroll(function() {
                    let nav = $('nav');
                    $(this).scrollTop() > 580 ?
                        nav.removeClass('transparent') :
                        nav.addClass('transparent');
                });
            }
        }
    }
</script>

<template>
    <nav class="navbar navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="javascript:;" @click="route('/')">
                    <img src="/img/header/logo.png" alt="Rudolf-autohaus"/>
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav" id="navbar-collapse">
                    <li class="dropdown-close-button">
                        <button type="button" class="close" data-toggle="collapse"
                                data-target=".navbar-collapse">&nbsp;</button>
                    </li>
                    <li v-for="link in links" :class="getDropdown(link)">
                        <a @click="route(link.href)" href="javascript:;" :class="getDropdown(link) + '-toggle ' + getActive(link)"
                           :data-toggle="getDropdown(link)">
                            {{ link.text }}
                            <b v-if="getDropdown(link)" class="caret"></b>
                        </a>
                        <ul v-if="getDropdown(link)" class="dropdown-menu">
                            <li v-for="sub in link.dropdown">
                                <a :href="sub.href" target="_blank">{{ sub.text }}</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <ul class="nav navbar-nav navbar-right">
                <li class="navbar-right-telephone hidden-sm hidden-xs">
                    <a href="tel:+380673951515">+38 067-395-15-15</a>
                </li>
                <li class="navbar-right-delimeter hidden-sm hidden-xs"></li>
                <li><a href="#"><img src="/img/header/gear.png" width="30" height="30"></a></li>
            </ul>
        </div>
    </nav>
</template>
