<template>
    <div class="terminal-body">
        <p class="terminal-text">
            //////////////JOURNAL_DE_BORD<br>
            > Last Message (22:38:09) :<br>
            ALERTE, CECI EST UN MESSAGE URGENT !!!<br>
            LE SYSTÈME DE MISE À FEU DES OGIVES NUCLÉAIRES A ÉTÉ ACTIVÉ.<br>
            NOUS NE SAVONS PAS COMMENT IL A PU SE DÉCLENCHER !!<br>
            NOUS N’AVONS AUCUN MOYEN DE DÉSACTIVER LE SYSTÈME NOUS-MÊMES,<br>
            IL EST NÉCESSAIRE D’ÊTRE CONNECTÉ À L'ORDINATEUR DE BORD<br>
            ET DE RENTRER LES CODES DE DÉSACTIVATION.<br>
            SI VOUS VOYEZ CE MESSAGE, ALORS VOUS ÊTES LE SEUL ESPOIR<br>
            POUR ÉVITER UNE CATASTROPHE NUCLÉAIRE MONDIALE.<br>
            LE SYSTÈME DÉCOMPTE UNE HEURE AVANT LE LANCEMENT DES MISSILES,<br>
            LE TEMPS QUE VOUS LISIEZ CE MESSAGE, UNE PARTIE DU TEMPS SE SERA DÉJÀ ÉCOULÉE, NE PERDEZ PLUS DE TEMPS.<br>
            LE CODE DE DÉSACTIVATION EST : FACE34.<br>
            BONNE CHANCE, LE MONDE COMPTE SUR VOUS !<br>
            ><br>
            > Tapez 0 pour revenir<br>
            > <input class="terminal-input" type="text" id="terminal-input" v-model="input" @keyup="inputverify()" autofocus>
        </p>
    </div>
</template>

<script>
export default {
    name: "enigme1_1",
    props: ['room'],
    data() {
        return {
            input: ""
        }
    },
    methods: {
        inputverify() {
            if(this.input === "0")
            {
                this.room.phase = 0;

            } else
            {
                //console.log(this.input);
                this.input = "";
            }

        }
    }
}
</script>
<style scoped>
.terminal-input
{
    border: none;
    border-bottom: 1.5px solid rgba(31, 240, 66, 1);
    font-family: Roboto;
    background: none;
    color: #1FF042;
    font-size: 20px;
    width: 15px;
    animation: 1.2s press infinite;
}
@keyframes press {
    0% {
        border-bottom: 1.5px solid rgba(31, 240, 66, 1);
    }
    25% {
        border-bottom: 1.5px solid rgba(31, 240, 66, 1);
    }
    26% {
        border-bottom: 1.5px solid rgba(31, 240, 66, 0);
    }
    74% {
        border-bottom: 1.5px solid rgba(31, 240, 66, 0);
    }
    75% {
        border-bottom: 1.5px solid rgba(31, 240, 66, 1);
    }
    100% {
        border-bottom: 1.5px solid rgba(31, 240, 66, 1);
    }
}

</style>
