<template>
    <div>
        <HomeCarousel :home="this"></HomeCarousel>
            <div class="breakout-body">
            <hr class="liseret-rouge">
            <div class="d-flex justify-content-center">
                <button class="btn-home-play" onclick="document.location.href='/rooms'">Jouer</button>
            </div>
            <div class="container mt-3">
                <div class="d-flex justify-content-between">
                    <div class="panneau-accueil"><h3>Nos dernières salles</h3></div>
                    <div class="d-none-991">5 parties en cours</div>
                </div>
                <div class="row pb-5">
                    <div class="col-md-4 col-12 mt-3 text-center" v-for="room in homerooms">
                        <div class="carre-salle-accueil" :style="{'background-image': 'url(' + room.img_link + ')'}">
                            <div class="carre-salle-accueil-apres">
                                <div class="d-flex flex-column w-100">
                                    <div class="w-100 d-flex" style="height: calc(100% - 60px);">
                                        <div class="m-auto">
                                            <h2>{{ room.name }}</h2>
                                        </div>
                                    </div>
                                    <div class="w-100" style="height: 60px;">
                                        <div class="h-100">
                                            <router-link :to="room.url"><button>Jouer</button></router-link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carre-salle-accueil-footer p-2">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <i class="fas fa-user" v-for="user in room.players">&nbsp;</i>
                                </div>
                                <div><i class="fas fa-hourglass-half"></i><small> ≃ {{ room.duration }}</small></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pb-5">
                    <div class="col-12">
                        <div class="cadre-explications p-3">
                            <div class="d-flex justify-content-center">
                                <div class="cadre-explications-panneau">
                                    <h1>BreakOut : L’escape game 100% virtuel</h1>
                                </div>
                            </div>
                            <p class="pt-1">Vous avez l’âme d’un enquêteur et êtes à l’affut du moindre indice ?
                                Alors mettez vos acquittées à l’épreuve ! <span class="josephin-bold-italic" style="color: #B3000F !important;">Choisissez une salle de jeu
                            et relevez des énigmes</span> qui sauront mettre tous vos sens à l’épreuve !
                            </p>
                            <div class="sous-cadre-explications">
                                <div class="row">
                                    <div class="col-12">
                                        <h3>Vous devrez faire preuve</h3>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="d-flex flex-column text-center icones-explications-accueil">
                                            <div class="w-100 d-flex justify-content-center">
                                                <div><img src="/img/icones/brain.png" height="60px" width="60px"></div>
                                            </div>
                                            <div class="w-100 d-flex justify-content-center text-center">
                                                <div><p>D'un esprit logique</p></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="d-flex flex-column text-center icones-explications-accueil">
                                            <div class="w-100 d-flex justify-content-center">
                                                <div><img src="/img/icones/vision.png" height="60px" width="60px"></div>
                                            </div>
                                            <div class="w-100 d-flex justify-content-center text-center">
                                                <div><p>D'une vue à tout épreuve</p></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="d-flex flex-column text-center icones-explications-accueil">
                                            <div class="w-100 d-flex justify-content-center">
                                                <div><img src="/img/icones/ear.png" height="60px" width="60px"></div>
                                            </div>
                                            <div class="w-100 d-flex justify-content-center text-center">
                                                <div><p>D'une oreille attentive</p></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="d-flex flex-column text-center icones-explications-accueil">
                                            <div class="w-100 d-flex justify-content-center">
                                                <div><img src="/img/icones/curious.png" height="60px" width="60px"></div>
                                            </div>
                                            <div class="w-100 d-flex justify-content-center text-center">
                                                <div><p>De beaucoup de curiosité</p></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <div class="panneau-ligne-1 pb-3 padding-991">
                            <hr>
                            <div class="d-flex justify-content-center">
                                <div><h2>Top 3 joueurs</h2></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-xl-4">
                                <div class="cadre-top-joueurs" style="margin-top: 20px;">
                                    <div class="d-flex justify-content-center">
                                        <div class="top-medal-joueurs">
                                            <img src="/img/icones/medal_silver.png">
                                        </div>
                                    </div>
                                    <div class="cadre-top-joueurs-header">
                                        <div class="d-flex justify-content-center w-100">
                                            <div class="w-100 d-flex flex-column text-center">
                                                <div class="w-100 d-flex justify-content-center">
                                                    <div style="color: #E0E0E0 !important;">Pseudo</div>
                                                </div>
                                                <p>Inscrit depuis le 24/09/2020</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="cadre-top-joueurs-coupe coupe-small">
                                        <i class="fas fa-trophy"></i>
                                    </div>
                                    <div class="cadre-top-joueurs-body text-center">
                                        <h6>31 Victoires</h6>
                                        <div>
                                            <p>
                                                <i class="fas fa-gamepad"></i><br>
                                                Parties jouées :
                                                <span>31</span>
                                            </p>
                                            <p>
                                                <i class="fas fa-hourglass-half"></i><br>
                                                Meilleur temps :
                                                <span>43 min</span>
                                            </p>
                                            <p>
                                                <i class="fas fa-hourglass-half"></i><br>
                                                Temps moyen :
                                                <span>56 min</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-4">
                                <div class="cadre-top-joueurs cadre-top-joueurs-middle" style="height: 440px;">
                                    <div class="d-flex justify-content-center">
                                        <div class="top-medal-joueurs-middle">
                                            <img src="/img/icones/medal_gold.png">
                                        </div>
                                    </div>
                                    <div class="cadre-top-joueurs-header-middle">
                                        <div class="d-flex justify-content-center w-100">
                                            <div class="w-100 d-flex flex-column text-center">
                                                <div class="w-100 d-flex justify-content-center">
                                                    <div style="color: #FFE27A;">Pseudo</div>
                                                </div>
                                                <p>Inscrit depuis le 24/09/2020</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="cadre-top-joueurs-coupe coupe-big" style="margin-top: -20px !important; margin-bottom: 10px !important;">
                                        <i class="fas fa-trophy"></i>
                                    </div>
                                    <div class="cadre-top-joueurs-body text-center">
                                        <h6>31 Victoires</h6>
                                        <div>
                                            <p>
                                                <i class="fas fa-gamepad"></i><br>
                                                Parties jouées :
                                                <span>32</span>
                                            </p>
                                            <p>
                                                <i class="fas fa-hourglass-half"></i><br>
                                                Meilleur temps :
                                                <span>43 min</span>
                                            </p>
                                            <p>
                                                <i class="fas fa-hourglass-half"></i><br>
                                                Temps moyen :
                                                <span>56 min</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-4">
                                <div class="cadre-top-joueurs bronze-991" style="margin-top: 20px;">
                                    <div class="d-flex justify-content-center">
                                        <div class="top-medal-joueurs">
                                            <img src="/img/icones/medal_bronze.png">
                                        </div>
                                    </div>
                                    <div class="cadre-top-joueurs-header">
                                        <div class="d-flex justify-content-center w-100">
                                            <div class="w-100 d-flex flex-column text-center">
                                                <div class="w-100 d-flex justify-content-center">
                                                    <div style="color: #FF9838 !important;">Pseudo</div>
                                                </div>
                                                <p>Inscrit depuis le 24/09/2020</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="cadre-top-joueurs-coupe coupe-small">
                                        <i class="fas fa-trophy"></i>
                                    </div>
                                    <div class="cadre-top-joueurs-body text-center">
                                        <h6>28 Victoires</h6>
                                        <div>
                                            <p>
                                                <i class="fas fa-gamepad"></i><br>
                                                Parties jouées :
                                                <span>31</span>
                                            </p>
                                            <p>
                                                <i class="fas fa-hourglass-half"></i><br>
                                                Meilleur temps :
                                                <span>43 min</span>
                                            </p>
                                            <p>
                                                <i class="fas fa-hourglass-half"></i><br>
                                                Temps moyen :
                                                <span>56 min</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 text-center pt-4 pb-3">
                            <a href="#">
                                <router-link class="" to="/forum">
                                    <button class="btn-sous-top">Accéder au forum</button>
                                </router-link>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 pb-5">
                        <div class="panneau-ligne-1 pb-3 padding-991">
                            <hr>
                            <div class="d-flex justify-content-center">
                                <div><h2>Top 3 salles</h2></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-xl-4">
                                <div class="cadre-top-salles" style="background: url('/img/illustrations_salles/exemple2.png'); margin-top: 20px;">
                                    <div class="d-flex justify-content-center">
                                        <div class="top-medal-joueurs" style="background: #7B5B25 !important;">
                                            <img src="/img/icones/medal_silver.png">
                                        </div>
                                    </div>
                                    <div class="cadre-top-salles-apres">
                                        <div class="d-flex w-100">
                                            <div class="m-auto">
                                                <h2>La forêt<br> d'esrael</h2>
                                                <div class="top-salles-stars">
                                                    <p>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-100 d-flex justify-content-center">
                                            <button>
                                                Jouer
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-4">
                                <div class="cadre-top-salles cadre-top-joueurs-middle" style="background: url('/img/illustrations_salles/exemple1.jpg'); height: 440px;">
                                    <div class="d-flex justify-content-center">
                                        <div class="top-medal-joueurs-middle" style="background: #7B5B25 !important;">
                                            <img src="/img/icones/medal_gold.png">
                                        </div>
                                    </div>
                                    <div class="cadre-top-salles-apres">
                                        <div class="d-flex w-100">
                                            <div class="m-auto">
                                                <h2 style="font-size: 18px; font-family: 'JosefinSans-Bold'">Le tombeau<br> d'agamemnon</h2>
                                                <div class="top-salles-stars">
                                                    <p>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star-half-alt"></i>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-100 d-flex justify-content-center">
                                            <button>
                                                Jouer
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-4">
                                <div class="cadre-top-salles bronze-991" style="background: url('/img/illustrations_salles/exemple3.png'); margin-top: 20px;">
                                    <div class="d-flex justify-content-center">
                                        <div class="top-medal-joueurs" style="background: #7B5B25 !important;">
                                            <img src="/img/icones/medal_bronze.png">
                                        </div>
                                    </div>
                                    <div class="cadre-top-salles-apres">
                                        <div class="d-flex w-100">
                                            <div class="m-auto">
                                                <h2>La prison<br> de pandragon</h2>
                                                <div class="top-salles-stars">
                                                    <p>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-100 d-flex justify-content-center">
                                            <button>
                                                Jouer
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 text-center pt-4 pb-3">
                            <a href="#">
                                <router-link class="" to="/rooms">
                                    <button class="btn-sous-top">Voir toutes les salles</button>
                                </router-link>
                            </a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="panneau-ligne-1 pb-4">
                            <hr>
                            <div class="d-flex justify-content-left">
                                <div><h2>Objets hebdomadaires</h2></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-xl-4 pb-3">
                                <div class="cadre-boutique-accueil">
                                    <div>
                                        <div>
                                            <img src="img/Banque_graphique/Objets/Plot_Machine_256.png">
                                        </div>
                                    </div>
                                    <div>
                                        <div><h5>Machine à sous</h5></div>
                                        <div>
                                            <p>
                                                Tentez votre chance à la machine à sous ! Dépensez 20 pièces à chaque tirage et tentez de gagner des cadeaux mystères !
                                            </p>
                                        </div>
                                        <div>
                                            <div><button>Acheter</button></div>
                                            <div>
                                                <div class="div-price">
                                                    700
                                                </div>
                                                <div class="div-gold"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-4 pb-3">
                                <div class="cadre-boutique-accueil">
                                    <div>
                                        <div>
                                            <img src="img/Banque_graphique/Objets/gemme_256.png">
                                        </div>
                                    </div>
                                    <div>
                                        <div><h5>Gemme de l'outre tombe</h5></div>
                                        <div>
                                            <p>
                                                Vous vous perdez dans ses reflets profonds. Cette gemme vous offrira une seconde chance lorsque vous tomberez au combat.
                                            </p>
                                        </div>
                                        <div>
                                            <div><button>Acheter</button></div>
                                            <div>
                                                <div class="div-price">
                                                    700
                                                </div>
                                                <div class="div-gold"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-4 pb-3">
                                <div class="cadre-boutique-accueil">
                                    <div>
                                        <div>
                                            <img src="img/Banque_graphique/Objets/carte_256.png">
                                        </div>
                                    </div>
                                    <div>
                                        <div><h5>Ancienne carte</h5></div>
                                        <div>
                                            <p>
                                                Tout les pièces
                                                (ou presque) sont représentées sur cette vieille carte.
                                                Utilisez-la pour vous diriger
                                                en partie.
                                            </p>
                                        </div>
                                        <div>
                                            <div><button>Acheter</button></div>
                                            <div>
                                                <div class="div-price">
                                                    700
                                                </div>
                                                <div class="div-gold"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 d-flex pb-4">
                            <div class="mr-auto"></div>
                            <div>
                                <router-link class="" to="/shop">
                                    <a href="#" class="lien-simple">Voir la boutique</a>
                                </router-link>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="panneau-ligne-1 pb-3">
                            <hr>
                            <div class="d-flex justify-content-center">
                                <div><h2>statistiques</h2></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-3">
                                <div class="w-100 d-flex flex-column cadre-statistiques">
                                    <div><i class="fas fa-gamepad"></i></div>
                                    <div><p><span>577</span> Parties jouées</p></div>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 stats-left">
                                <div class="w-100 d-flex flex-column cadre-statistiques">
                                    <div><i class="fas fa-trophy"></i></div>
                                    <div><p><span>436</span> Victoires</p></div>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 stats-right">
                                <div class="w-100 d-flex flex-column cadre-statistiques">
                                    <div><i class="far fa-clock"></i></div>
                                    <div><p>Durée moyenne : <span>67 minutes</span></p></div>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="w-100 d-flex flex-column cadre-statistiques">
                                    <div><i class="fas fa-users"></i></div>
                                    <div><p><span>123</span> inscrits</p></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <global-footer></global-footer>
        </div>
    </div>
</template>
<script>
import HomeCarousel from "./carousel/HomeCarousel";
import GlobalFooter from "./layout/Footer";
export default {
    name: "Home",
    components: {HomeCarousel, GlobalFooter},
    props: ['app'],
    data() {
        return {
            homecarousel: [],
            sentence: "",
            homerooms: [],
            errors: []
        }
    },

    mounted() {
        document.title="Accueil";
        this.loadHomeCarousel();
        this.loadScrolling();
        this.loadRooms();
        this.app.navbool = true;
    },
    methods : {
        loadHomeCarousel() {
            this.app.req.post('bo_dashboard/loadcarousel').then(response => {
                this.homecarousel = response.data;
            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
        loadScrolling(){
            this.app.req.post('bo_dashboard/loadscrolling').then(response => {
                this.sentence = response.data.scrolling;
            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
        loadRooms(){
            this.app.req.post('bo_rooms/loadall').then(response => {
                this.homerooms = response.data;

            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
        letsplay(){
            this.app.req.post('rooms/letsplay').then(response => {
            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
    }
}
</script>
<style>

</style>
