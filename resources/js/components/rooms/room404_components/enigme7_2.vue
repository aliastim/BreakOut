<template>
    <div class="terminal-body text-center">
        <div class="body-c">
            <p class="terminal-text">
                Je vous ai quand meme gardé une toute petite surprise,<br>
                il vous reste à cliquer sur le dernier interrupteur pour dévérouiller les ogives !<br><br>

                Encore faut-il savoir duquel il s’agit...<br><br>

                (Attention toutefois si vous vous trompez, les ogives seront déclenchées)<br>
            </p>

            <div class="d-flex justify-content-center text-center">
                <div class="prebutton">
                    <button class="interrupteur72" v-model="face34" @click="verifyf34()"></button>
                    <p>Face34</p>
                </div>
                <div class="prebutton">
                    <button class="interrupteur72" v-model="safe43" @click="verifys43()"></button>
                    <p>Safe43</p>
                </div>
            </div>
            <div class="d-flex justify-content-center text-center">
                <div class="prebutton">
                    <button class="interrupteur72" v-model="safe34" @click="verifys34()"></button>
                    <p>Safe34</p>
                </div>
                <div class="prebutton">
                    <button class="interrupteur72" v-model="face43" @click="verifyf43()"></button>
                    <p>Face43</p>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "enigme7_2",
    props: ['room'],
    data() {
        return {
            face34: "FACE34",
            safe43: "SAFE43",
            safe34: "SAFE34",
            face43: "FACE43"
        }
    },
    mounted() {
        document.title="Breakout - ROOM404";
    },
    methods: {
        verifyf34()
        {
            //Bonne réponse
            this.room.phase = 3;
            //console.log('ok');
        },
        verifys43()
        {
            //Mauvaise réponse
            this.room.phase = 4;
            //console.log('pas ok');
        },
        verifys34()
        {
            //Mauvaise réponse
            this.room.phase = 4;
            //console.log('pas ok');
        },
        verifyf43()
        {
            //Mauvaise réponse
            this.room.phase = 4;
            //console.log('pas ok');
        }
    }
}
</script>
<style scoped>
    .prebutton
    {
        width: 200px;
        height: 180px;
        //background: black;
        background: linear-gradient(45deg, #373737 0%, #d7d7d7 30%, #373737 80%, white 300%);
        padding: 20px 0 20px 0px;
        margin: 20px;
        border: 10px dashed #1c1c1c;
        box-shadow: 0 0 20px black;
    }

    .prebutton>p
    {
        font-family: Roboto, monospace !important;
        font-size: 18px;
        font-weight: 900;
        color: darkred;
        text-transform: uppercase;
    }

</style>
