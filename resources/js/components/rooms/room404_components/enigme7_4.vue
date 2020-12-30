<template>
    <div class="terminal-body text-center">
        <div class="body-c text-center">
            <div>
                <p class="terminal-text">
                    Perdu<br>
                </p>
                <img class="nuc" src="img/salles/room404/nuc.png">
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
    methods: {
        home() {
            window.location.href = '/home'
        }
    }
}
</script>
<style scoped>
    .nuc
    {
        max-width: 300px;
    }


</style>
