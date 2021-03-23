<template>
    <div>
        <div class="row">
            <div class="col-md-10">
                <div class="container_target" score="M">
                    <div class="scope" ref="myScope" v-bind:style="{'left': posY + '%', 'top': posX + '%'}"></div>
                    <!-- wa (World Archery) target -->
                    <div class="wa white" score="1"> <!-- 1 -->
                        <div class="wa white" score="2"> <!-- 2 -->
                            <div class="wa black" score="3"> <!-- 3 -->
                                <div class="wa black" score="4"> <!-- 4 -->
                                    <div class="wa blue" score="5"> <!-- 5 -->
                                        <div class="wa blue" score="6"> <!-- 6 -->
                                            <div class="wa red" score="7"> <!-- 7 -->
                                                <div class="wa red" score="8"> <!-- 8 -->
                                                    <div class="wa yellow" score="9"> <!-- 9 -->
                                                        <div class="wa yellow ten-ring" score="10"> <!-- 10 -->

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                Tableau des scores
               <div class="row">
                   <div class="col-md-6">
                       Toi : {{scores(this.player_points_array)}}
                       {{turn}}
                   </div>
                   <div class="col-md-6">
                       Gerrard : {{scores(this.cpu_points_array)}}
                   </div>
               </div>
            </div>
            <button v-on:click="end_archery()">Fin du jeu</button>
        </div>
        <button class="btn btn-outline-primary" v-on:click="[scoping(), scoping_step+=1]"  v-if="this.scoping_step <= 3 || this.turn === 2">Viser</button>
        <button class="btn btn-outline-danger" v-if="this.turn === 1 && this.scoping_step >= 3" v-on:click="changeTurn()">Tour de l'archer</button>
    </div>
</template>

<script>

export default {
    name: "enigma_3_2",
    props: ['parent'],
    data() {
        return {
            scopeX: null,
            scopeY: null,
            posX: 0,
            posY: 0,
            interval: null,
            scoping_step: 0,
            player_points_array: [0],
            cpu_points_array : [0],
            //1 -> tour du joueur, 2 -> tour de l'ordinateur
            turn: this.parent.arrow_game_winner,
            end_game : false,
        }
    },
    methods: {
        scoping() {
            if (this.scoping_step === 0) {
                this.interval = setInterval(() => {
                    if (this.posY < 100) {
                        this.posY += 1
                    } else if (this.posY >= 100) {
                        this.posY = 0
                    }
                }, 10)
            }else if (this.scoping_step === 1){
                this.beforeDestroy()
                this.scopeY = this.posY
            }else if (this.scoping_step === 2){
                this.interval = setInterval(() => {
                    if (this.posX < 100) {
                        this.posX += 1
                    } else if (this.posX >= 100) {
                        this.posX = 0
                    }
                }, 10)
            }else if(this.scoping_step === 3){
                this.beforeDestroy()
                this.scopeX = this.posX
                this.calcPoints(this.scopeY, this.scopeX)
            }
        },
        reinitiatePos(){
            this.scopeX = null
            this.scopeY = null
            this.posX = 0
            this.posY = 0
            this.scoping_step = 0
        },

        changeTurn(){
            if (this.turn === 1){
                this.reinitiatePos()
                this.turn = 2
                this.cpu_scoping()
            }else if(this.turn === 2){
                this.reinitiatePos()
                this.turn = 1
            }
        },
        beforeDestroy() {
            clearInterval(this.interval)
        },
        calcPoints(y,x){
            console.log(x,y)
            if (y>0 && y<5 && x>0 && x<100){
                if (this.turn === 1){
                    this.player_points_array.push(1)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(1)
                }
            }else if(y>95 && y<100 && x>0 && x<100){
                if (this.turn === 1){
                    this.player_points_array.push(1)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(1)
                }
            }else if (y>0 && y<100 && x>0 && x<5){
                if (this.turn === 1){
                    this.player_points_array.push(1)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(1)
                }
            }else if (y>0 && y<100 && x>95 && x<100){
                if (this.turn === 1){
                    this.player_points_array.push(1)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(1)
                }
            }else if (y>5 && y<10 && x>5 && x<95){
                if (this.turn === 1){
                    this.player_points_array.push(2)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(2)
                }
            }else if (y>90 && y<95 && x>5 && x<95){
                if (this.turn === 1){
                    this.player_points_array.push(2)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(2)
                }
            }else if (y>5 && y<95 && x>5 && x<10){
                if (this.turn === 1){
                    this.player_points_array.push(2)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(2)
                }
            }else if (y>5 && y<95 && x>90 && x<95){
                if (this.turn === 1){
                    this.player_points_array.push(2)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(2)
                }
            }else if (y>10 && y<15 && x>10 && x<90){
                if (this.turn === 1){
                    this.player_points_array.push(3)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(3)
                }
            }else if (y>85 && y<90 && x>10 && x<90){
                if (this.turn === 1){
                    this.player_points_array.push(3)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(3)
                }
            }else if (y>10 && y<90 && x>10 && x<15){
                if (this.turn === 1){
                    this.player_points_array.push(3)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(3)
                }
            }else if (y>10 && y<90 && x>85 && x<90){
                if (this.turn === 1){
                    this.player_points_array.push(3)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(3)
                }
            }else if (y>15 && y<20 && x>15 && x<85){
                if (this.turn === 1){
                    this.player_points_array.push(4)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(4)
                }
            }else if (y>80 && y<85 && x>15 && x<85){
                if (this.turn === 1){
                    this.player_points_array.push(4)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(4)
                }
            }else if (y>15 && y<85 && x>15 && x<20){
                if (this.turn === 1){
                    this.player_points_array.push(4)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(4)
                }
            }else if (y>15 && y<85 && x>80 && x<85){
                if (this.turn === 1){
                    this.player_points_array.push(4)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(4)
                }
            }else if (y>20 && y<25 && x>20 && x<80){
                if (this.turn === 1){
                    this.player_points_array.push(5)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(5)
                }
            }else if (y>75 && y<80 && x>20 && x<80){
                if (this.turn === 1){
                    this.player_points_array.push(5)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(5)
                }
            }else if (y>20 && y<80 && x>20 && x<25){
                if (this.turn === 1){
                    this.player_points_array.push(5)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(5)
                }
            }else if (y>20 && y<80 && x>75 && x<80){
                if (this.turn === 1){
                    this.player_points_array.push(5)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(5)
                }
            }else if (y>25 && y<30 && x>25 && x<75){
                if (this.turn === 1){
                    this.player_points_array.push(6)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(6)
                }
            }else if (y>70 && y<75 && x>25 && x<75){
                if (this.turn === 1){
                    this.player_points_array.push(6)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(6)
                }
            }else if (y>25 && y<75 && x>25 && x<30){
                if (this.turn === 1){
                    this.player_points_array.push(6)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(6)
                }
            }else if (y>25 && y<75 && x>70 && x<75){
                if (this.turn === 1){
                    this.player_points_array.push(6)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(6)
                }
            }else if (y>30 && y<35 && x>30 && x<70){
                if (this.turn === 1){
                    this.player_points_array.push(7)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(7)
                }
            }else if (y>65 && y<70 && x>30 && x<70){
                if (this.turn === 1){
                    this.player_points_array.push(7)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(7)
                }
            }else if (y>30 && y<70 && x>30 && x<35){
                if (this.turn === 1){
                    this.player_points_array.push(7)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(7)
                }
            }else if (y>30 && y<70 && x>65 && x<70){
                if (this.turn === 1){
                    this.player_points_array.push(7)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(7)
                }
            }else if (y>35 && y<40 && x>35 && x<65){
                if (this.turn === 1){
                    this.player_points_array.push(8)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(8)
                }
            }else if (y>60 && y<65 && x>35 && x<65){
                if (this.turn === 1){
                    this.player_points_array.push(8)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(8)
                }
            }else if (y>35 && y<65 && x>35 && x<40){
                if (this.turn === 1){
                    this.player_points_array.push(8)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(8)
                }
            }else if (y>35 && y<40 && x>60 && x<65){
                if (this.turn === 1){
                    this.player_points_array.push(8)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(8)
                }
            }else if (y>40 && y<45 && x>40 && x<60){
                if (this.turn === 1){
                    this.player_points_array.push(9)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(9)
                }
            }else if (y>55 && y<60 && x>40 && x<60){
                if (this.turn === 1){
                    this.player_points_array.push(9)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(9)
                }
            }else if (y>40 && y<60 && x>40 && x<45){
                if (this.turn === 1){
                    this.player_points_array.push(9)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(9)
                }
            }else if (y>40 && y<60 && x>55 && x<60){
                if (this.turn === 1){
                    this.player_points_array.push(9)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(9)
                }
            }else if (y>45 && y<55 && x>45 && x<55){
                console.log(x,y)
                if (this.turn === 1){
                    console.log(x,y)
                    this.player_points_array.push(10)
                }else if(this.turn === 2){
                    this.cpu_points_array.push(10)
                }
            }
        },
        cpu_scoping(){
          let cpu_x = Math.floor(Math.random() * 100);
          let cpu_y = Math.floor(Math.random() * 100);
          this.calcPoints(cpu_y, cpu_x);
          this.changeTurn()
        },
        scores(x){
            const array = x;
            const reducer = (accumulator, currentValue) => accumulator + currentValue;
            return array.reduce(reducer);
        },
        end_archery(){
            console.log('end_archery')
            if (this.scores(this.player_points_array) >= 30){
                this.end_game = true
                this.parent.room.step = 4
            }else if (this.scores(this.cpu_points_array) >= 30){
                console.log('loose archery')
                this.parent.enigma_3_step = 3
            }else{
                console.log('else archery')
            }
        }
    },
    mounted() {

    },
}


</script>

<style scoped>

.container_target {
    box-sizing: border-box;
    width: 400px;
    height: 400px;
    margin: 50px auto;
    position: relative;
}

.arrow {
    position: absolute;
    pointer-events: none;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    cursor: default;
    height: 10px;
    width: 10px;
    background-color: #2B2926;
    border: 1px solid white;
    border-radius: 50%;
}

.wa {
    box-sizing: border-box;
    height: 100%;
    width: 100%;
    border-radius: 4%;
    border: 1px solid black;
    padding: 19px;
}

.black {
    background-color: #2B2926;
    border: 1px solid white;
}

.blue {
    background-color: #00BCE2;
}

.red {
    background-color: #EF3340;
}

.yellow {
    background-color: #F9E526;
}

.white {
    background-color: white;
}

.ten-ring {
    padding: 9px;
}

.x-ring {
    padding: 0;
}

.scope {
    height: 5px;
    width: 5px;
    background-color: black;
    border-radius: 50%;
    display: flex;
    position: absolute;
}

</style>
