<template>
    <div class="terminal-body text-center">
        <div class="body-c">
            <h1 class="terminal-title">AUTHORIZED</h1><br><br>
            <p class="terminal-text">
                DÉSACTIVATION DES OGIVES NUCLÉAIRES...<br><br>


                ---------------------------------------------------------------------------<br><br>

                VOUS AVEZ RÉUSSI !!!<br>
                VOUS VENEZ DE SAUVER LE MONDE D’UNE CATASTROPHE NUCLÉAIRE !!<br>
                VOUS ETES UN VÉRITABLE HÉROS !!<br>
                NOUS AVONS EU RAISON DE CROIRE EN VOUS !<br>
                NOUS VOUS DEVONS UNE RECONNAISSANCE ÉTERNELLE, BRAVO !<br>
            </p>
            <button class="btn-enigme" @click="suivant()">Suivant</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "enigme7_3",
    props: ['room'],
    data() {
        return {

        }
    },
    methods: {
        suivant() {
            this.room.phase = 5;
        }
    }
}
</script>
<style scoped>


</style>
