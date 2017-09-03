require('./bootstrap');
window.Vue = require('vue');
// Common
// Router
import {newRouter} from './router';
// Components
import Sidebar from './components/Sidebar.vue';
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
