<template>
    <div class="terminal-body text-center">
        <div class="body-c">
            <p class="terminal-text">
                Décidément vous êtes plutot perspicace,<br>
                je commence même à croire en vous !<br><br>

                Et si nous éteignions la lumière pour cette prochaine énigme ?
            </p>
            <button class="btn-enigme" @click="suivant()">Enigme 4</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "enigme4",
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
