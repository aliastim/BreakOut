<template>
    <div class="terminal-body text-center">
        <div class="body-c w-100">
            <audio id="music" src="/audio/rooms/anubisriddle/8.mp3" loop autoplay></audio>
            <div class="w-100" style="margin-bottom: 10px;">
                <h1 class="title-egypte" style="margin-bottom: 50px; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">ENIGME 8</h1>
            </div>
            <div class="d-flex justify-content-center">
                <div>
                    <div class="qua1" style="margin: 0;">

                        <div class="qua2"><input class="inptCA in1" v-model="A1" @keyup="verify()"></div>
                        <div class="qua2"><input class="inptCA in2" v-model="A2" @keyup="verify()"></div>
                        <div class="qua2"><input class="inptCA in3" v-model="A3" @keyup="verify()"></div>

                    </div>
                    <div class="qua1" style="margin: 0;">

                        <div class="qua2"><input class="inptCA in4" v-model="B1" @keyup="verify()"></div>
                        <div class="qua2"><input class="inptCA in5" v-model="B2" @keyup="verify()"></div>
                        <div class="qua2"><input class="inptCA in6" v-model="B3" @keyup="verify()"></div>

                    </div>
                    <div class="qua1" style="margin: 0;">

                        <div class="qua2"><input class="inptCA in7" v-model="C1" @keyup="verify()"></div>
                        <div class="qua2"><input class="inptCA in8" v-model="C2" @keyup="verify()"></div>
                        <div class="qua2"><input class="inptCA in9" v-model="C3" @keyup="verify()"></div>

                    </div>
                </div>
            </div>
            <div class="text-center" style="margin-top: 50px;">
                <img class="img-fluid" src="/img/salles/anubis_riddle/stele_indice.png" style="max-width: 100px;">
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
            A1: "",
            A2: "",
            A3: "",
            B1: "",
            B2: "",
            B3: "",
            C1: "",
            C2: "",
            C3: "3",
            errors: []
        }
    },
    mounted() {
        document.title="Breakout - Anubis Riddle";
    },
    methods: {
        verify()
        {
            if((Number(this.A1) === 0) && (Number(this.A2) === 2) && (Number(this.A3) === 1) && (Number(this.B1) === 1) && (Number(this.B2) === 1) && (Number(this.B3) === 1) && (Number(this.C1) === 2) && (Number(this.C2) === 1) && (Number(this.C3) === 3))
            {
                this.room.enigme = 9;
                this.room.phase = 0;
            }

        },
    },
    computed: {

    }
}
</script>
<style scoped>
    .inptCA {
        width: 170px;
        height: 170px;
        font-size: 150px;
        text-align: center;
        font-family: Volte;
    }
    .qua1
    {
        display: flex;
        justify-content: center;
        width: 510px;
    }
    @media screen and (max-width: 767px){
        .qua1
        {
            display: flex;
            justify-content: center;
            width: 309px;
        }
        .inptCA {
            width: 103px;
            height: 103px;
            font-size: 100px;
            text-align: center;
        }
    }
    .qua2 {
        padding-left: 0px;
        padding-right: 0px;
        width: 33.333333%;
    }
    .in1 {
        background: none;
        border-top: none;
        border-left: none;
        border-right: white 1px solid;
        border-bottom: white 1px solid;
        color: white;
    }
    .in2 {
        background: none;
        border-top: none;
        border-left: white 1px solid;
        border-right: white 1px solid;
        border-bottom: white 1px solid;
        color: white;
    }
    .in3 {
        background: none;
        border-top: none;
        border-left: white 1px solid;
        border-right: none;
        border-bottom: white 1px solid;
        color: white;
    }
    .in4 {
        background: none;
        border-top: white 1px solid;
        border-left: none;
        border-right: white 1px solid;
        border-bottom: white 1px solid;
        color: white;
    }
    .in5 {
        background: none;
        border-top: white 1px solid;
        border-left: white 1px solid;
        border-right: white 1px solid;
        border-bottom: white 1px solid;
        color: white;
    }
    .in6 {
        background: none;
        border-top: white 1px solid;
        border-left: white 1px solid;
        border-right: none;
        border-bottom: white 1px solid;
        color: white;
    }
    .in7 {
        background: none;
        border-top: white 1px solid;
        border-left: none;
        border-right: white 1px solid;
        border-bottom: none;
        color: white;
    }
    .in8 {
        background: none;
        border-top: white 1px solid;
        border-left: white 1px solid;
        border-right: white 1px solid;
        border-bottom: none;
        color: white;
    }
    .in9 {
        background: none;
        border-top: white 1px solid;
        border-left: white 1px solid;
        border-right: none;
        border-bottom: none;
        color: white;
    }
</style>
