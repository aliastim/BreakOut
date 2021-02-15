<template>
    <div>
        {{ connect }}

        <div v-if="(connected === true)">
            <div class="breakout-body-before text-center" style="margin-top: 100px;">
                <h1 class="breakout-body-before-title josephin-bold">Personnaliser mon avatar</h1>
            </div>
            <div class="breakout-body">
                <hr class="liseret-rouge">
                <div class="container d-flex pt-4">

                    <div class="user-account-body-left">
                        <ul class="nav nav-pills d-flex justify-content-between mb-3" id="user-pills-tab" role="tablist">
                            <li class="nav-item link-user-parameters" role="presentation">
                                <router-link to="/account" class="nav-link" id="parameters-tab" data-toggle="pill" role="tab" aria-controls="parameters" aria-selected="false"><i class="fas fa-cog"></i> Paramètres</router-link>
                            </li>
                            <li class="nav-item link-user-parameters" role="presentation">
                                <router-link to="/avatar" class="nav-link active" id="avatar-tab" data-toggle="pill"  role="tab" aria-controls="avatar" aria-selected="true"><i class="fas fa-male"></i> Avatar</router-link>
                            </li>
                            <li class="nav-item link-user-parameters" role="presentation">
                                <router-link to="/inventory" class="nav-link" id="inventory-tab" data-toggle="pill" role="tab" aria-controls="inventory" aria-selected="false"><i class="fas fa-trophy"></i> Inventaire</router-link>
                            </li>
                            <li class="nav-item link-user-parameters" role="presentation">
                                <router-link to="/myrooms" class="nav-link" id="rooms-tab" data-toggle="pill"  role="tab" aria-controls="rooms" aria-selected="false"><i class="fab fa-quinscape"></i> Mes salles</router-link>
                            </li>
                        </ul>

                        <div class="">
                            Mon avatar
                        </div>

                    </div>

                    <div class="user-account-body-right">

                    </div>

                </div>
                <global-footer></global-footer>
            </div>
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
