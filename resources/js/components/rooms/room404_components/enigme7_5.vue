<template>
    <div class="terminal-body text-center">
        <div class="body-c text-center">
            {{ gold }}
            <p class="terminal-text" style="font-size: 30px; font-weight: 900;">VICTOIRE</p>
            <div>
                <img class="coffre" src="img/Banque_graphique/Objets/BreakOut_Coffre_Surprise.png">
            </div>
            <p class="terminal-text">
                <br>Pour vous récompenser de vos prouesses,<br>
                <B>500</B> pièces d'or ont été ajoutées à votre compte !<br><br>
           </p>

            <button class="btn-enigme" @click="home()">Retour à l'accueil</button>

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
    mounted() {
        document.title="Breakout - ROOM404";
    },
    methods: {
        home() {
            window.location.href = '/home'
        }
    },
    computed: {
        gold() {
            const data = {
                gold: 500,
            }
            this.room.app.req.post("useritems/addgold", data).then(response => {
                console.log(response.data);
            });

            //console.log("gold");
        }
    }
}
</script>
<style scoped>
    .coffre {
       max-width: 500px;
    }

</style>
