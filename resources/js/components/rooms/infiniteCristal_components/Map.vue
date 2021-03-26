<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-auto">
                <h1>A la recherche du cristal d'infini</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-auto">
                <button class="btn btn-primary" v-on:click="enigme(1)">Enigme 1</button>
                <button class="btn btn-outline-primary" v-on:click="enigme(2)">Enigme 2</button>
                <button class="btn btn-primary" v-on:click="enigme(3)">Enigme 3</button>
                <button class="btn btn-outline-danger" v-on:click="enigme(4)">Enigme 4</button>
                <button class="btn btn-outline-danger" v-on:click="enigme(5)">Enigme 5</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Map",
    props: ['room'],
    data() {
        return {}
    },
    mounted() {

    },
    methods: {
        enigme(x) {
            this.room.step = x;
        },
    }
}
</script>

<style scoped>

</style>
