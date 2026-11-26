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
                Pour nous aider dans l'amélioration de nos salle, peux-tu répondre à ce formulaire ? Voici ton code nous permettant d'attester que tu as terminé la salle : R404T1<br>
           </p>
            <a href="https://docs.google.com/forms/d/e/1FAIpQLScZg3JuffjBdst6Xvkqn23HaeeTc15zQNKrmo8BeD6o-NjJUw/formResponse">Lien vers le formulaire</a>

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
        this.end();
    },
    methods: {
        home() {
            window.location.href = '/home'
        },
        end()
        {
            this.room.end = true
            this.room.room_status = "victory"
        },
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
