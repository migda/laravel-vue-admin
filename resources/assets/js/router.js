import Vue from 'vue'
import Router from 'vue-router'

// Components
import Example from './components/Example.vue'
import Users from './views/users/Index.vue'
import UsersCreate from './views/users/Create.vue'
import UsersEdit from './views/users/Edit.vue'

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
            },
            {
                path: adminUrl + 'users/create', name: 'users-create', component: UsersCreate,
                meta: {
                    title: 'Users - Create',
                }
            },
            {
                path: adminUrl + 'users/:id', name: 'users-edit', component: UsersEdit,
                meta: {
                    title: 'Users - Edit',
                }
            }
        ],
        scrollBehavior(to, from) {
            return {x: 0, y: 0};
        }
    })
}