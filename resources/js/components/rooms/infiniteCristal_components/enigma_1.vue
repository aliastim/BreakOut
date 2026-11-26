<template>
    <div>
        <div class="row justify-content-center">
            <input type="text" id="symb_1" v-model="symb_1">
            <input type="text" id="symb_2" v-model="symb_2">
            <input type="text" id="symb_3" v-model="symb_3">
        </div>
        <div class="row justify-content-center">
            <button v-on:click="checkForm()" class="btn-primary">Valider</button>
        </div>
        <div class="row justify-content-center">
            <button v-if="success === true" v-on:click="unlock">Etape suivante</button>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row justify-content-center hint-row">
                    <div class="offset-md-1 col-md-2">
                        <img :src="'/images/crystal_infini/1.png'" alt="" :class="[opacity?'fullOpacity':'noOpacity']">
                        <img :src="'/images/crystal_infini/2.png'" alt="" :class="[opacity?'noOpacity':'fullOpacity']">
                        <img :src="'/images/crystal_infini/3.png'" alt="" :class="[opacity?'fullOpacity':'noOpacity']">
                    </div>
                    <div class="col-md-2">
                        <p class="text-white">Rien n'est juste</p>
                    </div>
                </div>
                <div class="row justify-content-center hint-row">
                    <div class="offset-md-1 col-md-2">
                        <img :src="'/images/crystal_infini/6.png'" alt="" :class="[opacity?'fullOpacity':'noOpacity']">
                        <img :src="'/images/crystal_infini/1.png'" alt="" :class="[opacity?'noOpacity':'fullOpacity']">
                        <img :src="'/images/crystal_infini/2.png'" alt="" :class="[opacity?'fullOpacity':'noOpacity']">
                    </div>
                    <div class="col-md-2">
                        <p class="text-white">Un chiffre est juste mal placé</p>
                    </div>
                </div>
                <div class="row justify-content-center hint-row">
                    <div class="offset-md-1 col-md-2">
                        <img :src="'/images/crystal_infini/4.png'" alt="" :class="[opacity?'noOpacity':'fullOpacity']">
                        <img :src="'/images/crystal_infini/5.png'" alt="" :class="[opacity?'fullOpacity':'noOpacity']">
                        <img :src="'/images/crystal_infini/6.png'" alt="" :class="[opacity?'noOpacity':'fullOpacity']">
                    </div>
                    <div class="col-md-2">
                        <p class="text-white">Un chiffre est juste mal placé</p>
                    </div>
                </div>
                <div class="row justify-content-center hint-row">
                    <div class="offset-md-1 col-md-2">
                        <img :src="'/images/crystal_infini/1.png'" alt="" :class="[opacity?'noOpacity':'fullOpacity']">
                        <img :src="'/images/crystal_infini/5.png'" alt="" :class="[opacity?'fullOpacity':'noOpacity']">
                        <img :src="'/images/crystal_infini/8.png'" alt="" :class="[opacity?'noOpacity':'fullOpacity']">
                    </div>
                    <div class="col-md-2">
                        <p class="text-white">Un chiffre est juste et bien placé, un chiffre est juste mais mal
                            placé</p>
                    </div>
                </div>
                <div class="row justify-content-center hint-row">
                    <div class="offset-md-1 col-md-2">
                        <img :src="'/images/crystal_infini/8.png'" alt="" :class="[opacity?'noOpacity':'fullOpacity']">
                        <img :src="'/images/crystal_infini/3.png'" alt="" :class="[opacity?'fullOpacity':'noOpacity']">
                        <img :src="'/images/crystal_infini/4.png'" alt="" :class="[opacity?'noOpacity':'fullOpacity']">
                    </div>
                    <div class="col-md-2">
                        <p class="text-white">Un chiffre est juste mais mal placé</p>
                    </div>
                </div>
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
            if (this.symb_1 === "5" && this.symb_2 === "6" && this.symb_3 === "8"){
                this.success = true;
            }
        },

        unlock() {
            if (this.success === true) {
                this.room.step = 2;
                this.room.enigma_1 = true;
            }
        },

        changeOpacity() {
            setInterval(function () {
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

.hint-row {
    margin-top: 20px;
}

.fullOpacity {
    height: 50px;
    width: auto;
    transition: opacity 3s;
    opacity: 100%;
}

.noOpacity {
    height: 50px;
    width: auto;
    transition: opacity 3s;
    opacity: 0;
}

</style>
