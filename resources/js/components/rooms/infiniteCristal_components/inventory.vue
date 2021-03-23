<template>
    <div class="container inventory-body">
        <div class="row">
            <div class="col-md-10 offset-1">
                <div class="row justify-content-center pt-3">
                    <div class="md-6">
                        INVENTAIRE
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary" v-on:click="toMap">Carte</button>
                    </div>
                </div>
                <div v-if="this.room.step === 1">
                    <div class="row">
                        1 : <img :src="'/images/crystal_infini/1.png'" alt="">
                    </div>
                    <div class="row">
                        2 : <img :src="'/images/crystal_infini/2.png'" alt="">
                    </div>
                    <div class="row">
                        3 : <img :src="'/images/crystal_infini/3.png'" alt="">
                    </div>
                    <div class="row">
                        4 : <img :src="'/images/crystal_infini/4.png'" alt="">
                    </div>
                    <div class="row">
                        5 : <img :src="'/images/crystal_infini/5.png'" alt="">
                    </div>
                    <div class="row">
                        6 : <img :src="'/images/crystal_infini/6.png'" alt="">
                    </div>
                    <div class="row">
                        7 : <img :src="'/images/crystal_infini/7.png'" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "inventory",
    props: ['room'],
    data() {
        return {}
    },
    mounted() {
    },
    methods: {
        toMap() {
            this.room.step = 0;
        },
    }
}
</script>

<style scoped>
.inventory-body {
    background-color: #1b1e21;
    height: 80vh;
    color: white;
}
</style>
