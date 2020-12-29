<template>
    <div class="terminal-body text-center">
        <div class="body-c">
            <h1 class="terminal-title">ACCESS DENIED</h1><br><br>
            <p class="terminal-text">
                Bien joué !<br>
                Vous aviez presque réussi à désactiver les ogives !<br><br>

                Mais vous imaginez bien que si j’ai été capable de pirater l’un des réseaux les<br>
                plus sécurisés du monde, je n’allais pas simplement laisser l’ancien mot de passe !<br>

                Bien, vous commencez à comprendre...<br><br>

                Et si nous nous amusions un peu ?<br><br>

                Visiblement, vous avez su traduire un mot de passe en hexadecimal.<br>
                Que diriez-vous de faire un peu de binaire ?<br><br>

                Je n’aime pas beaucoup les chiffres pairs, vous devriez les retirer<br><br>
            </p>
            <button class="btn-enigme" @click="suivant()">Enigme 2</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "enigme2",
    props: ['room'],
    data() {
        return {

        }
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
