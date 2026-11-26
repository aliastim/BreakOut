<template>
    <div class="anubis-body">
        <room-header :room="this"></room-header>

        <enigme0 :room="this" v-if="(player === 0 && enigme === 1 && phase ===0)"></enigme0>

        <!-- Joueur 1 -->
        <j1_enigme1 :room="this" v-if="(player === 1 && enigme === 1 && phase ===0)"></j1_enigme1>
        <j1_enigme1_1 :room="this" v-if="(player === 1 && enigme === 1 && phase ===1)"></j1_enigme1_1>
        <j1_enigme2 :room="this" v-if="(player === 1 && enigme === 2 && phase ===0)"></j1_enigme2>
        <j1_enigme2_1 :room="this" v-if="(player === 1 && enigme === 2 && phase ===1)"></j1_enigme2_1>
        <J1_enigme3 :room="this" v-if="(player === 1 && enigme === 3 && phase ===0)"></J1_enigme3>
        <J1_enigme3_1 :room="this" v-if="(player === 1 && enigme === 3 && phase ===1)"></J1_enigme3_1>
        <J1_enigme4 :room="this" v-if="(player === 1 && enigme === 4 && phase ===0)"></J1_enigme4>
        <J1_enigme4_1 :room="this" v-if="(player === 1 && enigme === 4 && phase ===1)"></J1_enigme4_1>
        <J1_enigme5 :room="this" v-if="(player === 1 && enigme === 5 && phase ===0)"></J1_enigme5>
        <J1_enigme5_1 :room="this" v-if="(player === 1 && enigme === 5 && phase ===1)"></J1_enigme5_1>
        <J1_enigme6 :room="this" v-if="(player === 1 && enigme === 6 && phase ===0)"></J1_enigme6>
        <J1_enigme6_1 :room="this" v-if="(player === 1 && enigme === 6 && phase ===1)"></J1_enigme6_1>
        <J1_enigme7 :room="this" v-if="(player === 1 && enigme === 7 && phase ===0)"></J1_enigme7>
        <J1_enigme7_1 :room="this" v-if="(player === 1 && enigme === 7 && phase ===1)"></J1_enigme7_1>
        <J1_enigme8 :room="this" v-if="(player === 1 && enigme === 8 && phase ===0)"></J1_enigme8>
        <J1_enigme8_1 :room="this" v-if="(player === 1 && enigme === 8 && phase ===1)"></J1_enigme8_1>
        <J1_enigme9 :room="this" v-if="(player === 1 && enigme === 9 && phase ===0)"></J1_enigme9>
        <J1_enigme9_1 :room="this" v-if="(player === 1 && enigme === 9 && phase ===1)"></J1_enigme9_1>
        <J1_enigme10 :room="this" v-if="(player === 1 && enigme === 10 && phase ===0)"></J1_enigme10>
        <J1_enigme10_1 :room="this" v-if="(player === 1 && enigme === 10 && phase ===1)"></J1_enigme10_1>

        <!-- Joueur 2 -->
        <J2_enigme1 :room="this" v-if="(player === 2 && enigme === 1 && phase ===0)"></J2_enigme1>
        <J2_enigme1_1 :room="this" v-if="(player === 2 && enigme === 1 && phase ===1)"></J2_enigme1_1>
        <J2_enigme2 :room="this" v-if="(player === 2 && enigme === 2 && phase ===0)"></J2_enigme2>
        <J2_enigme2_1 :room="this" v-if="(player === 2 && enigme === 2 && phase ===1)"></J2_enigme2_1>
        <J2_enigme4 :room="this" v-if="(player === 2 && enigme === 4 && phase ===0)"></J2_enigme4>
        <J2_enigme4_1 :room="this" v-if="(player === 2 && enigme === 4 && phase ===1)"></J2_enigme4_1>
        <J2_enigme5 :room="this" v-if="(player === 2 && enigme === 5 && phase ===0)"></J2_enigme5>
        <J2_enigme5_1 :room="this" v-if="(player === 2 && enigme === 5 && phase ===1)"></J2_enigme5_1>
        <J2_enigme6 :room="this" v-if="(player === 2 && enigme === 6 && phase ===0)"></J2_enigme6>
        <J2_enigme6_1 :room="this" v-if="(player === 2 && enigme === 6 && phase ===1)"></J2_enigme6_1>
        <J2_enigme7 :room="this" v-if="(player === 2 && enigme === 7 && phase ===0)"></J2_enigme7>
        <J2_enigme7_1 :room="this" v-if="(player === 2 && enigme === 7 && phase ===1)"></J2_enigme7_1>
        <J2_enigme8 :room="this" v-if="(player === 2 && enigme === 8 && phase ===0)"></J2_enigme8>
        <J2_enigme8_1 :room="this" v-if="(player === 2 && enigme === 8 && phase ===1)"></J2_enigme8_1>
        <J2_enigme9 :room="this" v-if="(player === 2 && enigme === 9 && phase ===0)"></J2_enigme9>
        <J2_enigme9_1 :room="this" v-if="(player === 2 && enigme === 9 && phase ===1)"></J2_enigme9_1>
        <J2_enigme10  :room="this" v-if="(player === 2 && enigme === 10 && phase ===0)"></J2_enigme10>
        <J2_enigme_10_1  :room="this" v-if="(player === 2 && enigme === 10 && phase ===1)"></J2_enigme_10_1>

        <!-- FIN -->
        <lost :room="this" v-if="(player === 0 && enigme === 0 && phase ===0)"></lost>
        <victory :room="this" v-if="(player === 0 && enigme === 0 && phase ===1)"></victory>

    </div>
</template>

<script>
import RoomHeader from "../layout/RoomHeader";
import Enigme0 from "./anubisRiddle_components/enigme0";
/* Joueur 1 */
import J1_enigme1 from "./anubisRiddle_components/joueur1/J1_enigme1";
import J1_enigme1_1 from "./anubisRiddle_components/joueur1/J1_enigme1_1";
import J1_enigme2 from "./anubisRiddle_components/joueur1/J1_enigme2";
import J1_enigme2_1 from "./anubisRiddle_components/joueur1/J1_enigme2_1";
import J1_enigme3 from "./anubisRiddle_components/joueur1/J1_enigme3";
import J1_enigme3_1 from "./anubisRiddle_components/joueur1/J1_enigme3_1";
import J1_enigme4 from "./anubisRiddle_components/joueur1/J1_enigme4";
import J1_enigme4_1 from "./anubisRiddle_components/joueur1/J1_enigme4_1";
import J1_enigme5 from "./anubisRiddle_components/joueur1/J1_enigme5";
import J1_enigme5_1 from "./anubisRiddle_components/joueur1/J1_enigme5_1";
import J1_enigme6 from "./anubisRiddle_components/joueur1/J1_enigme6";
import J1_enigme6_1 from "./anubisRiddle_components/joueur1/J1_enigme6_1";
import J1_enigme7 from "./anubisRiddle_components/joueur1/J1_enigme7";
import J1_enigme7_1 from "./anubisRiddle_components/joueur1/J1_enigme7_1";
import J1_enigme8 from "./anubisRiddle_components/joueur1/J1_enigme8";
import J1_enigme8_1 from "./anubisRiddle_components/joueur1/J1_enigme8_1";
import J1_enigme9 from "./anubisRiddle_components/joueur1/J1_enigme9";
import J1_enigme9_1 from "./anubisRiddle_components/joueur1/J1_enigme9_1";
import J1_enigme10 from "./anubisRiddle_components/joueur1/J1_enigme10";
import J1_enigme10_1 from "./anubisRiddle_components/joueur1/J1_enigme10_1";
import J2_enigme1 from "./anubisRiddle_components/joueur2/J2_enigme1";
import J2_enigme1_1 from "./anubisRiddle_components/joueur2/J2_enigme1_1";
import J2_enigme2 from "./anubisRiddle_components/joueur2/J2_enigme2";
import J2_enigme2_1 from "./anubisRiddle_components/joueur2/J2_enigme2_1";
import J2_enigme4 from "./anubisRiddle_components/joueur2/J2_enigme4";
import J2_enigme4_1 from "./anubisRiddle_components/joueur2/J2_enigme4_1";
import J2_enigme5 from "./anubisRiddle_components/joueur2/J2_enigme5";
import J2_enigme5_1 from "./anubisRiddle_components/joueur2/J2_enigme5_1";
import J2_enigme6 from "./anubisRiddle_components/joueur2/J2_enigme6";
import J2_enigme6_1 from "./anubisRiddle_components/joueur2/J2_enigme6_1";
import J2_enigme7 from "./anubisRiddle_components/joueur2/J2_enigme7";
import J2_enigme7_1 from "./anubisRiddle_components/joueur2/J2_enigme7_1";
import J2_enigme8 from "./anubisRiddle_components/joueur2/J2_enigme8";
import J2_enigme8_1 from "./anubisRiddle_components/joueur2/J2_enigme8_1";
import J2_enigme9 from "./anubisRiddle_components/joueur2/J2_enigme9";
import J2_enigme9_1 from "./anubisRiddle_components/joueur2/J2_enigme9_1";
import J2_enigme10 from "./anubisRiddle_components/joueur2/J2_enigme10";
import J2_enigme_10_1 from "./anubisRiddle_components/joueur2/J2_enigme_10_1";

import lost from "./anubisRiddle_components/lost";
import victory from "./anubisRiddle_components/victory";

export default {
name: "anubisRiddle.vue",
props: ['app'],
components: {RoomHeader, Enigme0, J1_enigme1, J1_enigme1_1, J1_enigme2, J1_enigme2_1, J1_enigme3, J1_enigme3_1, J1_enigme4, J1_enigme4_1, J1_enigme5, J1_enigme5_1, J1_enigme6, J1_enigme6_1, J1_enigme7, J1_enigme7_1, J1_enigme8, J1_enigme8_1, J1_enigme9, J1_enigme9_1, J1_enigme10, J1_enigme10_1, J2_enigme1, J2_enigme1_1, J2_enigme2, J2_enigme2_1, J2_enigme4, J2_enigme4_1, J2_enigme5, J2_enigme5_1, J2_enigme6, J2_enigme6_1, J2_enigme7, J2_enigme7_1, J2_enigme8, J2_enigme8_1, J2_enigme9, J2_enigme9_1, J2_enigme10, J2_enigme_10_1, lost, victory},
    data(){
        return {
            enigme: 1,
            phase: 0,

            hour: "01",
            minute: "00",
            second: "00",

            player: 0,
            losted: false,

            room_selected: "ar",

            room_slug:"anubis-riddle",
            room_status: "",
            end: false
        }
    },
    mounted() {
        this.app.navbool = false;
    },
    methods : {
        lost()
        {
            if(this.losted === false)
            {
                this.losted = true
                this.player =0
                this.enigme = 0;
                this.phase = 0;
            }

        }
    },

}
</script>

<style>
    @font-face {
        font-family: "hieroglyphes";
        src: url("/polices/anubis/hieroglyphes.ttf");
    }

    @font-face {
        font-family: "Volte";
        src: url("/polices/anubis/Volte-Regular.otf");
    }

    @font-face {
        font-family: "Volte_bold";
        src: url("/polices/anubis/Volte-Bold.ttf");
    }

    @font-face {
        font-family: "Trajan";
        src: url("/polices/anubis/TrajanPro3-Regular.otf");
    }

    @font-face {
        font-family: "Trajan_bold";
        src: url("/polices/anubis/TrajanPro3-Bold.otf");
    }

    .timer_ar
    {
        font-family: Trajan, monospace !important;
        border-color : #f7aa1d;
        background: none;
        color : #f7aa1d;
        text-transform: uppercase;
        box-shadow: 0 0 8px #2e4157;
        border-style: outset;
        font-size: 19px;
        padding-top: 5px !important;
    }

    .modalingame_ar
    {
        font-family: Trajan, monospace !important;
        border: 1px outset #f7aa1d;
        background: none;
        color : #f7aa1d;
        text-transform: uppercase;
        padding: 4px 20px;
        font-size: 20px;
        box-shadow: 0 0 8px #2e4157;
        transition: 0.3s;
        cursor: pointer;
        border-radius: 4px;
        font-size: 19px;
        padding-top: 8px !important;
    }

    .modalingame_ar:hover
    {
        background: #f7aa1d;
        color: #232323;
    }

    .anubis-body
    {
        color: white;
        height: 100vh;
        width: 100vw;
        overflow: auto;
        /*background: url(/img/salles/anubis_riddle/Fond.gif) center no-repeat;*/
        background: url(/img/salles/anubis_riddle/Fond.png) center no-repeat;
        background-size: cover;
    }

    .general-body{
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

    /*CSS Pour les transitions*/
    .fade-enter-active, .fade-leave-active {
        transition: opacity 1s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }

    .texte-intro
    {
        font-family: Trajan;
        font-size: 35px;
        color: white;
    }

    @media screen and (max-width: 1000px) {
        .texte-intro
        {
            font-size: 16px;
        }
    }

    .button_egypte
    {
        background-image: url(/img/salles/anubis_riddle/boutton_normal.png);
        border: none;
        background-size: 150%;
        background-position: center;
        border-radius: 8px;
        padding: 5px 20px;
        font-size: 20px;
        color: white;
        font-family: Volte;
    }

    .button_egypte:hover
    {
        background-image: url(/img/salles/anubis_riddle/boutton_hover.png);
    }

    .button_egypte:active
    {
        background-image: url(/img/salles/anubis_riddle/boutton_click.png);
    }

    .btn_hiero {
        font-family: hieroglyphes;
        width: 50px;
        height: 50px;
        font-size: 40px;
        color: white;
        border: none;
        margin-top: 10px;
        background-image: url(/img/salles/anubis_riddle/boutton_normal.png);
        background-size: 150%;
        background-position: center;
        border-radius: 8px;
    }

    .btn_hiero:hover {
        background-image: url(/img/salles/anubis_riddle/boutton_hover.png);
    }

    .btn_hiero:active
    {
        background-image: url(/img/salles/anubis_riddle/boutton_click.png);
    }

    .title-egypte
    {
        text-align: center;
        color: white;
        font-family: Volte;
        font-size: 2.5rem;
    }

    .sous-texte
    {
        font-family: Trajan;
        color: white;
        text-align: center;
        margin-top: 50px;
        font-size: 15px;
    }
</style>
