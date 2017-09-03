<script>
    module.exports = {
        name: 'app-navigation',
        created: function () {
            if (this.$route.path === '/') {
                $(window).scroll(function() {
                    let nav = $('nav');
                    $(this).scrollTop() > 580 ?
                        nav.removeClass('transparent') :
                        nav.addClass('transparent');
                }());
            }
        }
    }
</script>

<template>
    <nav class="navbar navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <router-link to="/" class="navbar-brand">
                    <img src="/img/header/logo.png" alt="Rudolf-autohaus"/>
                </router-link>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav" id="navbar-collapse">
                    <li v-for="link in this.$router.options.routes.slice(2)">
                        <router-link :to="link.href || link.path">{{ link.text }}</router-link>
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

<style lang="scss">
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0
    }
</style>
<style lang="scss" scoped>
    $gray:#555963;
    $gray-light:#e3e3e3;
    $white:#ffffff;
    $orange:#f76a3a;

    $screen-sm:768px;
    nav {
        &.transparent {
            background-color: transparent!important;
        }
        height: 70px;
        text-align: center;
        background-color: $gray!important;
        border-bottom: 2px solid rgba(255, 255, 255, 0.15)!important;
        .container {
            position: relative;
        }
        .navbar-header {
            @media (max-width: $screen-sm) {float: left;}
        }
        .navbar-brand {
            width: 73px;
            position: absolute;
            padding-top: 18px;
            img {
                width: 73px;
            }
            @media (max-width: $screen-sm) {
                float: left;
                position: static;
            }
        }
        .navbar-collapse {
            @media (max-width: $screen-sm) {
                position: fixed;
                background-color: #555963;
                width: 100%;
                height:120%;
                max-height: 100%!important;
                z-index: 1;
            }
            #navbar-collapse {
                z-index: 1;
                position: relative;
                display:inline-block;
                float: none;
                @media (max-width: $screen-sm) {
                    display: block;
                    padding-left: 24px;
                    padding-right: 24px;
                    max-height: none;
                }
                li {
                    &:first-child, &:last-child {
                        @media (max-width: $screen-sm) {
                            border-bottom: none;
                        }
                    }
                    @media (max-width: $screen-sm) {
                        &:hover, &:active, &:focus {
                            background: transparent;
                        }
                        border-bottom: solid 1px rgba(255,255,255, 0.1);
                    }
                    a {
                        color:$white;
                        line-height: 40px;
                        text-align: left;
                        font-size: 14px;
                        &.active {
                            color: orange;
                            text-decoration: none;
                        }
                        &:hover, &:focus {
                            background: transparent;
                        }
                        @media (max-width: $screen-sm) {
                            font-size: 16px;
                        }
                    }
                    &.dropdown {
                        a .caret {
                            float: right;
                            margin-top: 20px;
                            background: url("/img/header/ic-up-menu-mob-default.png") no-repeat;
                            background-size: 10px 5px;
                            border: 0;
                            width: 10px;
                            height: 5px;
                        }

                        &.open a .caret {
                            background: url("/img/header/ic-down-menu-mob-hover.png") no-repeat;
                            background-size: 10px 5px;
                            border: 0;
                            width: 10px;
                            height: 5px;
                        }
                        ul {
                            padding-bottom: 20px;
                            li {
                                border-bottom: none!important;
                                padding-bottom: 0;
                                a {
                                    line-height: 25px;
                                    padding-left: 15px;
                                    color: rgba(227, 227, 227, 0.5);
                                    &:hover, &:focus {
                                        background: transparent;
                                    }
                                }
                            }
                        }
                    }
                    &.dropdown-close-button {
                        @media (min-width: $screen-sm) {
                            display: none;
                        }
                        height: 120px;
                        width: 100%;
                        button {
                            background: url("/img/header/ic-close-default.png") no-repeat;
                            background-size: 34px 34px;
                            width: 34px;
                            height: 34px;
                            position: absolute;
                            top: 23px;
                            right: 0;
                            opacity: 1;
                        }
                    }
                }
            }
        }
        .navbar-right {
            position:absolute;
            right: 0;
            top: 0;
            margin-right: 15px;
            @media (max-width: $screen-sm) {
                float: right;
                position: static;
                padding: 0;
                margin: 16px 22px 0 0;
            }
            li a {
                color:$white;
                line-height: 40px;
                @media (max-width: $screen-sm) {
                    padding: 0;
                    margin: 0;
                }
                &.active {
                    color: orange;
                }
                &:hover, &:focus {
                    background: transparent;
                    text-decoration: underline;
                }
            }
            li.navbar-right-delimeter {
                margin-top: 24px;
                padding: 0;
                height: 21px;
                opacity: 0.25;
                border-left: solid 1px #ffffff;
                padding-left:17px;
            }
            li.navbar-right-telephone {
                padding-right: 17px;
                padding-left: 34px;
                background: url("/img/header/ic-phone.png") no-repeat 26px;
            }
        }
        .navbar-toggle {
            float: right;
            padding: 10px 6px;
            margin: 19px 0 0 0;
            background-color: $orange;
            .icon-bar {
                &:first-child {
                    margin-top: 0;
                }
                background-color: $white;
                border-color: $white;
                margin-top: 5px;
                width: 22px;
            }
        }
    }
</style>
