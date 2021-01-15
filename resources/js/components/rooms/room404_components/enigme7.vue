<template>
    <div class="terminal-body text-center">
        <div class="body-c">
            <audio id="music" src="audio/rooms/room404/0.mp3" loop autoplay></audio>
            <p class="terminal-text">
                Eh bien, je vous félicite, vous avez résolu toutes mes énigmes !<br><br>

                Comme promis, nous arrivons au moment que vous attendiez tant, les ogives !<br><br>

                Je dois avouer que je suis impatient de savoir si vous allez réussir à les déverouiller à temps.<br><br>

                Bonne chance !
            </p>
            <button class="btn-enigme" @click="suivant()">Enigme 7</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "enigme7",
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
