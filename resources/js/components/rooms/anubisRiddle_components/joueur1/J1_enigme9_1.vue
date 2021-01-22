<template>
    <div class="terminal-body text-center">
        <div class="body-c w-100">
            <div class="w-100" style="margin-bottom: 10px;">
                <h1 class="title-egypte" style="margin-bottom: 50px; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">ENIGME 9</h1>
            </div>
            <div class="d-flex justify-content-center">
                <img src="/img/salles/anubis_riddle/equation.png" class="img-fluid equationimg">
            </div>
            <div class="">
                <p class="equal">=</p>
            </div>
            <div class="d-flex justify-content-center ">
                <input v-model="password" @keyup="verify()" type="text" class="inpt-equation">
            </div>
            <div class="row" style="margin: 0;">
                <div class="col-md-4 mx-auto" style="margin-top: 20px;">
                    <p class="sous-texte" style="margin-top: 20px;">
                        Ton partenaire est bloqué à l'énigme 8 :<br>
                        "Clique deux fois sur la première case et glisse vers les abysses !"
                    </p>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "enigme9",
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
            if(Number(this.password) === 75)
            {
                /*
                    triangle = 7
                    carré = 10
                    rond = 2
                    triangle inversé = 5

                    Réponse : 75
                 */
                this.room.enigme = 10;
                this.room.phase = 0;
            }

        },
    },
    computed: {

    }
}
</script>
<style scoped>
.equationimg {
    max-height: 100px;
}
.equal
{
    font-family: Volte;
    font-size: 150px;
    color: white;
    margin-top: -20px !important;
    height: 130px;
}
.inpt-equation
{
    margin-top: 50px;
    border-radius: 20px 20px 20px 20px;
    text-align: center;
    font-family: Volte;
}
</style>
