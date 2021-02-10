<template>
    <div>
        <div class="row">
            <div class="col-md-6" id="bassin">
                <div class="square"></div>
                <div class="fairy" v-if="Fairy_1_free === true" v-on:click="Fairy_capture(1)"></div>
                <div class="fairy" v-if="Fairy_1_free === true" v-on:click="Fairy_capture(2)"></div>
                <div class="fairy" v-if="Fairy_1_free === true" v-on:click="Fairy_capture(3)"></div>
            </div>
            <div class="col-md-6 align-self-center" style="background-color: #0f6674">
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <div id="cristal"></div>
                    </div>
                    <div class="col-md-2 fairy" v-if="Fairy_1_captured === true"></div>
                    <div class="col-md-2 fairy" v-if="Fairy_2_captured === true"></div>
                    <div class="col-md-2 fairy" v-if="Fairy_2_captured === true"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "enigma_2",
    props: ['room'],
    data() {
        return {
            Fairy_1_free: true,
            Fairy_1_captured: false,
            Fairy_2_captured: false,
            Fairy_3_captured: false,
        }
    },
    mounted() {
        this.Fairy_capture();
    },
    methods: {
        Fairy_capture(id) {
            if (id === 1) {
                this.Fairy_1_captured = true;
            } else if (id === 2) {
                this.Fairy_2_captured = true;
            } else {
                this.Fairy_3_captured = true;
            }
        }
    }

}
</script>

<style scoped>
#bassin {
    height: 500px;
    border: solid white;
}

#cristal {
    height: 100px;
    width: 100px;
    background-color: #bbb;
    border-radius: 50%;
}

.square {
    background-color: cornflowerblue;
    height: 20px;
    width: 20px;
}

.fairy {
    background-color: pink;
    height: 20px;
    width: 20px;
}

</style>
