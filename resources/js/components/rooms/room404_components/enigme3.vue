<template>
    <div class="terminal-body text-center">
        <div class="body-c">
            <p class="terminal-text">
                Vous êtes assez malin, je dois bien le reconnaître.<br><br>

                Mais celle-ci était facile !<br><br>

                Avez-vous lu le guide du voyageur galactique ?<br>
                C’est un livre que j’ai beaucoup apprécié, apparemment un certain nombre serait<br>
                la réponse au sens de la vie ? Qu’en pensez-vous ?<br>

                Personnellement, cette question me tracasse.<br>
                En tout cas, ce nombre pourrait être une partie de la réponse pour cette nouvelle énigme.<br><br><br>



                (Si vous ne connaissez pas ce nombre, c’est bien dommage,<br>
                vous risquez de perdre de précieuses secondes pour trouver la réponse)
            </p>
            <button class="btn-enigme" @click="suivant()">Enigme 3</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "enigme3",
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
