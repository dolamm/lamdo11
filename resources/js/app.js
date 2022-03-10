
require('./bootstrap');
window.Vue = require('vue').default;
Vue.component('like-component', require('./components/LikeComponent.vue').default);
Vue.component('dislike-component', require('./components/DislikeComponent.vue').default);
Vue.component('commentlike-component', require('./components/CommentLikeComponent.vue').default);
Vue.component('commentdislike-component', require('./components/CommentDislikeComponent.vue').default);

const app = new Vue({
    el: '#like-dislike-app'
});