<template>
    <div>
        <div class="row">
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
                                                        <div class="wa yellow x-ring" score="X"> <!-- X -->
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
        </div>
        <button v-on:click="[player_scoping(), scoping_step+=1]">Viser</button>
        {{this.scopeX}}
        {{this.scopeY}}
        {{this.scoping_step}}
        {{this.points}}
    </div>
</template>

<script>

export default {
    name: "enigma_3_2",
    pros: ['parent'],
    data() {
        return {
            scopeX: null,
            scopeY: null,
            posX: 0,
            posY: 0,
            interval: null,
            scoping_step: 0,
            points: null,
        }
    },
    mounted() {
        this.calcPoints();
    },
    computed: {},
    methods: {
        player_scoping() {
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
        beforeDestroy() {
            clearInterval(this.interval)
        },
        calcPoints(y,x){
            if (0<y<20 && x<20){
                this.points = 10
            }
        },
    }
}


</script>

<style scoped>

canvas {
    width: 100%;
    height: 500px;
    border: solid 1px black;
}

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
    border-radius: 50%;
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
