
require('./bootstrap');
window.Vue = require('vue');
Vue.component('like-component', require('./components/LikeComponent.vue').default);
Vue.component('dis-like-component', require('./components/DisLikeComponent.vue'));
const app = new Vue({
    el: '#hello',
});