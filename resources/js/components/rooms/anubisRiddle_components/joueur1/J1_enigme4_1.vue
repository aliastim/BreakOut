<template>
    <div class="terminal-body text-center">
        <div class="body-c w-100">
            <div class="w-100" style="margin-bottom: -50px; margin-top: -100px;">
                <h1 class="title-egypte" style="margin-bottom: 50px; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">ENIGME 4</h1>
            </div>

            <div class="row" style="margin: 0;">
                <audio style="display:none" ref="player_do">
                    <source src="/audio/rooms/anubisriddle/melodie/Do.wav" type="audio/mpeg" />
                </audio>
                <audio style="display:none" ref="player_re">
                    <source src="/audio/rooms/anubisriddle/melodie/Re.wav" type="audio/mpeg" />
                </audio>
                <audio style="display:none" ref="player_mi">
                    <source src="/audio/rooms/anubisriddle/melodie/Mi.wav" type="audio/mpeg" />
                </audio>
                <audio style="display:none" ref="player_fa">
                    <source src="/audio/rooms/anubisriddle/melodie/Fa.wav" type="audio/mpeg" />
                </audio>
                <audio style="display:none" ref="player_sol">
                    <source src="/audio/rooms/anubisriddle/melodie/Sol.wav" type="audio/mpeg" />
                </audio>
                <audio style="display:none" ref="player_la">
                    <source src="/audio/rooms/anubisriddle/melodie/La.wav" type="audio/mpeg" />
                </audio>
                <audio style="display:none" ref="player_si">
                    <source src="/audio/rooms/anubisriddle/melodie/Si.wav" type="audio/mpeg" />
                </audio>
                <audio style="display:none" ref="player_do2">
                    <source src="/audio/rooms/anubisriddle/melodie/Do2.wav" type="audio/mpeg" />
                </audio>
                <audio style="display:none" ref="player_melodie">
                    <source src="/audio/rooms/anubisriddle/melodie/Melodie.wav" type="audio/mpeg" />
                </audio>

                <div class="col-md-12 text-center" style="margin-top: 50px;">
                    <button class="btn_meldodie" @click="audio_do()">Do</button>
                    <button class="btn_meldodie" @click="audio_re()">Re</button>
                    <button class="btn_meldodie" @click="audio_mi()">Mi</button>
                    <button class="btn_meldodie" @click="audio_fa()">Fa</button>
                    <button class="btn_meldodie" @click="audio_sol()">Sol</button>
                    <button class="btn_meldodie" @click="audio_la()">La</button>
                    <button class="btn_meldodie" @click="audio_si()">Si</button>
                    <button class="btn_meldodie" @click="audio_do2()">Do</button>
                </div>
                <div class="col-12">
                    <button class="button_egypte mt-5" @click="effacer()" style="padding: 5px 100px;">RECOMMENCER</button>
                </div>
            </div>
            <div class="w-100 text-center">
                <p class="sous-texte" style="margin-top: 40px;">
                    Ton partenaire est bloqué à l'énigme 3 :<br>
                    "Clique sur le symbole de la plume"
                </p>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "enigme4",
    props: ['room'],
    data() {
        return {
            password: "",
            interval : null,
            errors: []
        }
    },
    mounted() {
        document.title="Breakout - Anubis Riddle";
    },
    methods: {
        audio_do()
        {
            var audio = this.$refs.player_do;
            audio.play();

            this.note("Do");
        },
        audio_re()
        {
            var audio = this.$refs.player_re;
            audio.play();

            this.note("Re");
        },
        audio_mi()
        {
            var audio = this.$refs.player_mi;
            audio.play();

            this.note("Mi");
        },
        audio_fa()
        {
            var audio = this.$refs.player_fa;
            audio.play();

            this.note("Fa");
        },
        audio_sol()
        {
            var audio = this.$refs.player_sol;
            audio.play();

            this.note("Sol");
        },
        audio_la()
        {
            var audio = this.$refs.player_la;
            audio.play();

            this.note("La");
        },
        audio_si()
        {
            var audio = this.$refs.player_si;
            audio.play();

            this.note("Si");
        },
        audio_do2()
        {
            var audio = this.$refs.player_do2;
            audio.play();

            this.note("Do2");
        },
        note(n)
        {
            this.password=this.password+(n.toUpperCase());
            console.log(this.password);
            this.verify();
        },
        verify()
        {
            if(this.password === "RESOLLADO2")
            {
                var audio = this.$refs.player_melodie;
                audio.play();

                this.interval = setInterval(()=> {
                    this.room.enigme = 5;
                    this.room.phase = 0;
                    console.log('test');

                },3000);


            }
        },
        effacer()
        {
            this.password = "" ;
        }
    },
    beforeDestroy () {
        clearInterval(this.interval)
    },
    computed: {

    }
}
</script>
<style scoped>
    .btn_meldodie
    {
        font-family: Volte;
        width: 50px;
        height: 100px;
        font-size: 20px;
        color: black;
        background: white;
        border-radius: 40px 40px 40px 40px;
    }
</style>
