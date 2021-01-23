<template>
    <div class="terminal-body text-center">
        <div class="body-c w-100">
            <audio id="music" src="/audio/rooms/anubisriddle/8.mp3" loop autoplay></audio>
            <div class="w-100">
                <h1 class="title-egypte" style="margin-bottom: 50px; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">ENIGME 8</h1>
            </div>

            <div class="container">
                <div class="row" style="margin: 0;">
                    <div class="col-12 col-md-4 d-flex justify-content-center">
                        <div class="grille">
                            <img src="/img/salles/anubis_riddle/grille1.png">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-center">
                        <div class="grille">
                            <img src="/img/salles/anubis_riddle/grille2.png">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-center">
                        <div class="grille">
                            <img src="/img/salles/anubis_riddle/grille3.png">
                            <button class="cle" @click="key()"></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="margin: 0;">
                <div class="col-md-4 mx-auto" style="margin-top: 20px;">
                    <p class="sous-texte" style="margin-top: 20px;">
                        il suffit de savoir compter…
                    </p>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "enigme8",
    props: ['room'],
    data() {
        return {
            errors: []
        }
    },
    mounted() {
        document.title="Breakout - Anubis Riddle";
    },
    methods: {
        key()
        {
            this.room.enigme = 9;
            this.room.phase = 0;

        }
    },
    computed: {

    }
}
</script>
<style scoped>
.grille
{
    max-width: 250px;
    position: relative;
}

.grille>img
{
    width: 100%;
}

.cle
{
    background: none;
    border: none;
    border-radius: 100%;
    position: absolute;
    bottom: 0;
    right: 0;
    height: 85px;
    width: 85px;
}

.cle:active
{
    background: #f7aa1d;
    opacity: 0.7;
    animation: lightbox-loading 0.5s ease infinite;
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
