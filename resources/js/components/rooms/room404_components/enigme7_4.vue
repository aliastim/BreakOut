<template>
    <div class="terminal-body text-center">
        <div class="body-c text-center">
            <audio id="music" src="audio/rooms/room404/defeat.mp3" loop autoplay></audio>
            <div>
                <p class="terminal-text">
                    ACTIVATION DES OGIVES NUCLÉAIRES !<br>
                    ---------------------------------------------------------------------------<br>
                </p>
                <img class="nuc" src="img/salles/room404/nuc.gif">
                <p class="terminal-text" style="font-size: 14px;">
                    Malheureusement, vous n'avez pas réussi à venir à bout des pirates.<br><br>
                    La pression et le manque de temps auront eu raison de vous,<br>
                    la Terre n'est dorénavant plus qu'une vaste boule de poussières radiocatives<br><br>

                    Votre prouesse n'a pour autant pas été vaine !<br>
                    N'hésitez pas à faire face de nouveau à la ROOM404 !<br><br>

                    À TRÈS BIENTÔT !
                </p>

            </div>

            <button class="btn-enigme" @click="home()">Retour à l'accueil</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "enigme7_4",
    props: ['room'],
    data() {
        return {

        }
    },
    mounted() {
        document.title="Breakout - ROOM404";
        this.end();
    },
    methods: {
        home() {
            window.location.href = '/home'
        },
        end()
        {
            this.room.end = true
            this.room.room_status = "lost"
        },
    }
}
</script>
<style scoped>
    .nuc
    {
        max-width: 300px;
    }


</style>
