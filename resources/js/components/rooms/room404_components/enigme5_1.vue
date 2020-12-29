<template>
    <div class="terminal-body text-center">
        <div class="body-c">
            <div>
                <button class="btn-console" @click="testzero()" v-model="zero">•</button>
                <button class="btn-console" @click="testun()" v-model="un">-</button>
            </div>
            <div class="w-100 text-center pt-4">
                <a class="link-retour" @click="reinitialisate()">Réinitialiser</a>
            </div>
        </div>

        <audio id="morse" src="audio/rooms/morse404.mp3" loop autoplay></audio>
        <!--<script type="application/javascript">
            var player = document.querySelector('#morse');
            player.play();
        </script>-->
    </div>
</template>

<script>
export default {
    name: "enigme5_1",
    props: ['room'],
    data() {
        return {
            zero: "0",
            un : "1",
            result: ""
        }
    },
    methods: {
        testzero(){
            this.result = this.result + this.zero;
            this.verify();
        },
        testun(){
            this.result = this.result + this.un;
            this.verify();
        },

        verify() {
            if (this.result=== "000011111100001")
            {
                //onsole.log("ok");
                this.room.enigme = 6;
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


</style>
