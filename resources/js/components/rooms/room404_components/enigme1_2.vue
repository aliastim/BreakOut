<template>
    <div class="terminal-body d-flex justify-content-center">
        <div class="corps">
            <div class="title-tab">
                <p>Matrice Base 16</p>
            </div>
            <div class="sub-tab">
                <table>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                            <td>9</td>
                            <td>A</td>
                            <td>B</td>
                            <td>C</td>
                            <td>D</td>
                            <td>E</td>
                            <td>F</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="title-tab mt-3">
                <p>Exemples</p>
            </div>
            <div class="sub-text">
                <p class="pt-3">
                    12F = 1 x 16² + 2 x 16¹ + 15 x 16⁰ = 303<br>
                    9A12 = 9 x 16³ + 10 x 16² + 16¹ + 2 x 16⁰ = 39442
                </p>
            </div>

            <div class="title-tab mt-3">
                <p>Convertisseur</p>
            </div>
            <div class="sub-text">
                <p class="pt-3">
                    Entrez une puissance (entre 0 et F) pour obtenir la valeur en exadecimale.
                </p>
            </div>
            <div class="d-flex justify-content-center">
                <!--<p class="terminal-text">16 puissances </p>-->
                <input class="terminal-input-2" type="text" v-model="puissanceinput" @keyup="puissance()">
                <p class="terminal-text"> = </p>
                <input class="terminal-input-2" type="text" v-model="puissanceresponse" readonly>
            </div>

            <div class="title-tab mt-3">
                <p>Sécurité</p>
            </div>
            <div class="sub-text">
                <p class="pt-3">
                    ATTENTION, une sécurité a été ajouté au mot de passe. Celui-ci doit etre déduit de <B>FAC3</B>.
                </p>
            </div>

            <div class="title-tab mt-3">
                <p>Calculateur</p>
            </div>
            <div class="d-flex justify-content-center pt-3">
                <!--<p class="terminal-text">16 puissances </p>-->
                <input class="terminal-input-2" type="text" v-model="sommeinput1">
                <button class="sommebtn" @click="somme()" style="margin-right: 5px;">+</button>
                <button class="sommebtn" @click="soustraction()">-</button>
                <input class="terminal-input-2" type="text" v-model="sommeinput2">
                <p class="terminal-text"> = </p>
                <input class="terminal-input-2" type="text" v-model="sommeresponse" readonly>
            </div>

            <div class="title-tab mt-3">
                <p>Mot de passe</p>
            </div>
            <div class="d-flex justify-content-center pt-3">
                <input class="terminal-input-2" type="text" v-model="resultat" @keyup="verify()">
            </div>

            <div class="text-center w-100 mt-3">
                <a class="link-retour" @click="retour()">Retour</a>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "enigme1_2",
    props: ['room'],
    data() {
        return {
            puissanceinput: 0,
            puissanceresponse: 1,
            sommeinput1: 0,
            sommeinput2: 0,
            sommeresponse: 0,

            resultat: "",

        }
    },
    methods: {
        puissance() {
            this.puissanceresponse = parseInt(this.puissanceinput, 16);
        },
        somme() {
            if (Number.isInteger(parseInt(this.sommeinput1)) && Number.isInteger(parseInt(this.sommeinput2)))
            {
                this.sommeresponse = (parseInt(this.sommeinput1) + parseInt(this.sommeinput2));
            } else
            {
                this.sommeinput1 = 0;
                this.sommeinput2 = 0;
            }
        },
        soustraction() {
            if (Number.isInteger(parseInt(this.sommeinput1)) && Number.isInteger(parseInt(this.sommeinput2)))
            {
                this.sommeresponse = parseInt(this.sommeinput1) - parseInt(this.sommeinput2);
            } else
            {
                this.sommeinput1 = 0;
                this.sommeinput2 = 0;
            }
        },
        verify()
        {
            if (parseInt(this.resultat) === 16372593)
            {
                this.room.enigme = 2;
                this.room.phase = 0;
            }
        },
        retour()
        {
            this.room.phase = 0;
        }
    }
}
</script>
<style scoped>
    .corps
    {
        /*display: flex;
        justify-content: left;
        width: 80%;*/
    }
    .title-tab {
        height: 30px;
        background: #1FF042;
        padding: 2px 10px 2px 10px;
        max-width: 180px
    }
    .title-tab > p {
        font-family: Courier-Bold, Roboto, monospace !important;
        color : black;
        font-size: 16px;
        text-transform: uppercase;
        font-weight: 300;
    }

    .link-retour {
        font-family: Courier-Bold, Roboto, monospace !important;
        color : #1FF042;
        font-size: 14px;
        text-transform: uppercase;
        font-weight: 300;
        cursor: pointer;
    }

    .sub-tab {
        font-family: Courier-Bold, Roboto, monospace !important;
        color: #1FF042;
        font-size: 20px;
        text-transform: uppercase;
        //border: 1px solid #1FF042;
        background: none;
    }

    .sub-tab > table > tbody > tr > td
    {
        border: 1px solid #1FF042;
        padding: 8px 16px;
    }

    .sub-text
    {
        font-family: Courier-Bold, Roboto, monospace !important;
        color: #1FF042;
        font-size: 16px;
    }

    .terminal-input-2
    {
        border: none;
        border-bottom: 1.5px solid rgba(31, 240, 66, 1);
        font-family: Courier-Bold, Roboto, monospace !important;
        background: none;
        color: #1FF042;
        font-size: 20px;
        width: 200px;
        animation: 1.2s press infinite;
        text-align: center;
        margin: 0px 10px 30px 10px;
    }

    .sommebtn
    {
        font-family: Courier-Bold, Roboto, monospace !important;
        font-size: 20px;
        background: #1FF042;
        color: black;
        width: 25px;
        height: 25px;
        border: none;

    }

</style>
