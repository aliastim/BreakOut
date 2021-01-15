<template>
    <div class="container inventory-body">
        <div class="row justify-content-center pt-3">
            <div class="md-6">
                INVENTAIRE
            </div>
            <div class="col-md-6">
                <button v-on:click="toMap">Carte</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "inventory",
    props: ['room'],
    data(){
        return{}
    },
    mounted() {},
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
