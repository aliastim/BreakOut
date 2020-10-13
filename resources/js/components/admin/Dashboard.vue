<template>
    <div v-if="key === true">
        <div class="breakout-admin-body">
            <div class="w-100 row" style="margin: 0 !important;">
                <div class="breakout-admin-left">
                    <div class="nav flex-column nav-pills h-100" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link" id="v-pills-dashboard-tab" data-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">
                            <div>Dashboard</div>
                        </a>
                        <a class="nav-link active" id="v-pills-users-tab" data-toggle="pill" href="#v-pills-users" role="tab" aria-controls="v-pills-users" aria-selected="false">
                            <div>Utilisateurs</div>
                        </a>
                        <a class="nav-link" id="v-pills-rooms-tab" data-toggle="pill" href="#v-pills-rooms" role="tab" aria-controls="v-pills-rooms" aria-selected="false">
                            <div>
                                Salles
                            </div>
                        </a>
                        <a class="nav-link" id="v-pills-objets-tab" data-toggle="pill" href="#v-pills-objets" role="tab" aria-controls="v-pills-objets" aria-selected="false">
                            <div>Objets</div>
                        </a>
                    </div>
                </div>
                <div class="breakout-admin-right">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab"></div>
                        <div class="tab-pane fade show active" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab"><Users :admin="this"></Users></div>
                        <div class="tab-pane fade" id="v-pills-rooms" role="tabpanel" aria-labelledby="v-pills-rooms-tab">...</div>
                        <div class="tab-pane fade" id="v-pills-objets" role="tabpanel" aria-labelledby="v-pills-objets-tab">...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Users from "./Users";
export default {
    name: "Admin",
    props: ['app'],
    components: {Users},
    data() {
        return {
            key: false,
            req: this.app.req
        }
    },
    beforeMount() {
        this.admin();
    },
    computed: {
        userverif: function ()
        {
            if(this.app.user)
            {
                //Retourne l'utilisateur connecté
                return this.app.user;

            } else {
                return false;
            }
        }
    },
    methods : {
           /* admin() {
                try {
                    if(this.app.user)
                    {
                        if(this.app.user.admin === 1)
                        {
                            //document.title="admin";
                            console.log("Administrateur confirmé");
                            return true;
                        } else
                        {
                            console.log("Utilisateur non autorisé");
                            this.$router.push('/');
                            return false
                        }
                    } else
                    {
                        console.log("Utilisateur non connecté");
                        this.$router.push('/');
                        return false
                    }
                } catch (e) {
                    return false;
                }
            }*/
            admin() {
                this.app.req.post("auth/init").then(response => {
                    if(response.data.user == null) {
                        console.log('Utilisateur non connecté');
                        this.$router.push('/');
                    } else
                    {
                        if (response.data.user.admin === 1) {
                            console.log("Administrateur confirmé");
                            this.key = true;
                            return true;
                        } else if (response.data.user.admin !== 1) {
                            console.log("Utilisateur non autorisé");
                            this.$router.push('/');
                            return false;
                        }
                    }

                });
            },
        }
}
</script>
<style>

</style>
