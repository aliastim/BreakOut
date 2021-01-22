<template>
    <div class="terminal-body text-center">
        <div class="body-c w-100">
            {{ fade }}
            <div class="container text-center mt-3">
                <div>
                    <transition name="fade">
                        <p v-if="show" class="texte-fin">
                           VICTOIRE
                        </p>
                    </transition>
                    <transition name="fade">
                        <div v-if="(show === true) && (show_etape >= 1)" class="row" style="margin: 0;">
                            <div class="mx-auto">
                                <img src="/img/salles/anubis_riddle/balance.png" class="img-fluid balance">
                            </div>
                        </div>
                    </transition>

                </div>
                <div class="text-center">
                    <div class="mt-5">
                        <transition name="fade">
                            <div v-if="(show === true) && (show_etape >= 2)">
                                <p class="texte-intro">
                                    Vous avez tous les deux choisi le sacrifice, ce qui est une qualité rare. Anubis vous laisse la vie sauve.
                                </p>
                                <button class="btn-enigme" @click="home()">Retour à l'accueil</button>
                            </div>
                        </transition>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Victory",
    props: ['room'],
    data() {
        return {
            show: false,
            show_etape: 0,

            errors: []
        }
    },
    mounted() {
        document.title="Breakout - Anubis Riddle";
    },
    methods: {
        home() {
            window.location.href = '/home'
        }
    },
    computed: {
        fade: function ()
        {
            this.$interval = setInterval(()=> {
                this.show = true;
                this.$interval = setInterval(()=> {
                    this.show_etape++;
                }, 1000);
            }, 1000);
        }
    }
}
</script>
<style scoped>
.texte-fin
{
    font-family: Volte;
    font-size: 2.5rem;
    color: rgb(248, 170, 34);
    margin-bottom: 50px;
}
.balance
{
    max-height: 300px;
}

.btn-enigme
{
    margin-top: 50px;
    padding: 10px 20px;
    font-family: Volte;
    color: rgb(248, 170, 34);
    background: none;
    border: 1px solid rgb(248, 170, 34);
    border-radius: 2px;
    border-radius: 4px;
    text-transform: uppercase;
    transition: 0.3s;
    cursor: pointer;
}


.btn-enigme:hover
{
    color: #2e4157;
    background:  rgb(248, 170, 34);
}

</style>
