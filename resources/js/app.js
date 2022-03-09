
import './bootstrap';
window.Vue = require('vue').default;
Vue.component('like-component', require('./components/LikeComponent.vue').default);
Vue.component('dislike-component', require('./components/DislikeComponent.vue').default);

const app = new Vue({
    el: '#like-dislike-app'
});