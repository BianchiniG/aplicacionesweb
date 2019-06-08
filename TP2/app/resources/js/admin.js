
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

Vue.component('texto', require('./components/admin/Componentes/Texto.vue').default);
Vue.component('lista', require('./components/admin/Componentes/Lista.vue').default);
Vue.component('item', require('./components/admin/Componentes/Item.vue').default);
Vue.component('adjunto', require('./components/admin/Componentes/Adjunto.vue').default);
Vue.component('archivo-adjunto', require('./components/admin/Componentes/ArchivoAdjunto.vue').default);
Vue.component('hipervinculo', require('./components/admin/Componentes/Hipervinculo.vue').default);
Vue.component('link-item', require('./components/admin/Componentes/LinkItem.vue').default);

Vue.component('tramite', require('./components/admin/Tramite.vue').default);
Vue.component('tramites', require('./components/admin/Tramites.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const admin = new Vue({
    el: '#admin'
})
