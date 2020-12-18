<template>
    <div>
        {{ connect }}
        <div class="breakout-body" v-if="(connected === true)">
            <global-footer></global-footer>
        </div>
    </div>
</template>
<script>
import GlobalFooter from "./../layout/Footer";
export default {
    name: "Avatar",
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
    }
}
</script>
<style>

</style>
