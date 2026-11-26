<template>
    <div class="terminal-body text-center">
        <div class="body-c w-100">
            <div class="container text-center mt-3">
                <div style="margin-top: -50px;">
                    <div><img class="logo img-fluid" src="/img/salles/anubis_riddle/logo.png"></div>
                    <div>
                        <p class="texte-intro" style="font-size: 16px;">
                            <span style="color: #f7aa1d; font-family: Trajan_bold; font-size: 13px;">Cette salle se joue à deux joueurs</span><br>
                        </p>
                        <hr style="border: 0.5px solid #E3B05C; max-width: 200px;">
                        <p class="texte-intro" style="font-size: 16px;">
                            <span>Vous aurez besoin de communiquer pour pouvoir avancer dans le jeu</span><br>
                            <B style="color: orangered;">Attention, pensez à bien conserver vos réponses, vous en aurez sans doute besoin à plusieurs reprises...</B>

                        </p>

                    </div>
                    <div class="buttons-players d-flex">
                        <div class="mr-auto">
                            <button @click="joueur_un()">Je suis le joueur 1</button>
                        </div>
                        <div>
                            <button @click="joueur_deux()">Je suis le joueur 2</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "enigme0",
    props: ['room'],
    data() {
        return {
            errors: []
        }
    },
    mounted() {
        document.title="Breakout - Anubis Riddle";
    },
    methods: {
        joueur_un() {
            this.room.player = 1;

            /*Passe-muraille*/
            /*this.room.enigme= 1;
            this.room.phase= 1;*/

        },
        joueur_deux() {
            this.room.player = 2;

            /*Passe-muraille*/
            /*this.room.player = 0;
            this.room.enigme= 0;
            this.room.phase= 0;*/
        }
    }
}
</script>
<style>
    .logo
    {
        max-height: 300px;
    }

    .buttons-players
    {
        max-width: 500px;
        padding-top: 50px;
        margin: auto;
    }

    .buttons-players>div>button
    {
       /*padding: 15px 20px;*/
       padding-top: 15px;
       padding-bottom: 15px;
       width: 200px;
       border: 1px outset #f7aa1d;
       border-radius: 5px;
       color: #f7aa1d;
       font-family: Trajan;
       background: none;
       transition: 0.3s;
       cursor: pointer;
    }

    .buttons-players>div>button:hover
    {
        font-family: Trajan_bold;
        color: #2e4157;
        background: #E3B05C;
        box-shadow: 0 0 7px #E3B05C;
    }


</style>
