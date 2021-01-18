<template>
    <div>
        <div>
            <room-header :room="this" style="position: relative"></room-header>
        </div>
        <div class="container">
            <div class="row pt-5">
                <div class="col-md-9">
                    <Map :room="this" v-if="step === 0"/>
                    <Enigma_1 :room="this" v-if="step === 1"/>
                    <Enigma_2 :room="this" v-if="step === 2"/>
                </div>
                <div class="col-md-3">
                    <Inventory :room="this"/>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

import RoomHeader from "../layout/RoomHeader";
import Enigma_1 from "./infiniteCristal_components/enigma_1";
import Enigma_2 from "./infiniteCristal_components/enigma_2";
import Map from "./infiniteCristal_components/Map"
import Inventory from "./infiniteCristal_components/inventory";

export default {
    name: "infiniteCristal",
    props: ['app'],
    components: {RoomHeader, Enigma_1, Map, Inventory, Enigma_2},
    data() {
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
            hour: 24,
            minute: 0,
            second: 0,
        }
    },
    mounted() {
        this.app.navbool = false;
    },
    methods: {},
}

</script>
<style>
.crystal-body {
    background: #373B44; /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #4286f4, #373B44); /* Chrome 10-25, Safari 5.1-6 */
    background: radial-gradient(circle, #4286f4, #373B44); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    overflow: hidden;
    color: white;
    height: 100vh;
    width: 100vw;
}

.timer {
    font-family: Roboto, monospace !important;
    border-color: #1FF042;
    background: none;
    color: #1FF042;
    text-transform: uppercase;
    box-shadow: 0 0 8px #1FF042;
}

.body-bis {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    justify-content: center;
}

.body-ter {
    position: absolute;
    top: 50%; /* poussé de la moitié de hauteur du référent */
    transform: translateY(-50%); /* tiré de la moitié de sa propre hauteur */
}
</style>
