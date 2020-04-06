/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.VueRouter = require('vue-router');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('home', require('./views/home.vue').default);
Vue.component('Alumnos', require('./views/Alumnos.vue').default);
Vue.component('Grados', require('./views/Grados.vue').default);
Vue.component('Secciones', require('./views/Secciones.vue').default);
Vue.component('Turnos', require('./views/Turnos.vue').default);
Vue.component('Reportes', require('./views/Reportes.vue').default);
Vue.component('Usuarios', require('./views/Usuarios.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import VueRouter from 'vue-router';
Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: () => import('./views/home.vue'),
        },
        {
            path: '/Alumnos',
            name: 'Alumnos',
            component: () => import('./views/Alumnos.vue'),
        },
        {
            path: '/Grados',
            name: 'Grados',
            component: () => import('./views/Grados.vue'),
        },
        {
            path: '/Secciones',
            name: 'Secciones',
            component: () => import('./views/Secciones.vue'),
        },
        {
            path: '/Turnos',
            name: 'Turnos',
            component: () => import('./views/Turnos.vue'),
        },
        {
            path: '/Reportes',
            name: 'Reportes',
            component: () => import('./views/Reportes.vue'),
        },
        {
            path: '/Usuarios',
            name: 'Usuarios',
            component: () => import('./views/Usuarios.vue'),
        },
    ],
});

const app = new Vue({
    el: '#app',
    router,
});