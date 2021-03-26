<template>
    <div>
        <canvas id="myCanvas" ref="myCanvas" width="1000" height="500"></canvas>
        <button v-on:click="start()">Commencer</button>
        <div class="row">
            <div class="col-md-6" id="test" ref="test">
                <div>
                    <img src="/img/salles/Crystal/nenuphar-fleure.png" alt="" width="100" height="auto" class="nenuphar" v-bind:style="{'left': posY + '%', 'top': posX + '%'}">
                </div>
                <div class="fairy" v-if="Fairy_1_free === true" v-on:click="Fairy_capture(1)"></div>
                <div class="fairy" v-if="Fairy_1_free === true" v-on:click="Fairy_capture(2)"></div>
                <div class="fairy" v-if="Fairy_1_free === true" v-on:click="Fairy_capture(3)"></div>
            </div>
            <div class="col-md-6 align-self-center" style="background-color: #0f6674">
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <div id="cristal"></div>
                    </div>
                    <div class="col-md-2 fairy" v-if="Fairy_1_captured === true"></div>
                    <div class="col-md-2 fairy" v-if="Fairy_2_captured === true"></div>
                    <div class="col-md-2 fairy" v-if="Fairy_2_captured === true"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "enigma_2",
    props: ['room'],
    data() {
        return {
            Fairy_1_free: true,
            Fairy_1_captured: false,
            Fairy_2_captured: false,
            Fairy_3_captured: false,
            posY: 0,
            posX: 0,
        }
    },
    mounted() {
        console.log(document.getElementById('test').offsetWidth)
        var canvas = document.getElementById("myCanvas");
        var ctx = canvas.getContext("2d");
        var ballRadius = 70;
        var x = canvas.width/2;
        var y = canvas.height-70;
        var x2 = canvas.width/5;
        var y2 = canvas.height-70;
        var dx = 2;
        var dy = -2;
        var dx2 = 2;
        var dy2 = -2;
        //var img = new Image();
        //img.src = "/img/salles/Crystal/nenuphar-fleure-50.png";
        //ctx.fillStyle = ctx.createPattern(img, 'no-repeat');

        function drawBall() {
            ctx.beginPath();
            ctx.arc(x, y, ballRadius, 0, Math.PI*2);
            ctx.fillStyle = "#0095DD";
            ctx.fill();
            ctx.closePath();
        }

        function drawBall2() {
            ctx.beginPath();
            ctx.arc(x2, y2, ballRadius, 0, Math.PI*2);
            ctx.fillStyle = "black";
            ctx.fill();
            ctx.closePath();
        }

        function draw() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            drawBall();
            drawBall2();

            if(x + dx > canvas.width-ballRadius || x + dx < ballRadius) {
                dx = -dx;
                console.log(test)
            }
            if(y + dy > canvas.height-ballRadius || y + dy < ballRadius) {
                dy = -dy;
                console.log(test)
            }

            if(x2 + dx2 > canvas.width-ballRadius || x2 + dx2 < ballRadius) {
                dx2 = -dx2;
                console.log(test)
            }
            if(y2 + dy2 > canvas.height-ballRadius || y2 + dy2 < ballRadius) {
                dy2 = -dy2;
                console.log(test)
            }

            x += dx;
            y += dy;
            x2 += dx2
            y2 += dy2
        }
        setInterval(draw, 10);
    },
    methods: {
        Fairy_capture(id) {
            if (id === 1) {
                this.Fairy_1_captured = true;
            } else if (id === 2) {
                this.Fairy_2_captured = true;
            } else {
                this.Fairy_3_captured = true;
            }
        },
        start2() {
            clearInterval(this.interval)
            this.interval = setInterval(() =>{
                let x = Math.floor(Math.random());
                let y = Math.floor(Math.random());
                if (this.posY < 90 || this.posX < 90){
                    this.posX += 0.25
                    this.posY += 0.25
                }else if (this.posY >= 90 || this.posX >= 90){
                    this.posX = 0
                    this.posY = 0
                }
            }, 10)
        },
        beforeDestroy() {
            clearInterval(this.interval)
        },
    }

}

</script>

<style scoped>
#bassin {
    height: 1000px;
    border: solid white;
    background-image: url(../../../../../public/img/salles/Crystal/water.jpeg);
}

#cristal {
    height: 100px;
    width: 100px;
    background-color: #bbb;
    border-radius: 50%;
}

.square {
    background-color: cornflowerblue;
    height: auto;
    width: 20px;
}

.fairy {
    background-color: pink;
    height: 20px;
    width: 20px;
}


.nenuphar {
    position: absolute;
}

canvas {
    background-image: url(../../../../../public/img/salles/Crystal/water.jpeg);
}

</style>
