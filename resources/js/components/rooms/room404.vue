<template>
    <div class="r404-body">
        <room-header :room="this"></room-header>

        <enigme0 :room="this" v-if="enigme === 0"></enigme0>
        <enigme1 :room="this" v-if="enigme === 1"></enigme1>
    </div>
</template>
<script>

import RoomHeader from "../layout/RoomHeader";
import Enigme0 from "./room404_components/enigme0"
import Enigme1 from "./room404_components/enigme1";
export default {
    name: "room404",
    props: ['app'],
    components: {RoomHeader, Enigme0, Enigme1},
    data(){
        return {
            timer: 45,
            enigme: 0,
        }
    },
    mounted() {
        this.app.navbool = false;
    },
    methods : {

    },
}

</script>
<!--<style scoped src="css/room404.css"></style>-->
<style scoped>
    .r404-body
    {
        color: white;
        height: 100vh;
        width: 100vw;
        overflow: auto;
        background: #232323;
    }
</style>
