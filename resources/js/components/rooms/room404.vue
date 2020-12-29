<template>
    <div class="r404-body">
        <room-header :room="this"></room-header>

        <enigme0 :room="this" v-if="enigme === 0"></enigme0>
        <enigme1 :room="this" v-if="(enigme === 1 && phase ===0)"></enigme1>
        <enigme1_1 :room="this" v-if="(enigme === 1 && phase ===1)"></enigme1_1>
        <enigme1_2 :room="this" v-if="(enigme === 1 && phase ===2)"></enigme1_2>
        <enigme2 :room="this" v-if="(enigme === 2 && phase ===0)"></enigme2>
    </div>
</template>
<script>

import RoomHeader from "../layout/RoomHeader";
import Enigme0 from "./room404_components/enigme0"
import Enigme1 from "./room404_components/enigme1";
import Enigme1_1 from "./room404_components/enigme1_1";
import Enigme1_2 from "./room404_components/enigme1_2";
import Enigme2 from "./room404_components/enigme2";
export default {
    name: "room404",
    props: ['app'],
    components: {RoomHeader, Enigme0, Enigme1, Enigme1_1, Enigme1_2, Enigme2},
    data(){
        return {
            timer: 45,
            enigme: 0,
            phase: 0,
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
<style>

    @font-face {
        font-family: "Roboto";
        src: url("/polices/Roboto/Roboto-Regular.ttf");
    }

    @font-face {
        font-family: "Courier-Regular";
        src: url("/polices/Courier-Regular.ttf");
    }

    @font-face {
        font-family: "Courier-Bold";
        src: url("/polices/Courier-Bold.ttf");
    }

    .r404-body
    {
        color: white;
        height: 100vh;
        width: 100vw;
        overflow: auto;
        background: #232323;
    }
    .terminal-body .terminal-text
    {
        font-family: Roboto, monospace !important;
        color : #1FF042;
        font-size: 20px;
        animation: fade infinite 2s;
    }
    @keyframes fade {
        0% {
            opacity: 100%;
        }
        50% {
            opacity: 60%;
        }
        100% {
            opacity: 100%;
        }
    }

    .terminal-text {
        font-family: Roboto, monospace !important;
        color : #1FF042;
        font-size: 16px;
    }
</style>
