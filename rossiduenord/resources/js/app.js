/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: Axios } = require("axios");

require("./bootstrap");

window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
    data: {
        showDati: false,
        showInterventi: false,
        showInterventi2: false,
        showState: true,
        showFees: false,
        showVariants: false,
        active: true,
    },

    methods: {
        showpage1() {
            this.showDati = true;
            this.showInterventi = false;
            this.showInterventi2 = false;
            this.showState = false;
            this.showFees = false;
            this.showVariants = false;
        },
        showpage2() {
            this.showDati = false;
            this.showInterventi = true;
            this.showInterventi2 = false;
            this.showState = false;
            this.showFees = false;
            this.showVariants = false;
        },
        showpage3() {
            this.showDati = false;
            this.showInterventi = false;
            this.showInterventi2 = true;
            this.showState = false;
            this.showFees = false;
            this.showVariants = false;
        },
        showpage4() {
            this.showDati = false;
            this.showInterventi = false;
            this.showInterventi2 = false;
            this.showState = true;
            this.showFees = false;
            this.showVariants = false;
        },
        showFeesPage() {
            this.showDati = false;
            this.showInterventi = false;
            this.showInterventi2 = false;
            this.showState = false;
            this.showFees = true;
            this.showVariants = false;
        },
        showVariantsPage() {
            this.showDati = false;
            this.showInterventi = false;
            this.showInterventi2 = false;
            this.showState = false;
            this.showFees = false;
            this.showVariants = true;
        },
    },
});
