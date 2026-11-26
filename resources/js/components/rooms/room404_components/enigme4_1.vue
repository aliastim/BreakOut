<template>
    <div class="terminal-body text-center">
        <div class="body-c">
            <audio id="music" src="audio/rooms/room404/4.mp3" loop autoplay></audio>
            <div class="text-center">
                <p class="terminal-text">Entrez le mot de passe :</p>
                <input class="terminal-input" type="text" v-model="response" @keyup="responseverify()">
            </div>
        </div>
        <div class="hid"></div>
    </div>
</template>

<script>
export default {
    name: "enigme4_1",
    props: ['room'],
    data() {
        return {
            response:"",
        }
    },
    mounted() {
        document.title="Breakout - ROOM404";
    },
    methods: {
        responseverify(){
            if((this.response).toUpperCase() === "PX30")
            {
                //console.log("ok");
                this.room.enigme = 5;
                this.room.phase = 0;
            }
        },
    }
}
</script>
<style scoped>
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
    .hid:after
    {
        font-family: Roboto, monospace !important;
        font-size: 20px;
        content: "PX30";
        position: absolute;
        bottom: 20px;
        right: 30px;
        color: #181717;
    }

</style>
