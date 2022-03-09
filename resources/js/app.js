
import './bootstrap';
window.Vue = require('vue').default;
Vue.component('like-component', require('./components/LikeComponent.vue').default);
Vue.component('dis-like-component', require('./components/DisLikeComponent.vue').default);
const app = new Vue({
    el: '#hello',
});