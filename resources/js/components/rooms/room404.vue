<template>
    <div class="r404-body">
        <room-header :room="this"></room-header>

        <enigme0 :room="this" v-if="enigme === 0"></enigme0>

        <enigme1 :room="this" v-if="(enigme === 1 && phase ===0)"></enigme1>
        <enigme1_1 :room="this" v-if="(enigme === 1 && phase ===1)"></enigme1_1>
        <enigme1_2 :room="this" v-if="(enigme === 1 && phase ===2)"></enigme1_2>

        <enigme2 :room="this" v-if="(enigme === 2 && phase ===0)"></enigme2>
        <enigme2_1 :room="this" v-if="(enigme === 2 && phase ===1)"></enigme2_1>


        <enigme3 :room="this" v-if="(enigme === 3 && phase ===0)"></enigme3>
        <enigme3_1 :room="this" v-if="(enigme === 3 && phase ===1)"></enigme3_1>

        <enigme4 :room="this" v-if="(enigme === 4 && phase ===0)"></enigme4>
        <enigme4_1 :room="this" v-if="(enigme === 4 && phase ===1)"></enigme4_1>


        <enigme5 :room="this" v-if="(enigme === 5 && phase ===0)"></enigme5>
        <enigme5_1 :room="this" v-if="(enigme === 5 && phase ===1)"></enigme5_1>

        <enigme6 :room="this" v-if="(enigme === 6 && phase ===0)"></enigme6>
        <enigme6_1 :room="this" v-if="(enigme === 6 && phase ===1)"></enigme6_1>

        <enigme7 :room="this" v-if="(enigme === 7 && phase ===0)"></enigme7>
        <enigme7_1 :room="this" v-if="(enigme === 7 && phase ===1)"></enigme7_1>
        <enigme7_2 :room="this" v-if="(enigme === 7 && phase ===2)"></enigme7_2>

        <!--Victoire-->
        <enigme7_3 :room="this" v-if="(enigme === 7 && phase ===3)"></enigme7_3>

        <!--Défaite-->
        <enigme7_4 :room="this" v-if="(enigme === 7 && phase ===4)"></enigme7_4>

        <!--Final - Trésor-->
        <enigme7_5 :room="this" v-if="(enigme === 7 && phase ===5)"></enigme7_5>
    </div>
</template>
<script>

import RoomHeader from "../layout/RoomHeader";
import Enigme0 from "./room404_components/enigme0"
import Enigme1 from "./room404_components/enigme1";
import Enigme1_1 from "./room404_components/enigme1_1";
import Enigme1_2 from "./room404_components/enigme1_2";
import Enigme2 from "./room404_components/enigme2";
import Enigme2_1 from "./room404_components/enigme2_1";
import Enigme3 from "./room404_components/enigme3";
import Enigme3_1 from "./room404_components/enigme3_1";
import Enigme4 from "./room404_components/enigme4";
import Enigme4_1 from "./room404_components/enigme4_1";
import Enigme5 from "./room404_components/enigme5";
import Enigme5_1 from "./room404_components/enigme5_1";
import Enigme6 from "./room404_components/enigme6";
import Enigme6_1 from "./room404_components/enigme6_1";
import Enigme7 from "./room404_components/enigme7";
import Enigme7_1 from "./room404_components/enigme7_1";
import Enigme7_2 from "./room404_components/enigme7_2";
import Enigme7_3 from "./room404_components/enigme7_3";
import Enigme7_4 from "./room404_components/enigme7_4";
import Enigme7_5 from "./room404_components/enigme7_5";
export default {
    name: "room404",
    props: ['app'],
    components: {RoomHeader, Enigme0, Enigme1, Enigme1_1, Enigme1_2, Enigme2, Enigme2_1, Enigme3, Enigme3_1, Enigme4, Enigme4_1, Enigme5, Enigme5_1, Enigme6, Enigme6_1, Enigme7, Enigme7_1, Enigme7_2, Enigme7_3, Enigme7_4, Enigme7_5},
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
        font-family: "Montserrat";
        src: url("/polices/montserrat/Montserrat-Regular.otf");
    }

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
    .terminal-body{
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        justify-content: center;
    }

    .body-c {
        position: absolute;
        top: 50%; /* poussé de la moitié de hauteur du référent */
        transform: translateY(-50%); /* tiré de la moitié de sa propre hauteur */
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

    .terminal-title {
        font-family: Roboto, monospace !important;
        color : #1FF042;
        font-size: 50px;
    }

    .terminal-text {
        font-family: Roboto, monospace !important;
        color : #1FF042;
        font-size: 16px;
    }

    .btn-enigme
    {
        font-family: Roboto, monospace !important;
        background: none;
        color : #1FF042;
        border: 2px solid #1FF042;
        padding: 8px 40px;
        border-radius: 20px;
        font-size: 18px;
        transition: 0.3s;
    }

    .btn-enigme:hover
    {
        background: #1FF042;
        color: black;
        cursor: pointer;
    }
</style>
