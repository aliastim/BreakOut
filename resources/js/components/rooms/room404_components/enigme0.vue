<template>
    <div class="e1-body">
        {{ key_verify }}
        <div class="container text-center mt-3">
            <h1>ROOM 404</h1>
            <div><img class="serrure" src="img/salles/room404/serrure.PNG"></div>
            <div><button @click="deverouillage()" :class="{'btn-nokey' : key === false, 'btn-key' : key === true}">Entrez</button></div>
            <p>Vous devez dévérouiller la serrure pour pouvoir entrer</p>
            <div>
                <div v-if="key === true"></div>
                <div v-else-if="errors.length">
                    <label v-for="error in errors">{{ error }}</label>
                </div>
                <div v-else>
                    <label>Il vous manque 1 clé</label>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "enigme0",
    props: ['room'],
    data() {
        return {
            key: false,
            errors: []
        }
    },
    mounted() {
        document.title="Breakout - ROOM404";
    },
    computed : {
        key_verify: function () {
            const data = {
                item_slug: "cle-mysterieuse",
            }
            this.room.app.req.post("useritems/loaditem", data).then(response => {
                if(response.data === "itemok") {
                    //L'utilisateur a la clé
                    this.key = true;

                } else if(response.data === "notitem")
                {
                    //L'utilisateur n'a pas la clé
                } else
                {
                    console.log(response.data);
                }

            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
    },
    methods: {
        deverouillage() {
            if(this.key === true)
            {
                this.room.enigme = 1;
            }
        }
    }
}
</script>
<style scoped>
    .e1-body{
        font-family: Montserrat;
    }
    .e1-body h1{
        font-weight: bold;
        font-size: 48px;
    }
    .e1-body p{
        font-weight: bold;
        font-size: 20px;
    }
    .serrure {
        max-height: 448px;
    }
    .btn-nokey
    {
        background: #2E281F;
        color: #CCCCCC;
        height: 100px;
        width: 400px;
        font-size: 40px;
        font-weight: bold;
        border: none;
        border-radius: 10px;
        text-transform: uppercase;
        box-shadow: 0 4px 4px black;
    }

    .btn-key
    {
        background: #875C1D;
        color: #ffffff;
        height: 100px;
        width: 400px;
        font-size: 40px;
        font-weight: bold;
        border: none;
        border-radius: 10px;
        text-transform: uppercase;
        box-shadow: 0 4px 4px black;
        transition: 0.3s;
    }

    .btn-key:hover
    {
        background: #F1A738;
        margin-top: -10px;
        margin-bottom: 10px;
        cursor: pointer;
    }

    .e1-body label{
        font-weight: bold;
        color: #FFB800;
        font-size: 18px;
    }
</style>
