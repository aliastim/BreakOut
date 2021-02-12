<template>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row mb-3 justify-content-center" v-for="n in arrow">
                <div class="arrow" v-on:click="pick_arrow(n)" v-bind:id="n">{{n}}</div>
            </div>
            <div class="row" style="position:fixed">
                <div class="col-md-6">
                    <button v-on:click="start_game()" v-if="turn === null">Commencer la partie</button>
                    <button v-on:click="skip_turn()" v-if="turn !== null && winner === null">Tour terminé</button>
                    <button v-if="winner === 1" v-on:click="parent.enigma_3_step = 2">Etape suivante</button>
                </div>
                Tours : {{ turn }}
                Cliques : {{ Click }}
                Nombre de flèches : {{ Player_arrows }}
                Flèches restantes : {{ arrow }}
                Vainqueur : {{ winner }}
                plays : {{ plays }}
                etape : {{ this.parent.enigma_3_step}}
            </div>
        </div>
        <div class="col-md-2">
            <div class="row">
                <div class="col-md-12">
                    <div v-if="turn === true && winner === null">A toi de jouer</div>
                    <div v-if="turn === false && winner === null">Gerrard l'archer joue</div>
                    <div v-if="winner === 1">
                        Vous avez gagné
                    </div>
                    <div v-if="winner === 2">
                        Gerrard L'archer a gagné
                    </div>
                </div>
                <div class="col-md-12">
                    <ul v-for="play in plays">
                        <li>{{ play }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Enigma_3_1",
    props: ['parent'],
    data() {
        return {
            // décompte des flèches
            arrow: 13,
            // Si c'est true c'est au tour du joueur sinon c'est a l'ordi
            turn: null,
            // Permet de limiter a 3 maximum le nombre de flèches choisies par l'utilisateur
            Click: 0,
            // Compte le nombre de flèches choisies par le joueur, cela représentera son nombre d'essai pour l'épreuve suivante du tir à l'arc
            Player_arrows: 0,
            // Si égale à 1 le joueur gagne, si égale a 2 c'est l'ordi qui gagne
            winner: null,
            plays: [],
        }
    },
    mounted() {
        this.cpu_turn()
    },
    methods: {
        start_game() {
            if (this.turn === null) {
                this.turn = true;
            }
        },
        pick_arrow() {
            if (this.turn === true && this.Click < 3) {
                this.arrow = this.arrow - 1;
                this.Player_arrows += 1;
                this.Click = this.Click + 1;
                this.end_game()
            } else if (this.turn === true && this.Click >= 3) {
                this.skip_turn();
                this.end_game()
            }
        },
        skip_turn() {
            if (this.turn === true && this.Click > 0) {
                this.turn = false;
                this.cpu_turn(2000)
            }
        },
        cpu_turn(duration) {
            if (this.turn === false) {
                this.plays.push(this.Click);
                setTimeout(() => {
                    if (this.arrow >= 3) {
                        let x = Math.floor(Math.random() * 2 + 1);
                        this.arrow = this.arrow - x;
                        this.plays.push(x);
                    }else if(this.arrow <= 2){
                        let x = Math.floor(Math.random() + 1);
                        this.arrow = this.arrow - x;
                        this.plays.push(x);
                    }else if(this.arrow === 1){
                        this.arrow = this.arrow - 1;
                        this.plays.push(1);
                    }
                    this.end_game()
                    this.Click = 0;
                    this.turn = true;
                }, duration);
            }
        },
        end_game() {
            if (this.arrow <= 0) {
                if (this.turn === true) {
                    this.winner = 2;
                } else if (this.turn === false) {
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
