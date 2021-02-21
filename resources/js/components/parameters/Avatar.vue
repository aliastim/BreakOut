<template>
    <div>
        {{ connect }}
        <div v-if="(connected === true)">
            {{ loadingAvatar }}
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

                        <div class="h-100 w-100 position-relative">
                            <div class="avatar-body">
                                <div class="avatar-body-left">
                                    <div class="avatar-onglets" style="margin-top: 8px;">
                                        <div :class="('avatar-onglet ' + ((selected_equipment === 'visage') ? 'selected'  : ''))" style="border-radius: 10px 10px 0 0;" @click="changeEquipements('visage', avatar.sexe)">
                                            <p class="josephin-bold" style="margin: 0;">
                                                Visages
                                            </p>
                                        </div>
                                        <div :class="('avatar-onglet ' + ((selected_equipment === 'hauts') ? 'selected'  : ''))" @click="changeEquipements('hauts', avatar.sexe)">
                                            <p class="josephin-bold" style="margin: 0;">
                                                Hauts
                                            </p>
                                        </div>
                                        <div :class="('avatar-onglet ' + ((selected_equipment === 'bas') ? 'selected'  : ''))" @click="changeEquipements('bas', avatar.sexe)">
                                            <p class="josephin-bold" style="margin: 0;">
                                                Bas
                                            </p>
                                        </div>
                                        <div :class="('avatar-onglet ' + ((selected_equipment === 'gants') ? 'selected'  : ''))" @click="changeEquipements('gants', avatar.sexe)">
                                            <p class="josephin-bold" style="margin: 0;">
                                                Gants
                                            </p>
                                        </div>
                                        <div :class="('avatar-onglet ' + ((selected_equipment === 'chaussures') ? 'selected'  : ''))" @click="changeEquipements('chaussures', avatar.sexe)">
                                            <p class="josephin-bold" style="margin: 0;">
                                                Chaussures
                                            </p>
                                        </div>
                                        <div :class="('avatar-onglet ' + ((selected_equipment === 'accessoires') ? 'selected'  : ''))" @click="changeEquipements('accessoires', avatar.sexe)">
                                            <p class="josephin-bold" style="margin: 0;">
                                                Accessoires
                                            </p>
                                        </div>
                                        <div :class="('avatar-onglet ' + ((selected_equipment === 'familiers') ? 'selected'  : ''))" @click="changeEquipements('familiers', avatar.sexe)">
                                            <p class="josephin-bold" style="margin: 0;">
                                                Familiers
                                            </p>
                                        </div>
                                        <div :class="('avatar-onglet ' + ((selected_equipment === 'fonds') ? 'selected'  : ''))" @click="changeEquipements('fonds', avatar.sexe)" style="border-radius: 0 0 10px 10px;">
                                            <p class="josephin-bold" style="margin: 0;">
                                                Fonds
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="avatar-body-right">
                                    <div class="avatar-window">

                                        <div class="btn-group btn-group-toggle btn-sexe" data-toggle="buttons">
                                            <label :class="('btn ' +  ((avatar.sexe === 'male') ? 'active': ''))" @click="changeSexe('male')">
                                                <input type="radio" name="options" id="option1" :checked="(avatar.sexe === 'male')"> <i class="fas fa-mars"></i>
                                            </label>
                                            <label :class="('btn ' +  ((avatar.sexe === 'female') ? 'active': ''))" @click="changeSexe('female')">
                                                <input type="radio" name="options" id="option3" :checked="(avatar.sexe === 'female')"> <i class="fas fa-venus"></i>
                                            </label>
                                        </div>

                                        <div class="w-100 h-100 apercu_personnage_rar apercu_personnage_rar__affiche" style="margin-top: 0px;">
                                            <img v-if="avatar_items.accessoire" style="z-index: 906; margin-left: calc(50% - 128px) !important;" :src="avatar_items.accessoire.img" class="res_1X apercu_personnage_rar__calque">
                                            <img v-if="avatar_items.visage" style="z-index: 905; margin-left: calc(50% - 128px) !important;" :src="avatar_items.visage.img" class="res_1X apercu_personnage_rar__calque">
                                            <img v-if="avatar_items.gants" style="z-index: 904; margin-left: calc(50% - 128px) !important;" :src="avatar_items.gants.img" class="res_1X apercu_personnage_rar__calque">
                                            <img v-if="avatar_items.chaussures" style="z-index: 903; margin-left: calc(50% - 128px) !important;" :src="avatar_items.chaussures.img" class="res_1X apercu_personnage_rar__calque">
                                            <img v-if="avatar_items.bas" style="z-index: 902; margin-left: calc(50% - 128px) !important;" :src="avatar_items.bas.img" class="res_1X apercu_personnage_rar__calque">
                                            <img v-if="avatar_items.haut"  style="z-index: 901; margin-left: calc(50% - 128px) !important;" :src="avatar_items.haut.img" class="res_1X apercu_personnage_rar__calque">

                                            <img v-if="avatar.sexe === 'male'" style="z-index: 900; margin-left: calc(50% - 128px) !important;" src="/img/avatar/homme/corps_h.png" class="res_1X apercu_personnage_rar__calque">
                                            <img v-if="avatar.sexe === 'female'" style="z-index: 900; margin-left: calc(50% - 128px) !important;" src="/img/avatar/femme/corps_f.png" class="res_1X apercu_personnage_rar__calque">
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="equipements">
                                <div class="row" style="margin: 0; flex-wrap: nowrap !important;">
                                    <div class="equipement">
                                        <div :class="'avatar-item avatar-item-disabled '" @click="updateAvatar(null)"><i class="fas fa-ban"></i></div>
                                    </div>
                                    <div class="equipement" v-for="(item, index) in equipements" :id="'item-'+item.id" @click="updateAvatar(item.id)">
                                        <div :class="'avatar-item d-flex '">
                                            <img :src="item.img">
                                        </div>
                                    </div>
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
    name: "Avatar",
    components: {GlobalFooter},
    props: ['app'],
    data() {
        return {
            connected: false,
            avatar:[],
            avatar_items:[],
            equipements: [],
            selected_equipment: "visage",
            errors: []
        }
    },
    computed : {
        connect: function () {
            axios.post("auth/init").then(response => {
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
        loadingAvatar: function ()
        {
            this.loadAvatar();
        }

    },
    methods: {
        loadAvatar()
        {
            this.errors= [];
            axios.post('/bo_avatar/loadavatar').then(response => {
                this.avatar = response.data[0];
                this.avatar_items = response.data[1];
                this.changeEquipements(this.selected_equipment, this.avatar.sexe);
                console.log(response.data);

            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
        changeSexe(sexe)
        {
            if(this.avatar.sexe !== sexe)
            {
                const data = {
                    sexe : sexe
                }
                this.errors= [];
                axios.post('/bo_avatar/changesexe', data).then(response => {
                    this.avatar_items.visage = null;
                    this.avatar_items.accessoire = null;
                    this.avatar_items.haut = null;
                    this.avatar_items.bas = null;
                    this.avatar_items.gants = null;
                    this.avatar_items.chaussures = null;
                    this.avatar.sexe = sexe;
                    this.changeEquipements(this.selected_equipment, sexe);

                    console.log(response.data);

                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });
            }

        },
        changeEquipements(equipements, sexe)
        {
            this.selected_equipment = equipements
            const data = {
                equipements : equipements,
                sexe: sexe
            }
            this.errors= [];
            axios.post('/bo_avatar/loadequipments', data).then(response => {
                this.equipements = response.data;
                console.log(response.data);

            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
        updateAvatar(equipment_id)
        {
            const data = {
                equipement_id : equipment_id,
                selected_equipment : this.selected_equipment,
            }
            this.errors= [];
            axios.post('/bo_avatar/updateavatar', data).then(response => {
                //this.equipements = response.data;
                this.loadAvatar();
                console.log(response.data);

            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        }
    }
}
</script>
<style>
.avatar-body
{
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: calc(100% - 100px);
    /*background: #122442;*/
}

.avatar-body-left
{
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    width: 250px;
    /*background: plum;*/
}
.avatar-body-right
{
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    min-width: 250px;
    width: calc(100% - 250px);
    /*background: lavander;*/
}

.avatar-onglets>.selected
{
    background: #F9BA48 !important;
}

.avatar-onglet
{
    margin: 2px auto auto;
    text-align: center;
    width: calc(100% - 20px);
    background: #7B5B25;
    color: white;
    padding: 10px 0;
    cursor: pointer;
    transition: 0.3s;
}

.avatar-onglet:hover
{
    background: #F9BA48;
}

.avatar-window
{
    background: white;
    width: calc(100% - 10px);
    height: calc(100% - 20px);
    margin-top: 10px;
    margin-left: 0px;
    margin-right: 10px;
    border-radius: 20px 5px 20px 20px;
    overflow: hidden;
    display: flex;
    justify-content: center;
    position: relative;
}

.btn-sexe
{
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 999;
}

.btn-sexe>.btn
{
    color: #000000;
    background-color: #B79151;
    border-color: #B79151;
    font-weight: 900;
}

.btn-sexe>.active
{
    background-color: #7B5B25 !important;
    border-color: #7B5B25;
    color: #f9ba48 !important;
}

.equipements
{
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100px;
    background: #1C2731;
}

.equipement
{
    min-height: 100px;
    min-width: 100px;
    display: flex;
}
.equipement>.selected
{
    min-height: 90px !important;
    min-width: 90px !important;
    width: 90px !important;
    height: 90px !important;
    justify-content: center;
    overflow: hidden;
}

.avatar-item
{
    min-height: 80px;
    min-width: 80px;
    height: 80px;
    width: 80px;
    box-shadow: 0 3px 6px #212121;
    border-radius: 20px;
    background: #2C3946;
    margin: auto;
    border: 3px solid #c38414;
    transition: 0.3s;
    cursor: pointer;
    overflow: hidden;
    justify-content: center;
}

.avatar-item:hover
{
    min-height: 90px !important;
    min-width: 90px !important;
    background: #2C4E71;
}

.avatar-item-disabled
{
    text-align: center;
    color: #c38414;
}


.avatar-item:hover>i
{
    font-size: 47px !important;
}

.equipement>.selected>i
{
    font-size: 47px !important;
}

.equipement>.avatar-item-disabled>i
{
    font-size: 35px;
    padding-top: 18px;
    transition: 0.3s;
}

.avatar-item>img
{
    margin: auto;
    height: 80px;
    width: auto;
    transition: 0.3s;
}

.avatar-item:hover>img
{
    height: 90px;
}

.equipement>.selected>img
{
    height: 90px !important;
}
</style>
