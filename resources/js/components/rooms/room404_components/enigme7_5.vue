<template>
    <div class="terminal-body text-center">
        <div class="body-c text-center">
            <p>Vos trésors</p>
            <div>
                <img class="coffre" src="img/Banque_graphique/Objets/BreakOut_Coffre_Surprise.png">
            </div>
            <p>
                Vous gagnez 500 pièces d'or !<br>
           </p>

        </div>
    </div>
</template>

<script>
export default {
    name: "enigme7_5",
    props: ['room'],
    data() {
        return {

        }
    },
    methods: {

    }
}
</script>
<style scoped>
    .coffre {
       max-width: 500px;
    }

</style>
