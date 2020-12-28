<template>
    <div>
        {{ key_verify }}
        <room-header :room="this"></room-header>
        <div>
            <div class="container text-center mt-3">
                <h1 style="font-size: 200px;">ROOM 404</h1>
                <h2>Enigme 1</h2>
            </div>
        </div>
    </div>
</template>
<script>

import RoomHeader from "../layout/RoomHeader";
export default {
    name: "room404",
    props: ['app'],
    components: {RoomHeader},
    data(){
        return {
            timer: 45,
        }
    },
    computed : {
        key_verify: function () {
            const data = {
                item_slug: "cle-mysterieuse",
            }
            this.app.req.post("useritems/loaditem", data).then(response => {
                /*if(response.data.user == null) {
                    console.log('Utilisateur non connecté');
                    return false;
                } else
                {
                    console.log('Accès au compte');
                    this.connected = true;
                    return true;
                }*/
                console.log(response.data);
            });
        },
    },
    mounted() {
        this.app.navbool = false;
    },
    methods : {

    },
}

</script>
<style>

</style>
