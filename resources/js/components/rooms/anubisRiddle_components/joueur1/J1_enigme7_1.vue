<template>
    <div class="terminal-body text-center">
        <div class="body-c w-100">
            <div class="w-100" style="margin-bottom: 10px;">
                <h1 class="title-egypte" style="margin-bottom: 50px; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">ENIGME 7</h1>
            </div>
            <div class="d-flex justify-content-center">
                <div class="sketchfab-embed-wrapper">
                    <iframe title="A 3D model" width="640" height="350" src="https://sketchfab.com/models/94bc2c401fa049308e117e891516aafb/embed?autostart=1&amp;ui_controls=1&amp;ui_infos=1&amp;ui_inspector=1&amp;ui_stop=1&amp;ui_watermark=1&amp;ui_watermark_link=1" frameborder="0" allow="autoplay; fullscreen; vr" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <input v-model="password" @keyup="verify()" type="text" class="inpt-sculpure">
            </div>
            <div class="row" style="margin: 0;">
                <div class="col-md-4 mx-auto" style="margin-top: 20px;">
                    <p class="sous-texte" style="margin-top: 20px;">
                        Avant de résoudre cette énigme,<br>
                        aide ton partenaire qui est bloqué à l'énigme 6 :<br>
                        "Le soleil doit se coucher !"
                    </p>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "enigme7",
    props: ['room'],
    data() {
        return {
            password: "",
            errors: []
        }
    },
    mounted() {
        document.title="Breakout - Anubis Riddle";
    },
    methods: {
        verify()
        {
            if((this.password).toUpperCase() === "CROCODILE")
            {
                this.room.enigme = 8;
                this.room.phase = 0;
            }
        },
    },
    computed: {

    }
}
</script>
<style scoped>
    .inpt-sculpure
    {
        margin-top: 50px;
        border-radius: 20px 20px 20px 20px;
        text-align: center;
        font-family: Volte;
    }
</style>
