
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('example', require('./components/Example.vue'));
//Componentes de Usuarios
Vue.component('users', require('./components/Users.vue'));
Vue.component('users-create', require('./components/UsersCreate.vue'));
//Componentes de Consulta
Vue.component('my-recepcion', require('./components/ConsultaRecepcion.vue'));
Vue.component('my-pendientes', require('./components/ConsultaPendientes.vue'));
Vue.component('my-atencion', require('./components/ConsultaAtencion.vue'));


const app = new Vue({
    el: '#app',
});
