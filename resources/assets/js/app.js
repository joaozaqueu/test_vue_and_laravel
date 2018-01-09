import Vue from 'vue';

import VueNumeric from 'vue-numeric';
Vue.use(VueNumeric);

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import App from './App.vue';
import CreateItem from './components/CreateItem.vue';
import DisplayItem from './components/DisplayItem.vue';
import EditItem from './components/EditItem.vue';

import VzUsers from './components/users/Users.vue';
import UserEdit from './components/users/EditUser.vue';
import UserCreate from './components/users/CreateUser.vue';

const routes = [
    {
        name: 'CreateItem',
        path: '/items/create',
        component: CreateItem
    },
    {
        name: 'DisplayItem',
        path: '/',
        component: DisplayItem
    },
    {
        name: 'EditItem',
        path: '/edit/:id',
        component: EditItem
    },
    {
        name: 'UsersList',
        path: '/users/',
        component: VzUsers
    },
    {
        name: 'UserCreate',
        path: '/users/create',
        component: UserCreate
    },
    {
        name: 'UserEdit',
        path: '/users/edit',
        component: UserEdit
    }
];

const router = new VueRouter({ mode: 'history', routes: routes});
new Vue(Vue.util.extend({ router }, App)).$mount('#app');
