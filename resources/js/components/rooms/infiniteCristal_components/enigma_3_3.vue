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
                <button class="btn btn-primary" v-on:click="[moveTriangle(), click+=1]">Bouton</button>
            </div>
        </div>
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
        }
    },
    methods: {
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
            }
        },
        beforeDestroy() {
            clearInterval(this.interval)
        },
    }

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
