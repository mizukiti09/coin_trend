/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./device_sp');
require('./fade');

import Vue from 'vue';
import axios from 'axios';



Vue.prototype.$axios = axios;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);


Vue.component('twitter-account', require('./components/TwitterAccountFollow.vue').default);
Vue.component('twitter-auto-follow-btn', require('./components/TwitterAutoFollowBtn.vue').default);
Vue.component('twitter-coin-trend', require('./components/TwitterCoinTrend.vue').default);
Vue.component('twitter-coin-trend-ranking', require('./components/TwitterCoinTrendRanking.vue').default);
Vue.component('twitter-coin-trend-each', require('./components/TwitterCoinTrendEach.vue').default);

Vue.component('google-news', require('./components/GoogleNews.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


// ハンバーガーメニュ 
$(".c-btn-open").on('click', function() {
    $(this).toggleClass('active');
    $(".c-nav").toggleClass('panelactive');
});