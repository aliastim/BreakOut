<template>
    <div class="terminal-body text-center">
        <div class="body-c w-100">
            <audio id="music" src="/audio/rooms/anubisriddle/5.mp3" loop autoplay></audio>
            <div class="w-100" style="margin-bottom: -100px;">
                <h1 class="title-egypte" style="margin-bottom: 50px; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">ENIGME 5</h1>
            </div>

            <div class="row" style="margin: 0;">

                <div class="mx-auto image-diff">
                    <img src="/img/salles/anubis_riddle/difference2.png" style="margin-left: 9px;">
                    <div class="counter"><p class="counter-title" v-text="counter"></p></div>
                    <button class="boutons-diffs bouton-diff1" @click="color_red()" style="/*background: red;*/"></button>
                    <button class="boutons-diffs bouton-diff2" @click="color_blue()" style="/*background: blue;*/"></button>
                    <button class="boutons-diffs bouton-diff3" @click="color_blue()" style="/*background: blue;*/"></button>
                    <button class="boutons-diffs bouton-diff4" @click="color_orange()" style="/*background: orange;*/"></button>
                    <button class="boutons-diffs bouton-diff5" @click="color_violet()" style="/*background: blueviolet;*/"></button>
                </div>

            </div>
            <div class="row" style="margin: 0;">
                <div class="col-md-4 mx-auto" style="margin-top: 20px;">
                    <p class="sous-texte" style="margin-top: 20px;">
                        As-tu le sens du détail ?
                    </p>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "enigme5",
    props: ['room'],
    data() {
        return {
            password: "",
            counter: 0,
            interval: null,
            red: false,
            blue: false,
            orange: false,
            violet: false,
            errors: []
        }
    },
    mounted() {
        document.title="Breakout - Anubis Riddle";
    },
    methods: {
        color_red()
        {
            if(this.red !== true)
            {
                this.counter++;
                this.red = true;
                this.verify();
            }
        },
        color_blue()
        {
            if(this.blue !== true)
            {
                this.counter++;
                this.blue = true;
                this.verify();
            }
        },
        color_orange()
        {
            if(this.orange !== true)
            {
                this.counter++;
                this.orange = true;
                this.verify();
            }
        },
        color_violet()
        {
            if(this.violet !== true)
            {
                this.counter++;
                this.violet = true;
                this.verify();
            }
        },
        verify()
        {
            if(this.counter === 4)
            {
                this.interval = setInterval(()=> {
                    this.room.enigme = 6;
                    this.room.phase = 0;
                    console.log('test');

                },1000);
            }
        },
    },
    beforeDestroy () {
        clearInterval(this.interval)
    },
    computed: {

    }
}
</script>
<style scoped>
.image-diff
{
    margin-top: 100px;
    max-width: 600px;
    position: relative;
}

@media screen and (max-width: 1000px){
    .image-diff
    {
        margin-top: 100px;
        max-width: 400px;
        position: relative;
    }
}

.image-diff>img
{
    width: 100%;
}

.counter
{
    position: absolute;
    top: 0;
    left: 45%;
    width: 10%;
    height: 10%;
}

.counter > p
{
    color: white;
    font-size: 50px;
    font-family: Trajan;
    text-align: center;
}

.boutons-diffs
{
    background: none;
    border: none;
    border-radius: 100%;
}

.boutons-diffs:active
{
    background: #f7aa1d;
    opacity: 0.7;
    animation: lightbox-loading 0.5s ease infinite;
}

.bouton-diff1
{
    position: absolute;
    top: 3%;
    left: 0;
    width: 26%;
    height: 32%;
}
.bouton-diff2
{
    position: absolute;
    bottom: 20%;
    left: 15%;
    width: 21%;
    height: 18%;
}
.bouton-diff3
{
    position: absolute;
    bottom: 20%;
    right: 15%;
    width: 21%;
    height: 18%;
}
.bouton-diff4
{
    position: absolute;
    top: 24%;
    left: 45%;
    width: 10%;
    height: 15%;
}
.bouton-diff5
{
    position: absolute;
    top: 72%;
    left: 45%;
    width: 10%;
    height: 9%;
}

@keyframes lightbox-loading {
    0%{
        opacity: 0.3;
        transform: scale(0.75);
    }
    50%{
        opacity: 0.7;
        transform: scale(1);
    }
    100% {
        opacity: 0.3;
        transform: scale(0.75);
    }

}

</style>
