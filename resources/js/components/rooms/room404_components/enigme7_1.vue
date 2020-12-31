<template>
    <div class="terminal-body text-center">
        <div class="body-c">
            <audio id="music" src="audio/rooms/room404/7.mp3" loop autoplay></audio>
            <div class="w-100 text-center">
                <p class="terminal-text">Activez les interrupteurs dans l'ordre :</p>
            </div>
            <div class="d-flex justify-content-center text-center">
                <div class="preimg"> <img class="interrupteurs" v-model="blue" @click="blueverify()" src="img/salles/room404/Bleu.png"></div>
                <div class="preimg"> <img class="interrupteurs" v-model="yellow" @click="yellowverify()" src="img/salles/room404/Jaune.png"></div>
                <div class="preimg"> <img class="interrupteurs" v-model="orange" @click="orangeverify()" src="img/salles/room404/Orange.png"></div>
                <div class="preimg"> <img class="interrupteurs" v-model="red" @click="redverify()" src="img/salles/room404/Rouge.png"></div>
                <div class="preimg"> <img class="interrupteurs" v-model="green" @click="greenverify()" src="img/salles/room404/Vert.png"></div>

            </div>
            <div class="w-100 text-center pt-4">
                <a class="link-retour" @click="reinitialisate()">Réinitialiser</a>
            </div>
            <div class="w-100 justify-content-center d-flex">
                <input type="text" class="encart" v-model="result" readonly>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "enigme7_1",
    props: ['room'],
    data() {
        return {
            blue: "Blue",
            yellow: "Yellow",
            orange: "Orange",
            red: "Red",
            green: "Green",
            result: ""
        }
    },
    mounted() {
        document.title="Breakout - Rogyb";
    },
    methods: {
        blueverify(){
            if (this.result === ""){
                this.result = this.result + this.blue;
            } else {
                this.result = this.result + " - " + this.blue;
                this.verify();
            }
        },
        yellowverify(){
            if (this.result === ""){
                this.result = this.result + this.yellow;
            } else {
                this.result = this.result + " - " + this.yellow;
                this.verify();
            }
        },
        orangeverify(){
            if (this.result === ""){
                this.result = this.result + this.orange;
            } else {
                this.result = this.result + " - " + this.orange;
                this.verify();
            }
        },
        redverify(){
            if (this.result === ""){
                this.result = this.result + this.red;
            } else {
                this.result = this.result + " - " + this.red;
                this.verify();
            }
        },
        greenverify(){
            if (this.result === ""){
                this.result = this.result + this.green;
            } else {
                this.result = this.result + " - " + this.green;
                this.verify();
            }
        },
        verify(){
            if (this.result === "Red - Orange - Green - Yellow - Blue")
            {
                this.room.phase = 2;
            }
        },
        reinitialisate() {
            this.result="";
        }
    }
}
</script>
<style scoped>
    .preimg
    {
        height: 160px;
        width: 220px;
    }
    .interrupteurs {
        //width: 250px;
        height: 150px;
        cursor: pointer;
        transition: 0.3s;
    }

    .interrupteurs:hover {
        height: 160px;
        margin-top: -5px;
    }

    .link-retour {
        font-family: Roboto, monospace !important;
        color : #1FF042;
        font-size: 14px;
        font-weight: 300;
        cursor: pointer;
    }

    .encart
    {
        font-family: Roboto, monospace !important;
        background: none;
        border: none;
        width: 100%;
        text-align: center;
        color: #1FF042;
        //border: 2px solid #1FF042;
        font-size: 20px;
    }

</style>
