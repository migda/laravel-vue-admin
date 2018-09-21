export default {
    initApp({commit, state}) {
        Vue.http.get(state.apiUrl + 'start').then((response) => {
            commit('setRoles', response.data.roles);
            commit('setIsLoading', false);
        }, (response) => {
            swal('Something went wrong!', 'Refresh your browser.', 'error');
        });
    }
};