<template>
    <div>
        <enigma_3_1 :parent="this" v-if="enigma_3_step === 1"/>
        <enigma_3_2 :parent="this" v-if="enigma_3_step === 2"/>
        <enigma_3_3 :parent="this" v-if="enigma_3_step === 3"/>
    </div>
</template>

<script>
import enigma_3_1 from "./Enigma_3_1";
import enigma_3_2 from "./enigma_3_2";
import enigma_3_3 from "./enigma_3_3";

export default {
    name: "enigma_3.vue",
    props: ['room'],
    components: {enigma_3_1, enigma_3_2, enigma_3_3},
    data() {
        return {
            enigma_3_step : 3,
            arrow_game_winner : null,
        }
    },
}
</script>

<style scoped>


div {
    color: white;
}

</style>
