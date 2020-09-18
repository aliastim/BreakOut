<template>
    <div class="carousel">
        <slot></slot>
        <!-- slot appelle le contenu indiqué par le parent lorsque celui-ci appelle le composant Carousel -->
        <!--<button class="carousel__nav carousel__prev" @click.prevent="prev"></button>
        <button class="carousel__nav carousel__next" @click.prevent="next"></button>-->
        <div class="carousel__pagination">
            <button v-for="n in slidesCount" @click="goto(n - 1)" :class="{active: (n - 1) === index}"></button>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        console.log(this.$children)
        return {
            index: 0,
            slides: [],
            direction: null,
        }
    },
    mounted () {
        this.slides = this.$children
        this.slides.forEach((slide, i) => {
            slide.index = i
        })
        this.$interval = setInterval(()=> {
            this.index++
            this.direction = 'right'
            if (this.index >= this.slidesCount) {
                this.index = 0
            }
        }, 3000)

    },
    computed: {
        slidesCount () {
            return this.slides.length
        }
    },
    methods: {
        prev () {
            this.index--
            this.direction = 'left'
            if (this.index < 0) {
                this.index = this.slidesCount - 1
            }
        },
        next () {
            this.index++
            this.direction = 'right'
            if (this.index >= this.slidesCount) {
                this.index = 0
            }
        },
        goto (index) {
            this.direction = index > this.index ? 'right' : 'left'
            this.index = index
        }
    }
}
</script>
<style>
.carousel {
    overflow: hidden;
}
.carousel__nav {
    position: absolute;
    top: 50%;
    margin-top: -34px;
    left: 10px;
    /*background: url(../../assets/Carousel_images/prev.png);*/
    background: url("/img/Carousel_images/prev.png");
    background-size: contain ;
    width: 70px;
    height: 70px;
}

.carousel__nav.carousel__next {
    right: 10px;
    left: auto;
    /*background: url(../../assets/Carousel_images/next.png);*/
    background: url("/img/Carousel_images/next.png");
    background-size: contain ;
}

.carousel__pagination
{
    /*position: absolute;
    bottom: 0;
    left: 0;
    right: 0;*/
    margin-top: 20px;
    text-align: center;
}

.carousel__pagination button
{
    display: inline-block;
    width: 15px;
    height: 15px;
    background-color: #888888;
    /*opacity: 0.8;*/
    border-radius: 100%;
    margin: 10px;
    border: none;
}

.carousel__pagination button.active
{
    background-color: white ;
}
</style>
