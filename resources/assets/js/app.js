require('./bootstrap');
window.Vue = require('vue');
// Common
import Multiselect from 'vue-multiselect'
import VueResource from 'vue-resource'
import VueSweetAlert from 'vue-sweetalert'
// Router
import {newRouter} from './router';
// Components
import Sidebar from './components/Sidebar.vue';

Vue.component('multiselect', Multiselect);
Vue.use(VueResource);
Vue.use(VueSweetAlert);
// Simple store
let store = {
    apiUrl: '/api/v1/',
    module: '',
    title: ''
};

// create router
const router = newRouter();
router.beforeEach((to, from, next) => {
    store.module = to.name;
    store.title = to.meta.title;
    next();
});
const app = new Vue({
    el: '#app',
    router,
    components: {Sidebar},
    data: {
        store
    }
});
