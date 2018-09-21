import Vue from 'vue';
import Vuex from 'vuex';

import actions from './actions';
import getters from './getters';
import mutations from './mutations';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        appName: 'Admin - Laravel',
        appUrl: '/admin/',
        apiUrl: '/api/admin/v1/',
        isLoading: true,
        module: '',
        title: '',
        roles: []
    },
    actions,
    getters,
    mutations
});