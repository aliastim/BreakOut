require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
import router from './routes';

/*import { BootstrapVue } from 'bootstrap-vue';
Vue.use(BootstrapVue)*/

Vue.component('app', require('./components/App.vue').default)

const content = new Vue ({
    el: '#app',
    router
});

/*https://www.digitalocean.com/community/tutorials/handling-authentication-in-vue-using-vuex*/


/*
let $carousel = document.querySelector('#carousel')

if ($carousel) {

    new Vue ({
        el:'#carousel',
        components: {
            Carousel,
            CarouselSlide
        }
    })


}
*/
/*
require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#app',
});*/
