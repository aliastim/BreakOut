<template>
    <div class="row justify-content-center">
        <h1>A la recherche du cristal d'infini</h1>
        <div class="col-md-auto">
            <button v-on:click="enigme(1)">Enigme 1</button>
            <button v-on:click="enigme(2)">Enigme 2</button>
            <button v-on:click="enigme(3)">Enigme 3</button>
            <button>Enigme 4</button>
            <button>Enigme 5</button>
            <button>Enigme 6</button>
            <button>Enigme 7</button>
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
