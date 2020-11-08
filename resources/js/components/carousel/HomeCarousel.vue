<template>
    <div>
        <div class="breakout-bakground"></div>
            <div id="carousel">
                <carousel>
                    <carousel-slide>
                        <div style="position: absolute; left: 0; right: 0; text-align: center; top: 50%; color: white;"></div>
                        <img :src="home.homecarousel[0].img" width="100%">
                    </carousel-slide>
                    <carousel-slide>
                        <div style="position: absolute; left: 0; right: 0; text-align: center; top: 50%; color: white;"></div>
                        <img :src="home.homecarousel[1].img" width="100%">
                    </carousel-slide>
                    <carousel-slide>
                        <div style="position: absolute; left: 0; right: 0; text-align: center; top: 50%; color: white;"></div>
                        <img :src="home.homecarousel[2].img" width="100%">
                    </carousel-slide>
                </carousel>
            </div>
            <div class="breakout-body-before">
                {{ home.sentence }}
            </div>
    </div>
</template>
<script>
import Carousel from "./Carousel";
import CarouselSlide from "./CarouselSlide";
export default {
    name: "HomeCarousel",
    props: ['home'],
    components: {Carousel, CarouselSlide}
}
</script>
<style>

</style>
