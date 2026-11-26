<template>
    <div class="terminal-body text-center">
        <div class="body-c">
            <audio id="music" src="audio/rooms/room404/0.mp3" loop autoplay></audio>
            <p class="terminal-text">
                Tic Tac Tic Tac...<br><br>

                Vous voyez les secondes passer n’est-ce pas ?<br>
                Vous n’avez toujours pas fini et le temps vous glisse entre les doigts.<br><br>

                Mais au point où vous en êtes, une énigme de plus ne devrait pas vous arrêter, si ?<br><br>

                Si vous réussissez celle-ci, alors nous pourrons passer aux choses sérieuses,<br>
                le moment que vous attendez tant approche !<br><br>

                Celle-ci devrait vous amuser !


            </p>
            <button class="btn-enigme" @click="suivant()">Enigme 6</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "enigme6",
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
