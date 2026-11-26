<template>
    <div class="terminal-body text-center">
        <div class="body-c">
            <audio id="music" src="audio/rooms/room404/6.mp3" loop autoplay></audio>
            <div class="w-100 text-center">
                <img class="img-fluid enigme-img" src="img/salles/room404/enigme6.png">
            </div>
            <div class="row">
                <div class="zone-reponse">
                    <img class="img-fluid enigme-img-mini mb-3" src="img/salles/room404/carre.png">
                    <div>
                        <input class="terminal-input" type="text" v-model="carre" @keyup="responseverify()">
                    </div>
                </div>
                <div class="zone-reponse">
                    <img class="img-fluid enigme-img-mini mb-3" src="img/salles/room404/triangle.png">
                    <div>
                        <input class="terminal-input" type="text" v-model="triangle" @keyup="responseverify()">
                    </div>
                </div>

            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "enigme6_1",
    props: ['room'],
    data() {
        return {
            carre: 0,
            triangle: 0,
        }
    },
    mounted() {
        document.title="Breakout - ROOM404";
    },
    methods: {
        responseverify()
        {
            if((parseInt(this.carre) === 7) && (parseInt(this.triangle) === 4)) {
                //console.log("ok");
                this.room.enigme = 7;
                this.room.phase = 0;
            }
        }
    }
}
</script>
<style scoped>
    .enigme-img {
        max-width: 500px;
    }
    .enigme-img-mini {
        max-width: 40px;
    }
    .zone-reponse
    {
        margin: 10px 30px;
    }

    .terminal-input
    {
        border: none;
        border-bottom: 1.5px solid rgba(31, 240, 66, 1);
        font-family: Courier-Bold, Roboto, monospace !important;
        background: none;
        color: #1FF042;
        font-size: 20px;
        width: 200px;
        animation: 1.2s press infinite;
        text-align: center;
        margin: 0px 10px 30px 10px;
    }

</style>
