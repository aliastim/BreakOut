<template>
    <div>
        <room-header :room="this"></room-header>
        <div>
            <div class="container text-center mt-3">
                <h1 style="font-size: 50px;">A la recherche du crystal d'infini</h1>
            </div>
        </div>
        <Enigma_1 :room="this" v-if="enigma === 1"/>
        <div :room="this" v-if="enigma === 2">enigme 2</div>
    </div>
</template>
<script>

import RoomHeader from "../layout/RoomHeader";
import Enigma_1 from "./infiniteCristal_components/enigma_1"
export default {
    name: "infiniteCristal",
    props: ['app'],
    components: {RoomHeader, Enigma_1},
    data(){
        return {
            countDown: 60,
            enigma: 1,
        }
    },
    mounted() {
        this.app.navbool = false;
        console.log(this.enigma)
    },
    methods : {

    },
}

</script>
<style>

</style>
