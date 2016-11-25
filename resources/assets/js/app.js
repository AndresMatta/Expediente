
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
Vue.component('users', require('./components/Users.vue'));

const app = new Vue({
    el: '#app',

     http: {
        headers: {
            // You could also store your token in a global object, 
            // and reference it here. APP.token
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        }
    }
});
