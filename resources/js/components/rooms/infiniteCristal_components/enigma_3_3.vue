<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="progress">
                    <div class="triangle" v-bind:style="{'left': posY + '%',}"></div>
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar bg-success" role="progressbar" style="width: 10%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 15%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary" v-on:click="[moveTriangle(), click+=1]" v-if="wood > 0">Couper la buche</button>
                <button class="btn btn-warning" v-on:click="[newWood(),]" v-if="wood <= 0">Nouvelle buche</button>
                <button class="btn btn-success" v-if="woodStack.length <= 0" v-on:click="changeView()">Revenir au tir à l'arc</button>
            </div>
        </div>
        {{ this.wood}}
        {{this.woodStack}}
    </div>
</template>

<script>
export default {
    name: "enigma_3_3",
    props: ['parent'],
    data(){
        return{
            posY: 0,
            click: 0,
            interval: null,
            wood: 100,
            woodStack: ["buche 1", "buche 2","buche 3","buche 4","buche 5","buche 6","buche 7","buche 8","buche 9","buche 10","buche 11","buche 12",]
        }
    },
    methods: {
        changeView(){
            this.parent.enigma_3_step = 2
        },
        moveTriangle() {
            if (this.click === 0){
                this.interval = setInterval(() => {
                    if (this.posY < 100) {
                        this.posY += 1
                    } else if (this.posY >= 100) {
                        this.posY = 0
                    }
                }, 10)
            }else if (this.click >= 1){
                this.beforeDestroy()
                if (this.posY >= 30 && this.posY <= 45){
                    this.wood -= 50
                }else if (this.posY >= 55 && this.posY <= 70){
                    this.wood -= 50
                }else if (this.posY >= 46 && this.posY <= 54){
                    this.wood -= 100
                }
                setTimeout(() => {
                    this.reinitiateDatas()
                }, 500)
            }
        },
        beforeDestroy() {
            clearInterval(this.interval)
        },
        reinitiateDatas(){
            this.click = 0
            this.posY = 0
        },
        newWood(){
            if (this.wood <= 0){
                this.woodStack.pop()
                this.wood = 100
            }
        }
    },

}
</script>

<style scoped>
.triangle{
    width: 5px;
    height: 50px;
    background-color: black;
    position: absolute;
}
</style>
