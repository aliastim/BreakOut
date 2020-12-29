<template>
    <div class="terminal-body text-center">
        <div class="body-c">
            <div class="cadre-reponse m-auto">
                Mot de passe de l’énigme 1 :<B style="font-weight: 900;">16372593</B>
            </div>
            <div class="sub-tab">
                <table>
                    <thead>
                        <tr>
                            <th>0</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>0</td>
                            <td>1</td>
                            <td>10</td>
                            <td>11</td>
                            <td>100</td>
                            <td>101</td>
                            <td>110</td>
                            <td>111</td>
                            <td>1000</td>
                            <td>1001</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-5">
                <input class="inputcase" type="text" v-model="case11" @keyup="verify()" maxlength="1">
                <input class="inputcase" type="text" v-model="case12" @keyup="verify()" maxlength="1">
                <input class="inputcase" type="text" v-model="case13" @keyup="verify()" maxlength="1">
                <input class="inputcase" type="text" v-model="case14" @keyup="verify()" maxlength="1">
            </div>
            <div style="margin-top: 4px !important;">
                <input class="inputcase" type="text" v-model="case21" @keyup="verify()" maxlength="1">
                <input class="inputcase" type="text" v-model="case22" @keyup="verify()" maxlength="1">
                <input class="inputcase" type="text" v-model="case23" @keyup="verify()" maxlength="1">
                <input class="inputcase" type="text" v-model="case24" @keyup="verify()" maxlength="1">
            </div>
            <div style="margin-top: 4px !important;">
                <input class="inputcase" type="text" v-model="case31" @keyup="verify()" maxlength="1">
                <input class="inputcase" type="text" v-model="case32" @keyup="verify()" maxlength="1">
                <input class="inputcase" type="text" v-model="case33" @keyup="verify()" maxlength="1">
                <input class="inputcase" type="text" v-model="case34" @keyup="verify()" maxlength="1">
            </div>
            <div style="margin-top: 4px !important;">
                <input class="inputcase" type="text" v-model="case41" @keyup="verify()" maxlength="1">
                <input class="inputcase" type="text" v-model="case42" @keyup="verify()" maxlength="1">
                <input class="inputcase" type="text" v-model="case43" @keyup="verify()" maxlength="1">
                <input class="inputcase" type="text" v-model="case44" @keyup="verify()" maxlength="1">
            </div>
            <div style="margin-top: 4px !important;">
                <input class="inputcase" type="text" v-model="case51" @keyup="verify()" maxlength="1">
                <input class="inputcase" type="text" v-model="case52" @keyup="verify()" maxlength="1">
                <input class="inputcase" type="text" v-model="case53" @keyup="verify()" maxlength="1">
                <input class="inputcase" type="text" v-model="case54" @keyup="verify()" maxlength="1">
            </div>
            <div style="margin-top: 4px !important;">
                <input class="inputcase" type="text" v-model="case61" @keyup="verify()" maxlength="1">
                <input class="inputcase" type="text" v-model="case62" @keyup="verify()" maxlength="1">
                <input class="inputcase" type="text" v-model="case63" @keyup="verify()" maxlength="1">
                <input class="inputcase" type="text" v-model="case64" @keyup="verify()" maxlength="1">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "enigme2",
    props: ['room'],
    data() {
        return {
            case11: 0,
            case12: "",
            case13: "",
            case14: "",

            case21: "",
            case22: "",
            case23: "",
            case24: "",

            case31: "",
            case32: "",
            case33: "",
            case34: 1,

            case41: "",
            case42: "",
            case43: "",
            case44: "",

            case51: 1,
            case52: "",
            case53: "",
            case54: "",

            case61: "",
            case62: "",
            case63: "",
            case64: "",
        }
    },
    methods: {
        verify(){
            if(Number.isInteger(parseInt(this.case11)) && Number.isInteger(parseInt(this.case12)) && Number.isInteger(parseInt(this.case13)) && Number.isInteger(parseInt(this.case14)) && Number.isInteger(parseInt(this.case21)) && Number.isInteger(parseInt(this.case22)) && Number.isInteger(parseInt(this.case23)) && Number.isInteger(parseInt(this.case24)) && Number.isInteger(parseInt(this.case31)) && Number.isInteger(parseInt(this.case32)) && Number.isInteger(parseInt(this.case33)) && Number.isInteger(parseInt(this.case34)) && Number.isInteger(parseInt(this.case41)) && Number.isInteger(parseInt(this.case42)) && Number.isInteger(parseInt(this.case43)) && Number.isInteger(parseInt(this.case44)) && Number.isInteger(parseInt(this.case51)) && Number.isInteger(parseInt(this.case52)) && Number.isInteger(parseInt(this.case53)) && Number.isInteger(parseInt(this.case54)) && Number.isInteger(parseInt(this.case61)) && Number.isInteger(parseInt(this.case62)) && Number.isInteger(parseInt(this.case63)) && Number.isInteger(parseInt(this.case64))){
                if((parseInt(this.case11) === 0) && (parseInt(this.case12) === 0) && (parseInt(this.case13) === 0) && (parseInt(this.case14) === 1))
                {
                    if((parseInt(this.case21) === 0) && (parseInt(this.case22) === 0) && (parseInt(this.case23) === 1) && (parseInt(this.case24) === 1))
                    {
                        if((parseInt(this.case31) === 0) && (parseInt(this.case32) === 1) && (parseInt(this.case33) === 1) && (parseInt(this.case34) === 1))
                        {
                            if((parseInt(this.case41) === 0) && (parseInt(this.case42) === 1) && (parseInt(this.case43) === 0) && (parseInt(this.case44) === 1))
                            {
                                if((parseInt(this.case51) === 1) && (parseInt(this.case52) === 0) && (parseInt(this.case53) === 0) && (parseInt(this.case54) === 1))
                                {
                                    if((parseInt(this.case61) === 0) && (parseInt(this.case62) === 0) && (parseInt(this.case63) === 1) && (parseInt(this.case64) === 1))
                                    {
                                        this.room.enigme = 3;
                                        this.room.phase = 0;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
</script>
<style scoped>
    .cadre-reponse
    {
        font-family: Roboto, monospace !important;
        font-size: 16px;
        background: #1FF042;
        padding: 2px 10px;
        color: black;
        margin-bottom: 20px !important;
        width: 300px;
        text-align: center;
    }

    .sub-tab {
        font-family: Courier-Bold, Roboto, monospace !important;
        color: #1FF042;
        text-transform: uppercase;
        //border: 1px solid #1FF042;
        background: none;
    }

    .sub-tab > table > thead > tr > th
    {
        border: 1px solid #1FF042;
        padding: 8px 16px;
        font-size: 20px;
    }
    .sub-tab > table > tbody > tr > td
    {
        border: 1px solid #1FF042;
        padding: 2px 16px;
        font-size: 12px;
    }

    .inputcase
    {
        border: 3px solid #1FF042;
        color: #1FF042;
        font-size: 40px;
        padding-top: 8px;
        background: none;
        width: 80px;
        height: 80px;
        text-align: center;
        margin: -4px;
    }

</style>
