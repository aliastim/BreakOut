<template>
    <div class="terminal-body text-center">
        <div class="body-c w-100">
            <div class="w-100">
                <h1 class="title-egypte" style="margin-bottom: 50px; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">ENIGME 2</h1>
            </div>
            <div class="row" style="margin: 0;">
                <div class="col-6 col-lg-12">
                    <button class="btn_hiero" @click="lettre('T')">T</button>
                    <button class="btn_hiero" @click="lettre('C')">C</button>
                    <button class="btn_hiero" @click="lettre('Z')">Z</button>
                    <button class="btn_hiero" @click="lettre('R')">R</button>
                    <button class="btn_hiero" @click="lettre('Y')">Y</button>
                    <button class="btn_hiero" @click="lettre('A')">A</button>
                    <button class="btn_hiero" @click="lettre('E')">E</button>
                    <button class="btn_hiero" @click="lettre('G')">G</button>
                    <button class="btn_hiero" @click="lettre('B')">B</button>
                    <button class="btn_hiero" @click="lettre('W')">W</button>
                    <button class="btn_hiero" @click="lettre('H')">H</button>
                    <button class="btn_hiero" @click="lettre('I')">I</button>
                    <button class="btn_hiero" @click="lettre('J')">J</button>
                </div>
                <div class="col-6 col-lg-12">
                    <button class="btn_hiero" @click="lettre('Q')">Q</button>
                    <button class="btn_hiero" @click="lettre('F')">F</button>
                    <button class="btn_hiero" @click="lettre('P')">P</button>
                    <button class="btn_hiero" @click="lettre('L')">L</button>
                    <button class="btn_hiero" @click="lettre('X')">X</button>
                    <button class="btn_hiero" @click="lettre('M')">M</button>
                    <button class="btn_hiero" @click="lettre('U')">U</button>
                    <button class="btn_hiero" @click="lettre('N')">N</button>
                    <button class="btn_hiero" @click="lettre('O')">O</button>
                    <button class="btn_hiero" @click="lettre('S')">S</button>
                    <button class="btn_hiero" @click="lettre('V')">V</button>
                    <button class="btn_hiero" @click="lettre('K')">K</button>
                    <button class="btn_hiero" @click="lettre('D')">D</button>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mx-auto">
                    <input v-model="password" disabled="" style="width: 100%; margin-top: 50px; font-family: hieroglyphes; font-size: 50px; color: black; border-radius: 20px 20px 20px 20px;">
                </div>
            </div>
            <div class="col-md-4 mx-auto" style="margin-top: 20px;">
                <button class="button_egypte" @click="effacer()">EFFACER</button>

                <p class="sous-texte" style="margin-top: 20px;">
                    Ton partenaire est bloqué à l'énigme 1 :<br>
                    "Donne la vue au sarcophage"
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "enigme2",
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
        lettre(n)
        {
            this.password = this.password + n;
            this.verify();
        },
        verify()
        {
            if(this.password === "TOMBE")
            {
                this.room.enigme = 3;
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




</style>
