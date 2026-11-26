<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div v-if="Turn === true && winner === null">
                A vous de jouer
            </div>
            <div v-if="Turn === false && winner === null">
                A tour de l'archer
            </div>
            <div v-if="winner === 1">
                Vous avez gagné
            </div>
            <div v-if="winner === 2">
                Gerrad L'archer a gagné
            </div>
            <div class="row mb-3 justify-content-center" v-for="n in arrow">
                <div class="arrow" v-on:click="pick_arrow()"></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <button v-on:click="start_game()" v-if="Turn === null">Commencer la partie</button>
                    <button v-on:click="skip_turn()" v-if="Turn !== null">Tour terminé</button>
                </div>
                Tours : {{ Turn }}
                Cliques : {{ Click }}
                Nombre de flèches : {{ Player_arrows }}
                Flèches restantes : {{ arrow }}
                Vainqueur : {{ winner }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Enigma_3_1",
    data() {
        return {
            // décompte des flèches
            arrow: 13,
            // Si c'est true c'est au tour du joueur sinon c'est a l'ordi
            Turn: null,
            // Permet de limiter a 3 maximum le nombre de flèches choisies par l'utilisateur
            Click: 0,
            // Compte le nombre de flèches choisies par le joueur, cela représentera son nombre d'essai pour l'épreuve suivante du tir à l'arc
            Player_arrows: 0,
            // Si égale à 1 le joueur gagne, si égale a 2 c'est l'ordi qui gagne
            winner: null,
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
                this.Player_arrows += 1;
                this.Click = this.Click + 1;
                this.end_game()
            } else if (this.Turn === true && this.Click >= 3) {
                this.skip_turn();
                this.end_game()
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
                    if (this.arrow >= 3) {
                        this.arrow = this.arrow - Math.floor(Math.random() * 3);
                    }else if(this.arrow <= 2){
                        this.arrow = this.arrow - Math.floor(Math.random() * 2);
                    }else if(this.arrow === 1){
                        this.arrow = this.arrow - 1;
                    }
                    this.end_game()
                    this.Click = 0;
                    this.Turn = true;
                }, duration);
            }
        },
        end_game() {
            if (this.arrow <= 0) {
                if (this.Turn === true) {
                    this.winner = 2;
                } else if (this.Turn === false) {
                    this.winner = 1;
                }
                setTimeout(() => {
                    this.parent.Arrow_game = false;
                    this.parent.Achery = true;
                })
            }
        },
    },
}
</script>

<style scoped>
.arrow {
    height: 10px;
    width: 50px;
    background-color: #0f6674;
}
</style>
