<template>
    <div class="terminal-body text-center">
        <div class="body-c w-100">
            {{ fade }}
            <div class="container text-center mt-3">
                <div>
                    <transition name="fade">
                        <p v-if="show" class="texte-intro">La porte de l’épreuve suivante s’ouvre et vous voilà maintenant face à un étrange tableau de caractères.</p>
                    </transition>
                    <!--<transition name="fade">
                        <p v-if="(show === true) && (show_etape >= 1)" class="texte-intro"></p>
                    </transition>-->

                </div>
                <div class="text-center">
                    <div class="mt-5">
                        <transition name="fade">
                            <button v-if="(show === true) && (show_etape >= 1)" @click="suite()" class="button_egypte">Enigme 2</button>
                        </transition>
                    </div>
                </div>
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
            show: false,
            show_etape: 0,

            errors: []
        }
    },
    mounted() {
        document.title="Breakout - Anubis Riddle";
    },
    methods: {
        suite() {
            this.room.phase = 1;
        }
    },
    computed: {
        fade: function ()
        {
            this.$interval = setInterval(()=> {
                this.show = true;
                this.$interval = setInterval(()=> {
                    this.show_etape++;
                }, 1000);
            }, 1000);
        }
    }
}
</script>
<style scoped>


</style>
