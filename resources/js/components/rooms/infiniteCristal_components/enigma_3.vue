<template>
    <div>
        <div v-if="Turn === true">
            A vous de jouer
        </div>
        <div v-if="Turn === false">
            A tour de l'archer
        </div>
        <div class="row mb-3" v-for="n in arrow">
            <div class="arrow" v-on:click="pick_arrow()"></div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <button v-on:click="start_game()">Commencer la partie</button>
            </div>
            <div class="col-md-6">
                <button v-on:click="skip_turn()">Tour terminé</button>
            </div>

            {{ Turn }}
            {{ Click }}
        </div>
    </div>
</template>

<script>
export default {
    name: "enigma_3.vue",
    props: ['room'],
    data() {
        return {
            arrow: 13,
            Turn: null,
            Click: 0,
        }
    },
    mounted() {
        this.cpu_turn()
    },
    methods: {
        start_game() {
            if (this.Turn === null) {
                this.Turn = true;
            }
        },
        pick_arrow() {
            if (this.Turn === true && this.Click < 3) {
                this.arrow = this.arrow - 1;
                this.Click = this.Click + 1;
            }else if(this.Turn === true && this.Click >= 3){
                this.skip_turn();
            }
        },
        skip_turn() {
            if (this.Turn === true) {
                this.Turn = false;
                this.cpu_turn(2000)
            }
        },
        cpu_turn(duration) {
            if (this.Turn === false) {
                setTimeout(() => {
                    this.arrow = this.arrow - Math.floor(Math.random() * 3);
                    this.Click = 0;
                    this.Turn = true;
                }, duration);
            }
        },
    },
}
</script>

<style scoped>
.arrow {
    height: 20px;
    width: 50px;
    background-color: #0f6674;
}

div {
    color: white;
}

</style>
