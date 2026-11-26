<template>
    <div class="terminal-body text-center">
        <div class="body-c w-100">
            <audio id="music" src="/audio/rooms/anubisriddle/10.mp3" loop autoplay></audio>
            <div class="w-100" style="margin-bottom: -150px;">
                <h1 class="title-egypte" style="margin-bottom: 50px; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">ENIGME 10</h1>
            </div>
            <div class="row" style="margin: 0;">
                <div class="mx-auto imgchoix">
                    <img src="/img/salles/anubis_riddle/boutons_choix.png" class="img-fluid w-100">
                    <button class="btn-tuer" @click="lost()">Tuer votre partenaire</button>
                    <button class="btn-sacrifice" @click="victory()">Vous<br>sacrifier</button>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "enigme10",
    props: ['room'],
    data() {
        return {
            password: "",
            errors: []
        }
    },
    mounted() {
        document.title="Breakout - Anubis Riddle";
    },
    methods: {
        lost()
        {
            this.room.player =0
            this.room.enigme = 0;
            this.room.phase = 0;
        },
        victory()
        {
            this.room.player =0
            this.room.enigme = 0;
            this.room.phase = 1;
        }
    },
    computed: {

    }
}
</script>
<style scoped>
    .imgchoix
    {
        margin-top: 100px;
        max-width: 1100px;
        position: relative;
    }

    .image-diff>img
    {
        width: 100%;
    }

    .btn-tuer
    {
        position: absolute;
        top: 43%;
        left: 31%;
        width: 17%;
        height: 18%;
        background: none;
        border: #F8AA22 1px solid;
        border-radius: 40px 0 0 40px;
        text-align: center;
        font-family: Volte;
        font-size: 22px;
        color: #F8AA22;
        text-transform: uppercase;
        transition: 0.3s;
        cursor: pointer;
    }

    .btn-sacrifice
    {
        position: absolute;
        top: 43%;
        right: 31%;
        width: 17%;
        height: 18%;
        background: none;
        border: #F8AA22 1px solid;
        border-radius: 0 40px 40px 0;
        text-align: center;
        font-family: Volte;
        font-size: 22px;
        color: #F8AA22;
        text-transform: uppercase;
        transition: 0.3s;
        cursor: pointer;
    }

    .btn-tuer:hover
    {
        background: #F8AA22;
        color: white;
    }

    .btn-sacrifice:hover
    {
        background: #F8AA22;
        color: white;
    }

    @media screen and (max-width: 1200px){
        .imgchoix
        {
            margin-top: 100px;
            max-width: 800px;
            position: relative;
        }
        .btn-tuer
        {
            font-size: 15px;
        }
        .btn-sacrifice
        {
            font-size: 15px;
        }
    }

    @media screen and (max-width: 767px){
        .btn-tuer
        {
            font-size: 10px !important;
        }
        .btn-sacrifice
        {
            font-size: 10px !important;
        }
    }


</style>
