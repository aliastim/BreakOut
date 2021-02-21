<template>
    <div>
        {{ gemitems }}
        {{ golditems }}
        {{ avataritems }}
        <shop-before></shop-before>
        <div class="breakout-body">
            <div class="col-12 pt-4">
                <div class="panneau-ligne-1 pb-3" style="z-index: 2;">
                    <hr>
                    <div class="d-flex justify-content-center">
                        <div><h2>Nos coffres au trésor</h2></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="boutique-fond-1">
                            <div class="row">
                            <div class="col-md-3 col-6">
                                <div class="cadre-boutique-coffres mt-3">
                                    <div class="cadre-boutique-coffres-header">
                                        <h6 class="text-center">Coffre surpise</h6>
                                    </div>
                                    <div class="cadre-boutique-coffres-body">
                                        <img src="img/Banque_graphique/Objets/BreakOut_Coffre_Surprise.png">
                                    </div>
                                    <div class="cadre-boutique-coffres-footer">
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
                            <div class="col-md-3 col-6">
                                <div class="cadre-boutique-coffres mt-3">
                                    <img src="img/Banque_graphique/Boutique/panneau_prix_or_1000.png">
                                    <div class="cadre-boutique-coffres-header">
                                        <h6 class="text-left">1000 Pièces d'or</h6>
                                    </div>
                                    <div class="cadre-boutique-coffres-body">
                                        <img src="img/Banque_graphique/Objets/coffre_ouvert_or.png" style="max-height: 80%;">
                                    </div>
                                    <div class="cadre-boutique-coffres-footer">
                                        <div><button>Acheter</button></div>
                                        <div style="background: #0064B4;">
                                            <div class="div-price" style="color: white;">
                                                2€50
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="cadre-boutique-coffres mt-3">
                                    <img src="img/Banque_graphique/Boutique/panneau_prix_or_5000.png">
                                    <div class="cadre-boutique-coffres-header">
                                        <h6 class="text-left">5000 Pièces d'or</h6>
                                    </div>
                                    <div class="cadre-boutique-coffres-body">
                                        <img src="img/Banque_graphique/Objets/coffre_ouvert_or_2.png" style="max-height: 90%;">
                                    </div>
                                    <div class="cadre-boutique-coffres-footer">
                                        <div><button>Acheter</button></div>
                                        <div style="background: #0064B4;">
                                            <div class="div-price" style="color: white;">
                                                10€
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="cadre-boutique-coffres mt-3">
                                    <img src="img/Banque_graphique/Boutique/panneau_prix_or_10000.png">
                                    <div class="cadre-boutique-coffres-header">
                                        <h6 class="text-left">10 000 Pièces d'or</h6>
                                    </div>
                                    <div class="cadre-boutique-coffres-body">
                                        <img src="img/Banque_graphique/Objets/coffre_ouvert_or_3.png">
                                    </div>
                                    <div class="cadre-boutique-coffres-footer">
                                        <div><button>Acheter</button></div>
                                        <div style="background: #0064B4;">
                                            <div class="div-price" style="color: white;">
                                                16€
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 pt-4">
                <div class="row">
                    <div class="col-12 col-md-6 pb-3">
                        <div class="boutique-fond-2">
                            <div class="panneau-ligne-1 pb-3">
                                <hr>
                                <div class="d-flex justify-content-center">
                                    <div><h2>Salles à l'unité</h2></div>
                                </div>
                            </div>
                            <div class="shop-sous-panneau">
                                Découvrez nos derniers scénarios disponibles.
                            </div>
                            <div class="row p-1">
                                <!-- Salles -->
                                <div class="col-12 col-md-6" v-for="shoproom in shoprooms" :id="'shop-'+shoproom.id">
                                    <div class="shop-cadre-salle-unite mt-3">
                                        <div class="shop-cadre-salle-unite-header">
                                            <div class="d-flex w-100">
                                                <div class="mr-auto" style="color: white;">
                                                    <i class="fas fa-user"></i> {{ shoproom.players }} <span v-if="shoproom.device === 'All'"><i class="fas fa-mobile-alt"></i> <i class="fas fa-desktop"></i></span> <i class="fas fa-mobile-alt" v-if="shoproom.device === 'Mobile'"></i> <i class="fas fa-desktop" v-if="shoproom.device === 'Desktop'"></i>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="div-price">
                                                        {{ shoproom.price }}
                                                    </div>
                                                    <div class="div-gold"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="shop-cadre-salle-unite-body">
                                            <div class="w-100 h-100 position-relative">
                                               <div :style="{'background-image': 'url(' + shoproom.img_link + ')'}"></div>
                                               <div>
                                                   <div>
                                                       <div class="m-auto">{{ shoproom.name }}</div>
                                                   </div>
                                                   <div>
                                                       <p>
                                                           {{ shoproom.description }}
                                                       </p>
                                                   </div>
                                               </div>
                                            </div>
                                        </div>
                                        <div class="shop-cadre-salle-unite-footer">
                                            <button>Sélectionner</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12 mt-5 mb-5 text-center">
                                    <a class="lien-simple" href="#">Voir toutes les salles</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="boutique-fond-2">
                            <div class="panneau-ligne-1 pb-3">
                                <hr>
                                <div class="d-flex justify-content-center">
                                    <div><h2>Objets hebdomadaires</h2></div>
                                </div>
                            </div>
                            <div class="shop-sous-panneau">
                                Chaque semaine, trois nouveaux objets aléatoires sont disponibles en vente à la boutique.<br><strong class="josephin-bold">(Disponible pendant encore <span style="color: #F9BA48;">03:11:43:27</span>)</strong>
                            </div>
                            <div class="row p-1">
                                <!-- Objets -->
                                <div class="col-12 col-md-4" v-for="golditem in itemsgold" :id="'item-'+golditem.id">
                                    <div class="shop-cadre-items mt-3">
                                        <div class="shop-cadre-items-header">
                                            {{ golditem.name }}
                                        </div>
                                        <div class="shop-cadre-items-body">
                                            <div>
                                                <img :src="golditem.img">
                                            </div>
                                            <div>
                                                <p>{{ golditem.description }}</p>
                                            </div>
                                        </div>
                                        <div class="shop-cadre-items-footer">
                                            <div>
                                                <button @click="buyitem(golditem.id)" type="button" data-toggle="modal" data-target="#modalpurchase">Acheter</button>
                                            </div>
                                            <div>
                                                <div class="div-price">
                                                    {{ golditem.price }}
                                                </div>
                                                <div class="div-gold"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="panneau-ligne-1 pb-3">
                                <hr>
                                <div class="d-flex justify-content-center">
                                    <div><h2>Objets Spéciaux</h2></div>
                                </div>
                            </div>
                            <div class="row p-1">
                                <div class="col-12 col-md-4" v-for="gemitem in itemsgem" :id="'item-'+gemitem.id" >
                                    <div class="shop-cadre-items-gem mt-3">
                                        <div class="shop-cadre-items-gem-header">
                                            {{ gemitem.name }}
                                        </div>
                                        <div class="shop-cadre-items-gem-body">
                                            <img :src="gemitem.img">
                                        </div>
                                        <div class="shop-cadre-items-gem-footer">
                                            <div @click="buyitem(gemitem.id)" type="button" data-toggle="modal" data-target="#modalpurchase">Acheter</div>
                                            <div>
                                                <div>{{ gemitem.price }}</div>
                                                <div class="div-gem"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4" v-for="voiditem in (3 - itemsgem.length)">
                                    <div class="shop-cadre-items-gem-void mt-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 pt-4">
                <div class="panneau-ligne-1 pb-3" style="z-index: 2;">
                    <hr>
                    <div class="d-flex justify-content-center">
                        <div><h2>Nos équipements pour avatar</h2></div>
                    </div>
                </div>
                <div class="row p-1">
                    <!-- Objets avatar -->
                    <div class="col-12 col-md-2" v-for="avataritem in itemsavatar" :id="'item-'+avataritem.id">
                        <div class="shop-cadre-items mt-3">
                            <div class="shop-cadre-items-header">
                                {{ avataritem.name }}
                            </div>
                            <div class="shop-cadre-items-body">
                                <div>
                                    <img :src="avataritem.img">
                                </div>
                                <div>
                                    <p>{{ avataritem.description }}</p>
                                </div>
                            </div>
                            <div class="shop-cadre-items-footer">
                                <div>
                                    <button @click="buyitem(avataritem.id)" type="button" data-toggle="modal" data-target="#modalpurchase">Acheter</button>
                                </div>
                                <div>
                                    <div class="div-price">
                                        {{ avataritem.price }}
                                    </div>
                                    <div class="div-gold"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <!-- Modal purchase -->
            <div class="modal fade" id="modalpurchase" tabindex="-1" aria-labelledby="modalpurchase" aria-hidden="true">
                <div class="modal-dialog login-modal-dialog modal-dialog-centered" style="max-width: 600px !important;">
                    <div class="login-modal-content">
                        <div class="login-modal-header">
                            <div class="josephin-bold color-white">Acheter un item</div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 1 !important;">
                                <div aria-hidden="true" class="modal-cross"></div>
                            </button>
                        </div>
                        <div class="login-modal-body p-4">
                            <div class="login-modal-error" v-if="gemerrors.length" style="color: darkred;">
                                <p class="h-100 text-center">
                                    <span v-for="error in gemerrors">
                                        <B>{{ error }}</B><br>
                                    </span>
                                </p>
                            </div>
                            <div v-else>
                                <p class="text-center" style="color: limegreen;"><B>Achat effectué !</B></p>
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
import ShopBefore from "./before/ShopBefore";
import GlobalFooter from "./layout/Footer";
export default {
    name: "Shop",
    props: ['app'],
    components: {ShopBefore, GlobalFooter},
    data() {
        return {
            itemsgold: [],
            itemsgem: [],
            itemsavatar: [],
            golderrors: [],
            gemerrors: [],
            avatarerrors: [],
            shoprooms: [],
            purchase : []
        }
    },
    mounted() {
        document.title="Boutique";
        this.loadRooms();
    },
    computed : {
        golditems: function () {
            this.app.req.post("bo_shop/loadallgolditem").then(response => {
                this.itemsgold = response.data;
                //console.log(response.data);
            });
        },
        gemitems: function () {
            this.app.req.post("bo_shop/loadallgemitem").then(response => {
                this.itemsgem = response.data;
                //console.log(response.data);
            });
        },
        avataritems: function () {
            this.app.req.post("bo_shop/loadallavataritem").then(response => {
                this.itemsavatar = response.data;
                console.log(response.data);
            });
        },
    },
    methods:
    {
        buyitem(id) {
            this.golderrors = [];
            this.gemerrors = [];

            const data = {
                id: id,
            }
            this.app.req.post("bo_shop/buyitem", data).then(response => {
                console.log(response.data);
            }).catch(error => {
                this.gemerrors.push(error.response.data.error);
            });
        },
        loadRooms(){
            axios.post('/bo_rooms/loadall').then(response => {
                this.shoprooms = response.data;

            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
    },
}
</script>
<style>

</style>
