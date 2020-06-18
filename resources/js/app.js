require('./bootstrap');

Vue.component('products-list', require('./components/ProductsList.vue'));
Vue.component('cart-dropdown', require('./components/Cart.vue'));


import store from './store.js';

const app = new Vue({
    el: '#app',

    store: new Vuex.Store(store)
});

const newapp = new Vue({
    el: '#newapp',

    store: new Vuex.Store(store)
});
