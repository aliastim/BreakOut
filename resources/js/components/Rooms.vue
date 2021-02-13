<template>
    <div>
        <div class="breakout-body-before" style="margin-top: 100px;">
            <marquee>{{ sentence }}</marquee>
        </div>
        <div class="breakout-body">
            <hr class="liseret-rouge">
            <div class="container">
                <div class="panneau-ligne-1" style="margin-top: -20px;">
                    <hr>
                    <div class="d-flex justify-content-center">
                        <div>
                            <h1 class="title-mentions josephin-bold">Liste des salles</h1>
                        </div>
                    </div>
                </div>

                <div class="row p-1">
                    <!-- Salles -->
                    <div class="col-12 col-md-6" v-for="(allroom, index) in allrooms.slice().reverse()" :id="'room-'+index.id">
                        <div class="shop-cadre-salle-unite mt-3">
                            <div class="shop-cadre-salle-unite-header">
                                <div class="d-flex w-100">
                                    <div class="mr-auto" style="color: white;">
                                        <i class="fas fa-user"></i> {{ allroom.players }} <span v-if="allroom.device === 'All'"><i class="fas fa-mobile-alt"></i> <i class="fas fa-desktop"></i></span> <i class="fas fa-mobile-alt" v-if="allroom.device === 'Mobile'"></i> <i class="fas fa-desktop" v-if="allroom.device === 'Desktop'"></i>
                                    </div>
                                    <div class="d-flex">
                                        <div class="div-price">
                                            {{ allroom.price }}
                                        </div>
                                        <div class="div-gold"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-cadre-salle-unite-body">
                                <div class="w-100 h-100 position-relative">
                                    <div :style="{'background-image': 'url(' + allroom.img_link + ')'}"></div>
                                    <div>
                                        <div>
                                            <div class="m-auto">{{ allroom.name }}</div>
                                        </div>
                                        <div>
                                            <p>
                                                {{ allroom.description }}
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

            </div>
            <global-footer></global-footer>
        </div>
    </div>
</template>
<script>
import GlobalFooter from "./layout/Footer";
export default {
    name: "Rooms",
    components: {GlobalFooter},
    props: ['app'],
    data() {
        return {
            sentence: "",
            allrooms: []
        }
    },
    mounted() {
        document.title="BreakOut - Page Info";
        this.loadScrolling();
        this.loadRooms();
    },
    methods: {
        loadScrolling(){
            axios.post('/bo_dashboard/loadscrolling').then(response => {
                this.sentence = response.data.scrolling;
            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
        loadRooms(){
            axios.post('/bo_rooms/loadall').then(response => {
                this.allrooms = response.data;

            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
    }
}
</script>
<style>

</style>
