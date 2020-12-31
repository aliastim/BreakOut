<template>
    <div class="terminal-body text-center">
        <div class="body-c">
            <audio id="music" src="audio/rooms/room404/0.mp3" loop autoplay></audio>
            <p class="terminal-text">
                Encore une fois, vous me surpenez !<br>
                Avec vous je dois vraiment faire preuve d’imagination !<br>
                Très bien, je vais changer de méthode,<br>
                je vous conseille de rester attentif.<br>
            </p>
            <button class="btn-enigme" @click="suivant()">Enigme 5</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "enigme5",
    props: ['room'],
    data() {
        return {

        }
    },
    mounted() {
        document.title="Breakout - ROOM404";
    },
    methods: {
        suivant() {
            this.room.phase = 1;
        }
    }
}
</script>
<style scoped>


</style>
