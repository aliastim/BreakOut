<template>
    <div class="terminal-body">
        <div class="body-c">
            <p class="terminal-text">
                > ERROR ROOM UNLOCKED<br>
                ><br>
                > System Message<br>
                > Select a choice :<br>
                ><br>
                > 1) Journal de bord<br>
                > 2) Accès système<br>
                > <input class="terminal-input" type="text" id="terminal-input" v-model="input" @keyup="inputverify()" autofocus>
            </p>
        </div>
    </div>
</template>

<script>
export default {
    name: "enigme1",
    props: ['room'],
    data() {
        return {
            input: ""
        }
    },
    methods: {
        inputverify() {
            if(this.input === "1")
            {
                this.room.phase = 1;

            } else if (this.input === "2")
            {
                // Vraie réponse
                this.room.phase = 2;

                // Déplacement rapide
                /*this.room.enigme = 6;
                this.room.phase = 0;*/

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
