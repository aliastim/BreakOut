<template>
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <button v-on:click="enigma1">Enigme 1</button>
            <button v-on:click="enigma2">Enigme 2</button>
            <button>Enigme 3</button>
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
        enigma1() {
            this.room.step = 1;
        },
        enigma2() {
            this.room.step = 2;
        }
    }
}
</script>

<style scoped>

</style>
