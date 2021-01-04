<template>
    <div>
        <room-header :room="this"></room-header>
        <div>
            <div class="container text-center mt-3">
                <h1 style="font-size: 50px;">A la recherche du crystal d'infini</h1>
            </div>
            <button v-on:click="toMap">Carte</button>
        </div>
        <Map :room="this" v-if="step === 0" />
        <Enigma_1 :room="this" v-if="step === 1"/>
        <div :room="this" v-if="step === 2">enigme 2</div>
    </div>
</template>
<script>

import RoomHeader from "../layout/RoomHeader";
import Enigma_1 from "./infiniteCristal_components/enigma_1";
import Map from "./infiniteCristal_components/Map"
export default {
    name: "infiniteCristal",
    props: ['app'],
    components: {RoomHeader, Enigma_1, Map},
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
        console.log(this.enigma)
    },
    methods : {
        toMap() {
            this.step = 0;
        }
    },
}

</script>
<style>

</style>
