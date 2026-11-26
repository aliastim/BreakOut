<template>
    <div>
        <Enigma_3_1 :parent="this" v-if="Arrow_game === true"/>
    </div>
</template>

<script>
import Enigma_3_1 from "./Enigma_3_1";
import enigma_3_2 from "./enigma_3_2";
import enigma_3_3 from "./enigma_3_3";

export default {
    name: "enigma_3.vue",
    props: ['room'],
    components: {Enigma_3_1, enigma_3_2, enigma_3_3},
    data() {
        return {
            Arrow_game : true,
            Archery : false,
            Lumberjack : false,
        }
    }
}
</script>

<style scoped>


div {
    color: white;
}

</style>
