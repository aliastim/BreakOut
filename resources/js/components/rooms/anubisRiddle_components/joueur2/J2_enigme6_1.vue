<template>
    <div class="terminal-body text-center">
        <div class="body-c w-100">
            <audio id="music" src="/audio/rooms/anubisriddle/6.mp3" loop autoplay></audio>
            <div class="w-100" style="margin-bottom: -100px;">
                <h1 class="title-egypte" style="margin-bottom: 50px; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">ENIGME 6</h1>
            </div>

            <div class="row" style="margin: 0;">

                <div class="mx-auto image-pyramide">
                    <img src="/img/salles/anubis_riddle/pyramides_chiffres.png">
                    <img src="/img/salles/anubis_riddle/lune.png" @click="moon_go()" :class="{'moon' : moon === 0, 'moon1' : moon === 1, 'moon2' : moon === 2}">
                </div>

            </div>
            <div class="row" style="margin: 0;">
                <div class="col-md-4 mx-auto" style="margin-top: 20px;">
                    <p class="sous-texte" style="margin-top: 20px;">
                        Certains chiffres ont plus de<br>
                        sens une fois séparés
                    </p>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "enigme6",
    props: ['room'],
    data() {
        return {
            moon: 0,
            interval: null,
            errors: []
        }
    },
    mounted() {
        document.title="Breakout - Anubis Riddle";
    },
    methods: {
        moon_go() {
            if (this.moon !== 2)
            {
                this.moon++
                this.verify();
            }
        },
        verify()
        {
            if (this.moon === 2)
            {
                this.interval = setInterval(()=> {
                    this.room.enigme = 7;
                    this.room.phase = 0;
                },1000);
            }
        }
    },
    beforeDestroy () {
        clearInterval(this.interval)
    },
    computed: {

    }
}
</script>
<style scoped>
.image-pyramide
{
    position: relative;
    width: 600px;
    height: 500px;
    margin-top: 100px;
}

@media screen and (max-width: 1000px){
    .image-pyramide
    {
        position: relative;
        width: 400px;
        height: 300px;
        margin-top: 100px;
    }
}
.image-pyramide>img:nth-child(1)
{
    position: absolute;
    max-width: 100%;
    z-index: 99;
    bottom: 0;
    left: 0;
}
.image-pyramide>img:nth-child(2)
{
    position: absolute;
    max-width: 25%;
    top: 0;
    right: 20%;
}

.moon
{
    top: 0 !important;
    right: 20% !important;
}

.moon1
{
    top: 20% !important;
    right: 15% !important;
}

.moon2
{
    top: 50% !important;
    right: 10% !important;
}
</style>
