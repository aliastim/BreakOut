<template>
    <div class="terminal-body text-center">
        <div class="body-c w-100">
            {{ fade }}
            <div class="container text-center mt-3">
                <div>
                    <transition name="fade">
                        <p v-if="show" class="texte-intro">
                            Trois dalles gravées semblent égayer votre curiosité,
                        </p>
                    </transition>
                    <transition name="fade">
                        <p v-if="(show === true) && (show_etape >= 1)" class="texte-intro">celles-ci nécessitent votre réflexion !</p>
                    </transition>

                </div>
                <div class="text-center">
                    <div class="mt-5">
                        <transition name="fade">
                            <button v-if="(show === true) && (show_etape >= 2)" @click="suite()" class="button_egypte">Enigme 8</button>
                        </transition>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "enigme8",
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
