<template>
    <div class="terminal-body text-center">
        <div class="body-c w-100">
            <audio id="music" src="/audio/rooms/anubisriddle/7.mp3" loop autoplay></audio>
            <div class="w-100">
                <h1 class="title-egypte" style="margin-bottom: 50px; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">ENIGME 7</h1>
            </div>

            <div class="d-flex justify-content-center" style="margin: 0;">
                <div class="steles" :class="{'stele1' : st1 === 0, 'stele2' : st1 === 1}" @click="stele1()"></div>
                <div class="steles" :class="{'stele1' : st2 === 0, 'stele2' : st2 === 1}" @click="stele2()" style="transform: rotate(180deg);"></div>
                <div class="steles" :class="{'stele1' : st3 === 0, 'stele2' : st3 === 1}" @click="stele3()"></div>
            </div>
            <div class="row" style="margin: 0;">
                <div class="col-md-4 mx-auto" style="margin-top: 20px;">
                    <p class="sous-texte" style="margin-top: 20px;">
                        L’Égypte est sous la domination<br>
                        romaine en 30 avant Jesus christ
                    </p>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "enigme7",
    props: ['room'],
    data() {
        return {
            st1: 0,
            st2: 0,
            st3: 0,
            password:"",
            interval: null,
            errors: []
        }
    },
    mounted() {
        document.title="Breakout - Anubis Riddle";
    },
    methods: {
        stele1() {
           this.st1 = 1;
           this.password = this.password + "A";
           this.verify();
        },
        stele2() {
            this.st2 = 1;
            this.password = this.password + "B";
            this.verify();
        },
        stele3() {
            this.st3 = 1;
            this.password = this.password + "C";
            this.verify();
        },
        verify()
        {
            console.log(this.password);
            if(this.password.length === 3)
            {
                if(this.password === "CAB")
                {
                    this.interval = setInterval(()=> {
                        this.room.enigme = 8;
                        this.room.phase = 0;
                    },1000);

                } else
                {
                    this.st1 = 0;
                    this.st2 = 0;
                    this.st3 = 0;
                    this.password = "";
                }
            }

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
    .steles
    {
        width: 100px;
        height: 100px;
        margin: 10px;
    }

    .stele1
    {
        background: url(/img/salles/anubis_riddle/stele1.png) center no-repeat;
        background-size: contain;
    }

    .stele2
    {
        background: url(/img/salles/anubis_riddle/stele2.png) center no-repeat;
        background-size: contain;
    }

</style>
