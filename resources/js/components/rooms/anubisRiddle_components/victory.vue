<template>
    <div class="terminal-body text-center">
        <div class="body-c w-100">
            <audio id="music" src="/audio/rooms/anubisriddle/victory.mp3" loop autoplay></audio>
            {{ fade }}
            {{ gold }}
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
                                <p class="pgold">
                                    500 pièces d'or ont été ajoutées à votre compte !
                                </p>
                                <p>Pour nous aider dans l'amélioration de nos salle, peux-tu répondre à ce formulaire ? Voici ton code nous permettant d'attester que tu as terminé la salle : AR2021R</p>
                                <a href="https://docs.google.com/forms/d/e/1FAIpQLScZg3JuffjBdst6Xvkqn23HaeeTc15zQNKrmo8BeD6o-NjJUw/formResponse">Lien vers le formulaire</a>
                                <div class="star-rating">
                                    <fieldset v-if="rating === false">
                                        <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Outstanding" @click="rate(5)"></label>
                                        <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Very Good" @click="rate(4)"></label>
                                        <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Good" @click="rate(3)"></label>
                                        <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Poor" @click="rate(2)"></label>
                                        <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Very Poor" @click="rate(1)"></label>
                                    </fieldset>
                                    <p class="pgold" v-if="rating === true">
                                        Votre note a bien été enregistrée
                                    </p>
                                </div>
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
            rating: false,

            errors: []
        }
    },
    mounted() {
        document.title="Breakout - Anubis Riddle";
        this.end();
    },
    methods: {
        home() {
            window.location.href = '/home'
        },
        rate(n)
        {
            if(this.rating === false)
            {
                const data = {
                    room_slug: "anubis-riddle",
                    note: n,
                }
                axios.post("/bo_rooms/rateroom", data).then(response => {
                    console.log(response.data);
                    this.rating = true; //Pour ne pas pouvoir noter la salle plusieurs fois
                }).catch(error => {
                    console.log(error.response.data.error);
                });
            }
        },
        end()
        {
            this.room.end = true
            this.room.room_status = "victory"
        },
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
        },
        gold() {
            const data = {
                gold: 500,
            }
            axios.post("/useritems/addgold", data).then(response => {
                console.log(response.data);
            }).catch(error => {
                console.log(error.response.data.error);
            });
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
    /*margin-top: 30px;*/
    padding: 10px 20px;
    font-family: Volte;
    color: rgb(248, 170, 34);
    background: none;
    border: 1px solid rgb(248, 170, 34);
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

.pgold
{
    margin-top: 20px;
    font-size: 16px;
    font-family: Volte_bold;
    color: rgb(248, 170, 34);
}

</style>
