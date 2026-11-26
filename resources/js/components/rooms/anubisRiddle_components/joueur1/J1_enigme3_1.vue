<template>
    <div class="terminal-body text-center">
        <div class="body-c w-100">
            <audio id="music" src="/audio/rooms/anubisriddle/3.mp3" loop autoplay></audio>
            <div class="w-100" style="margin-bottom: -30px;">
                <h1 class="title-egypte" style="margin-bottom: 50px; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">ENIGME 3</h1>
            </div>
            <img src="/img/salles/anubis_riddle/PYRAMIDE.png" class="img-fluid img-pyramide">
            <div class="row" style="margin: 0;">
                <div class="col-12 col-md-6 col-lg-4 mx-auto">
                    <input id="texte" v-model="password" @keyup="verify" style="width: 100%; margin-top: 50px; font-family: Volte; font-size: 50px; color: black;  border-radius: 20px 20px 20px 20px;">
                </div>
                <div class="col-12 col-md-6 col-lg-4 mx-auto">
                    <input id="copie" disabled="" v-model="password" class="inputrecopie">
                </div>
            </div>
            <div class="col-md-4 mx-auto" style="margin-top: 100px;">
                <button class="button_egypte" @click="effacer()" style="padding: 5px 100px;">EFFACER</button>
            </div>
            <div class="position-relative d-flex justify-content-center">
                <button class="btn-EN3" @mouseover="indice = !indice" @mouseleave="indice = !indice">?</button>
                <p v-show="indice" class="position-absolute aide">
                    Le pharaon (se) retourne dans sa tombe
                </p>
            </div>


        </div>
    </div>
</template>

<script>
export default {
    name: "enigme3",
    props: ['room'],
    data() {
        return {
            password: "",
            indice: false,
            errors: []
        }
    },
    mounted() {
        document.title="Breakout - Anubis Riddle";
    },
    methods: {
        verify()
        {
            if((this.password).toUpperCase() === "EBMOT")
            {
                this.room.enigme = 4;
                this.room.phase = 0;
            }
        },
        effacer()
        {
            this.password = "" ;
        }
    },
    computed: {

    }
}
</script>
<style scoped>

    .img-pyramide
    {
        height: 80px;
        margin-bottom: -195px;
    }
    .inputrecopie
    {
        width: 100%;
        margin-top: 50px;
        font-family: hieroglyphes;
        font-size: 50px;
        border-radius: 20px 20px 20px 20px;
        border: 1px solid white;
        background: rgba(255,255,255,0.1);
        color: #F8AA22;
    }

    .btn-EN3
    {
        font-family: Trajan;
        color: #F8AA22;
        font-size: 40px;
        border-radius: 100px;
        width: 50px;
        height: 50px;
        background: none;
        border: 1px solid #F8AA22;
        margin-top: 50px;
        padding-top: 5px;
    }

    .btn-EN3:hover
    {
        color: white;
        background-image: url(/img/salles/anubis_riddle/boutton_click.png);
        background-size: 150%;
        background-position: center;
        cursor: pointer;

    }

    .aide
    {
        font-family: Trajan;
        color: #F8AA22;
        font-size: 15px;
        margin-top: 20px;
        margin-bottom: -20px;
        bottom: -20px;
    }
</style>
