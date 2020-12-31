<template>
    <div class="terminal-body text-center">
        <div class="body-c">
            <div class="text-center">
                <p class="terminal-text">Votre réponse :</p>
                <input class="terminal-input" type="text" v-model="response" @keyup="responseverify()">
            </div>
            <div>
                <button class="btn-console" @click="testC()" v-model="vc">C</button>
                <button class="btn-console" @click="testO()" v-model="vo">O</button>
                <button class="btn-console" @click="testN()" v-model="vn">N</button>
                <button class="btn-console" @click="testS()" v-model="vs">S</button>
                <button class="btn-console" @click="testO2()" v-model="vo2">O</button>
                <button class="btn-console" @click="testL()" v-model="vl">L</button>
                <button class="btn-console" @click="testE()" v-model="ve">E</button>
            </div>
            <div class="w-100 text-center pt-4">
                <a class="link-retour" @click="reinitialisate()">Réinitialiser</a>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "enigme3_1",
    props: ['room'],
    data() {
        return {
            response:"",

            vc: "C",
            vo: "O",
            vn: "N",
            vs: "S",
            vo2: "O",
            vl: "L",
            ve: "E",

            result: "",
        }
    },
    mounted() {
        document.title="Breakout - ROOM404";
    },
    methods: {
        responseverify(){
            if(this.response === "42")
            {
                console.log("N L E O O C S");
            }
        },
        testC(){
            this.result = this.result + this.vc;
            this.verify();
        },
        testO(){
            this.result = this.result + this.vo;
            this.verify();
        },
        testN(){
            this.result = this.result + this.vn;
            this.verify();
        },
        testS(){
            this.result = this.result + this.vs;
            this.verify();
        },
        testO2(){
            this.result = this.result + this.vo2;
            this.verify();
        },
        testL(){
            this.result = this.result + this.vl;
            this.verify();
        },
        testE(){
            this.result = this.result + this.ve;
            this.verify();
        },

        verify() {
            if (this.result=== "NLEOOCS")
            {
                //console.log("ok");
                this.room.enigme = 4;
                this.room.phase = 0;

            } else {
                console.log(this.result);
            }

        },
        reinitialisate() {
            this.result = "";
        }
    }
}
</script>
<style scoped>
    .btn-console
    {
        background: #1FF042;
        color: black;
        border: 4px solid #008A17;
        width: 70px;
        height: 70px;
        text-align: center;
        padding-top: 7px;
        font-family: Courier-Bold, Roboto, monospace !important;
        text-transform: uppercase;
        font-size: 35px;
        transition: 0.3s;
        cursor: pointer;
    }

    .btn-console:hover
    {
        background: #008A17;
    }

    .btn-console:active
    {
        background: #008A17;
        border: 5px solid #023b0c;
        font-size: 30px;
    }

    .link-retour {
        font-family: Roboto, monospace !important;
        color : #1FF042;
        font-size: 14px;
        font-weight: 300;
        cursor: pointer;
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
