import Vue from 'vue'
import Router from 'vue-router'

// Components
import Example from './components/Example.vue'
import Users from './views/users/Index.vue'

Vue.use(Router);
let adminUrl = '/admin/';

export function newRouter() {
    return new Router({
        mode: 'history',
        routes: [
            {
                path: adminUrl, name: 'dashboard', component: Example,
                meta: {
                    title: 'Dashboard',
                }
            },
            {
                path: adminUrl + 'users', name: 'users', component: Users,
                meta: {
                    title: 'Users',
                }
            }
        ],
        scrollBehavior(to, from) {
            return {x: 0, y: 0};
        }
    })
}