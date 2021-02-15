<template>
    <div>
        {{ connect }}

        <div v-if="(connected === true)">
            <div class="breakout-body-before text-center" style="margin-top: 100px;">
                <h1 class="breakout-body-before-title josephin-bold">Mes paramètres utilisateur</h1>
            </div>
            <div class="breakout-body">
                <hr class="liseret-rouge">
                <div class="container d-flex pt-4">

                    <div class="user-account-body-left">
                        <ul class="nav nav-pills d-flex justify-content-between mb-3" id="user-pills-tab" role="tablist">
                            <li class="nav-item link-user-parameters" role="presentation">
                                <router-link to="/account" class="nav-link active" id="parameters-tab" data-toggle="pill" role="tab" aria-controls="parameters" aria-selected="true"><i class="fas fa-cog"></i> Paramètres</router-link>
                            </li>
                            <li class="nav-item link-user-parameters" role="presentation">
                                <router-link to="/avatar" class="nav-link" id="avatar-tab" data-toggle="pill"  role="tab" aria-controls="avatar" aria-selected="false"><i class="fas fa-male"></i> Avatar</router-link>
                            </li>
                            <li class="nav-item link-user-parameters" role="presentation">
                                <router-link to="/inventory" class="nav-link" id="inventory-tab" data-toggle="pill" role="tab" aria-controls="inventory" aria-selected="false"><i class="fas fa-trophy"></i> Inventaire</router-link>
                            </li>
                            <li class="nav-item link-user-parameters" role="presentation">
                                <router-link to="/myrooms" class="nav-link" id="rooms-tab" data-toggle="pill"  role="tab" aria-controls="rooms" aria-selected="false"><i class="fab fa-quinscape"></i> Mes salles</router-link>
                            </li>
                        </ul>

                        <div class="personal-user-info-body m-4">
                            <div class="ligne-personal-informations mb-3">
                                <hr>
                                <p class="josephin-bold">Mes informations personnelles</p>
                            </div>
                            <div class="row" style="margin: 0;">
                                <div class="col-12 col-md-5 mb-3" style="padding: 0;">
                                    <p class="josephin-bold" style="color: white;">Mon nom d'utilisateur :</p>
                                    <div><input class="inpt-personal-informations" type="text"></div>
                                </div>
                                <div class="col-12 col-md-5 mb-3" style="padding: 0;">
                                    <p class="josephin-bold" style="color: white;">Modifier mon mot de passe :</p>
                                    <div><input class="inpt-personal-informations" type="text"></div>
                                </div>
                                <div class="col-12 col-md-2 mb-3 text-center" style="padding: 0;">
                                    <p class="josephin-bold" style="color: white;">Dernière connexion</p>
                                    <p class="josephin-bold-italic" style="color: #F9BA48;">XX/XX/XXXX</p>
                                </div>
                            </div>
                            <div class="row mb-4" style="margin: 0;">
                                <div class="col-12 col-md-5 mb-3" style="padding: 0;">
                                    <p class="josephin-bold" style="color: white;">Mon adresse email :</p>
                                    <div><input class="inpt-personal-informations" type="text"></div>
                                </div>
                                <div class="col-12 col-md-5 mb-3" style="padding: 0;">
                                    <p class="josephin-bold" style="color: white;">Confirmer mon mot de passe :</p>
                                    <div><input class="inpt-personal-informations" type="text"></div>
                                </div>
                                <div class="col-12 col-md-2 mb-3 text-center" style="padding: 0;">
                                    <p class="josephin-bold" style="color: white;">-</p>
                                    <div><button class="btn-personal-informations josephin-bold">Sauvegarder</button></div>
                                </div>
                            </div>

                            <div class="ligne-personal-informations mb-3">
                                <hr>
                                <p class="josephin-bold">Mes paramètres</p>
                            </div>

                            <div class="row" style="margin: 0;">
                                <div class="col-12 col-md-5 mb-3" style="padding: 0;">
                                    <p class="josephin-bold" style="color: white;">Lecture automatique de la musique sur le site :</p>
                                    <div></div>
                                </div>
                                <div class="col-12 col-md-5 mb-3" style="padding: 0;">
                                    <p class="josephin-bold" style="color: white;">Mon code de parrainage :</p>
                                    <p class="" style="color: #F9BA48;">NHS56S</p>
                                </div>
                                <div class="col-12 col-md-2 mb-3 text-center" style="padding: 0;">
                                    <p class="josephin-bold" style="color: white;">Type d'utilisateur</p>
                                    <p class="" style="color: #F9BA48;">Normal</p>
                                </div>
                            </div>

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
.personal-user-info-body
{
    background: #2C3946;
    border-radius: 10px;
    height: calc(100% - 30px);
    padding: 5px 20px 0px 20px;
    overflow: auto;
}
.ligne-personal-informations
{
    position: relative;
    height: 20px;
}
.ligne-personal-informations>hr
{
    position: absolute;
    border: 1px solid #212121;
    width: 100%;
    z-index: 8;
}
.ligne-personal-informations>p
{
    position: absolute;
    background: #2C3946;
    color: #F9BA48;
    padding-right: 20px;
    top: 5px;
    z-index: 9;
}

.inpt-personal-informations
{
    border: 3px solid #212121;
    border-radius: 5px;
    background: none;
    height: 35px;
    color: #F9BA48;
    padding-left: 7px;
    width: calc(100% - 40px);

}

.btn-personal-informations
{
    width: 100%;
    height: 35px;
    background: #F9BA48;
    color: black;
    border: 3px solid #212121;
    text-transform: uppercase;
    border-radius: 10px;
    padding-top: 3px;
    transition: 0.3s;
    cursor: pointer;
    overflow: hidden;
}

.btn-personal-informations:hover
{
    background: #c38414;
    color: black;
    border: 3px solid #212121;
}

</style>
