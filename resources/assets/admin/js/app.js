require('./bootstrap');
window.Vue = require('vue');
// Common
import Multiselect from 'vue-multiselect'
import VueResource from 'vue-resource'
import VueSweetAlert from 'vue-sweetalert'
import Loader from './components/Loader.vue'
// Router
import {newRouter} from './router';
// Vuex
import {sync} from 'vuex-router-sync'
import {store} from './store/store';
// Components
import Sidebar from './components/Sidebar.vue';

Vue.component('multiselect', Multiselect);
Vue.component('loader', Loader);
Vue.use(VueResource);
Vue.use(VueSweetAlert);

// Create router for the app
const router = newRouter();
router.beforeEach((to, from, next) => {
    if (from.name !== to.name) {
        // Module
        store.commit('setModule', to.meta.module);
        // Title
        store.commit('setTitle', to.meta.title);
        document.title = store.getters.title + ' - ' + store.getters.appName;
    }
    next();
});
// Sync router with store
sync(store, router);

// Init app
store.dispatch('initApp').then(() => {
    new Vue({
        el: '#app',
        router,
        store,
        components: {Sidebar, Loader},
        beforeRouteUpdate(to, from, next) {
            next();
        }
    });
});