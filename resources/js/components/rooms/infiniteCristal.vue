<template>
    <div class="crystal-body">
        <div>
            <room-header :room="this"></room-header>
        </div>
        <div>
            <div class="container text-center mt-3">
                <h1 style="font-size: 50px;">A la recherche du crystal d'infini</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <Map :room="this" v-if="step === 0" />
                    <Enigma_1 :room="this" v-if="step === 1"/>
                    <div :room="this" v-if="step === 2">enigme 2</div>
                </div>
                <div class="col-md-3">
                    <inventory :room="this"></inventory>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

import RoomHeader from "../layout/RoomHeader";
import Enigma_1 from "./infiniteCristal_components/enigma_1";
import Map from "./infiniteCristal_components/Map"
import inventory from "./infiniteCristal_components/inventory";
export default {
    name: "infiniteCristal",
    props: ['app'],
    components: {RoomHeader, Enigma_1, Map, inventory},
    data(){
        return {
            countDown: 60,
            step: 0,
            enigma_1: false,
            enigma_2: false,
            enigma_3: false,
            enigma_4: false,
            enigma_5: false,
            enigma_6: false,
            enigma_7: false,
        }
    },
    mounted() {
        this.app.navbool = false;
    },
    methods : {

    },
}

</script>
<style>
body{
    background: #373B44;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #4286f4, #373B44);  /* Chrome 10-25, Safari 5.1-6 */
    background: radial-gradient(circle, #4286f4, #373B44); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    height: 100vh;
    width: 100vw;
    overflow: hidden;
}
</style>
