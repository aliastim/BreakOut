require('./bootstrap');
import Vue from 'vue'
/*import VueRouter from 'vue-router'*/
import Carousel from "./components/carousel/Carousel";
import CarouselSlide from "./components/carousel/CarouselSlide";

/*Vue.use(VueRouter)*/

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

/*
require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#app',
});*/
