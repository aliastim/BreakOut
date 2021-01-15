<template>
    <div>
        {{ connect }}

        <div v-if="(connected === true)">
            <div class="breakout-body-before" style="margin-top: 100px;">
                <marquee>test</marquee>
            </div>
            <div class="breakout-body">
                <hr class="liseret-rouge">
                <div class="container text-center pt-4">
                    <h1>Mon compte </h1>
                </div>
                <global-footer></global-footer>
            </div>
        </div>

    </div>
</template>
<script>
import GlobalFooter from "./../layout/Footer";
export default {
    name: "Account",
    components: {GlobalFooter},
    props: ['app'],
    data() {
        return {
            connected: false,
            errors: []
        }
    },
    computed : {
        connect: function () {
            this.app.req.post("auth/init").then(response => {
                if(response.data.user == null) {
                    console.log('Utilisateur non connecté');
                    return false;
                } else
                {
                    console.log('Accès au compte');
                    this.connected = true;
                    return true;
                }
            });
        },
    },
    methods: {
        test() {

        },
    }
}
</script>
<style>

</style>
