<template>
    <div class="row">
        <div class="col-md-12">
            <div class="row justify-content-center">
                <input type="text" id="symb_1" v-model="symb_1" class="form-control">
                <input type="text" id="symb_2" v-model="symb_2" class="form-control">
                <input type="text" id="symb_3" v-model="symb_3" class="form-control">
            </div>
            <div class="row justify-content-center">
                <button v-on:click="checkForm" class="btn-primary">Valider</button>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row justify-content-center hint-row">
                        <div class="offset-md-1 col-md-2">
                            <img :src="'/images/crystal_infini/C.png'" alt="" :class="[opacity?'fullOpacity':'noOpacity']">
                            <img :src="'/images/crystal_infini/R.png'" alt="" :class="[opacity?'noOpacity':'fullOpacity']">
                            <img :src="'/images/crystal_infini/I.png'" alt="" :class="[opacity?'fullOpacity':'noOpacity']">
                            <img :src="'/images/crystal_infini/S.png'" alt="" :class="[opacity?'fullOpacity':'noOpacity']">
                            <img :src="'/images/crystal_infini/T.png'" alt="" :class="[opacity?'noOpacity':'fullOpacity']">
                            <img :src="'/images/crystal_infini/A.png'" alt="" :class="[opacity?'fullOpacity':'noOpacity']">
                            <img :src="'/images/crystal_infini/L.png'" alt="" :class="[opacity?'noOpacity':'fullOpacity']">
                        </div>
                        <div class="col-md-2">
                            <p class="text-white">Pierre précieuse</p>
                        </div>
                    </div>
                    <div class="row justify-content-center hint-row">
                        <div class="offset-md-1 col-md-2">
                            <img :src="'/images/crystal_infini/I.png'" alt="" :class="[opacity?'fullOpacity':'noOpacity']">
                            <img :src="'/images/crystal_infini/N.png'" alt="" :class="[opacity?'noOpacity':'fullOpacity']">
                            <img :src="'/images/crystal_infini/F.png'" alt="" :class="[opacity?'fullOpacity':'noOpacity']">
                            <img :src="'/images/crystal_infini/I.png'" alt="" :class="[opacity?'fullOpacity':'noOpacity']">
                            <img :src="'/images/crystal_infini/N.png'" alt="" :class="[opacity?'noOpacity':'fullOpacity']">
                            <img :src="'/images/crystal_infini/I.png'" alt="" :class="[opacity?'fullOpacity':'noOpacity']">
                        </div>
                        <div class="col-md-2">
                            <p class="text-white">Ne se fini jamais</p>
                        </div>
                    </div>
                    <div class="row justify-content-center hint-row">
                        <div class="offset-md-1 col-md-2">
                            <img :src="'/images/crystal_infini/Q.png'" alt="" :class="[opacity?'noOpacity':'fullOpacity']">
                            <img :src="'/images/crystal_infini/U.png'" alt="" :class="[opacity?'fullOpacity':'noOpacity']">
                            <img :src="'/images/crystal_infini/E.png'" alt="" :class="[opacity?'noOpacity':'fullOpacity']">
                            <img :src="'/images/crystal_infini/T.png'" alt="" :class="[opacity?'fullOpacity':'noOpacity']">
                            <img :src="'/images/crystal_infini/E.png'" alt="" :class="[opacity?'fullOpacity':'noOpacity']">
                        </div>
                        <div class="col-md-2">
                            <p class="text-white">à la recherche de</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <button v-if="success === true" v-on:click="unlock">Etape suivante</button>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <img :src="'/images/crystal_infini/alphabet_elfique.gif'" alt="">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "enigma_1",
    props: ['room'],
    data() {
        return {
            symb_1: null,
            symb_2: null,
            symb_3: null,
            success: false,
            opacity: false,
        }
    },
    mounted() {
        this.checkForm();
        this.unlock();
        this.changeOpacity();
    },
    created() {

    },
    computed: {
        myClass: function () {
            return {
                fullOpacity: this.opacity,
                noOpacity: !this.opacity,
            }
        }
    },
    methods: {
        checkForm() {
            if (this.symb_1 === 'cristal' && this.symb_2 === 'infini' && this.symb_3 === 'quete') {
                this.success = true;
            }
        },

        unlock() {
            if (this.success === true) {
                this.room.step = 2;
            }
        },

        changeOpacity() {
            setInterval(function (){
                this.opacity = !this.opacity;
            }.bind(this), 2500)
        }
    }
}
</script>

<style scoped>
input {
    border-radius: 4px;
    height: 80px;
    width: 80px;
    margin: 25px;
    text-align: center;
    font-size: 20px;
}

.input-true {
    border-color: green;
}

.input-false {
    border-color: red;
}

.btn-primary {
    font-size: 20px;
}

.elfic-letter {
    height: 20px;
    width: auto;
}

.hint-row{
    margin-top: 20px;
}

.fullOpacity{
    height: 20px;
    width: auto;
    transition: opacity 3s;
    opacity: 100%;
}

.noOpacity{
    height: 20px;
    width: auto;
    transition: opacity 3s;
    opacity: 0;
}

</style>
