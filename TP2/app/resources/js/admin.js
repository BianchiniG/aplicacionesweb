
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// import all icons if you don't care about bundle size
import 'vue-awesome/icons';
import Icon from 'vue-awesome/components/Icon';

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
Vue.component('icon', Icon);

Vue.component('tramites', require('./components/admin/Tramites.vue').default);

Vue.component('nuevo-tramite', require('./components/admin/NewTramite/NewTramite.vue').default);
Vue.component('nuevo-texto', require('./components/admin/NewTramite/Texto.vue').default);
Vue.component('nuevo-lista', require('./components/admin/NewTramite/Lista.vue').default);
Vue.component('nuevo-hipervinculo', require('./components/admin/NewTramite/Hipervinculo.vue').default);
Vue.component('nuevo-adjunto', require('./components/admin/NewTramite/Adjunto.vue').default);

Vue.component('editar-tramite', require('./components/admin/EditTramite/EditTramite.vue').default);
Vue.component('editar-texto', require('./components/admin/EditTramite/Texto.vue').default);
Vue.component('editar-lista', require('./components/admin/EditTramite/Lista.vue').default);
Vue.component('editar-hipervinculo', require('./components/admin/EditTramite/Hipervinculo.vue').default);
Vue.component('editar-adjunto', require('./components/admin/EditTramite/Adjunto.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const admin = new Vue({
    el: '#admin'
})
