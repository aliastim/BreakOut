<template>
    <div>
        <div class="row mb-3" v-for="n in arrow">
            <div class="arrow" v-on:click="pick_arrow()"></div>
        </div>
        <div class="row">
            <button v-on:click="skip_turn">Tour terminé</button>
            {{Turn}}
        </div>
    </div>
</template>

<script>
export default {
    name: "enigma_3.vue",
    props: ['room'],
    data() {
        return {
            arrow : 13,
            Turn : 0,
        }
    },
    mounted() {
      this.pick_arrow();
      this.skip_turn();
    },
    methods: {
        pick_arrow(){
            if (this.Turn === 0){
                this.arrow = this.arrow - 1;
            }else if (this.Turn === 1){
                this.arrow = this.arrow - Math.floor(Math.random() * 3);
            }
        },

        skip_turn(){
            if (this.Turn === 0){
                this.Turn = 1;
            }else if (this.Turn === 1){
                this.Turn = 0;
            }
        }
    }
}
</script>

<style scoped>
.arrow{
    height: 20px;
    width: 50px;
    background-color: #0f6674;
}

</style>
