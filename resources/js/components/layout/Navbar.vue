<template>
    <div>
    <nav id="header" class="navbar navbar-expand-lg navbar-light breakout-navbar">
        <router-link class="navbar-brand" to="/home">
            <div  id="header-logo" class="navbar-logo"></div>
        </router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="navbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse navbar-left" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <router-link class="nav-link nav-link-info nav-link-icones" to="#"><span class="nav-link-icones-span">Info</span><span class="sr-only">(current)</span></router-link>
                </li>
            </ul>
            <ul class="navbar-nav my-2 my-lg-0">
                <li class="nav-item">
                    <router-link class="nav-link nav-link-home nav-link-icones" to="/home"><span class="nav-link-icones-span">Accueil</span></router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link nav-link-room nav-link-icones" to="/rooms"><span class="nav-link-icones-span">Salles</span></router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link nav-link-forum nav-link-icones" to="/forum"><span class="nav-link-icones-span">Forum</span></router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link nav-link-shop nav-link-icones" to="/shop"><span class="nav-link-icones-span">Boutique</span></router-link>
                </li>
                <li class="nav-item dropdown" v-if="app.user">
                    <a class="nav-link nav-link-parameters nav-link-icones dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="nav-link-icones-span">Paramètres</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <router-link class="dropdown-item" to="/account">Mon compte</router-link>
                        <router-link class="dropdown-item" to="/avatar">Mon avatar</router-link>
                        <router-link class="dropdown-item" to="/inventory">Inventaire</router-link>
                        <router-link class="dropdown-item" to="/myrooms">Mes salles</router-link>
                    </div>
                </li>
                <li class="nav-item pr-4 d-none-991">
                    <a class="nav-link nav-link-sound nav-link-icones" href=""></a>
                </li>
                <li class="nav-item navbar-button">
                    <button class="navbar-profile-button" data-toggle="modal" :data-target="modal">
                        <span>{{ app.user ? "Mon profil" : "Se connecter" }}</span>
                    </button>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Modal connexion/register -->
    <div class="modal fade" v-if="!app.user" id="modalconnexion" tabindex="-1" aria-labelledby="modalconnexion" aria-hidden="true">
        <div class="modal-dialog login-modal-dialog modal-dialog-centered">
            <div class="login-modal-content">
                <div class="login-modal-header">
                    <div>
                        <div class="login-modal-error" v-if="errors.length" style="color: darkred;">
                            <p class="h-100">
                                <span v-for="error in errors">
                                    {{ error }}<br>
                                </span>
                            </p>
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 1 !important;">
                        <div aria-hidden="true" class="modal-cross"></div>
                    </button>
                </div>
                <div class="login-modal-body">
                    <ul class="nav nav-pills justify-content-between mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item onglet-modal-login margin-modal-login-left" role="presentation">
                            <a class="nav-link w-100 active" id="pills-connect-tab" data-toggle="pill" href="#pills-connect" role="tab" aria-controls="pills-connect" aria-selected="true">Se connecter</a>
                        </li>
                        <li class="nav-item onglet-modal-login margin-modal-login-right" role="presentation">
                            <a class="nav-link w-100" id="pills-register-tab" data-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">S'inscrire</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-connect" role="tabpanel" aria-labelledby="pills-connect-tab">
                            <div class="w-100 d-flex justify-content-between">
                                <div class="onglet-modal-login-body margin-modal-login-left" style="margin-top: 0 !important; margin-bottom: 10px !important;">
                                </div>
                                <div class="onglet-modal-login-body margin-modal-login-right" style="margin-top: 0 !important; margin-bottom: 10px !important;">
                                    <div class="w-100 h-100 p-3">
                                        <div class="d-flex justify-content-center">
                                            <img class="modal-login-logo" src="img/logos/BreakOut_Logotype_Citation.png">
                                        </div>
                                        <form method="POST" @submit.prevent="login" class="mt-4">
                                            <label for="login-mail" class="modal-login-credentials-text">Nom d'utilisateur :</label>
                                            <input id="login-mail" class="input-login" type="email" placeholder="Votre email" name="email" value="" required autocomplete="email" autofocus v-model="email">
                                            <label for="login-password" class="modal-login-credentials-text mt-2">Mot de passe :</label>
                                            <div class="input-group">
                                                <input id="login-password" type="password" class="form-control input-login-2 is-invalid" placeholder="Mot de passe" name="password" required autocomplete="current-password" v-model="password">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary input-login-btn" type="submit">GO</button>
                                                </div>
                                            </div>
                                            <div class="w-100 text-center mt-1">
                                                <a class="small-text-login" href="/">
                                                    <small>Mot de passe oublié ?</small>
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">
                            <div class="w-100 d-flex justify-content-center">
                                <div class="onglet-modal-register-body">
                                    <form method="POST" v-on:submit.prevent="register">
                                        <div class="w-100 h-100 d-flex justify-content-between">
                                            <div class="margin-modal-login-left h-100" style="margin-top: 0 !important; margin-bottom: 10px !important;">
                                                <div class="w-100 h-100 p-3">
                                                    <!-- email -->
                                                    <label for="login-mail-register" class="modal-login-credentials-text mt-1">Votre adresse email :</label>
                                                    <input id="login-mail-register" class="input-login" type="email" placeholder="Votre email" name="email" value="" required autocomplete="email" v-model="email" autofocus>

                                                    <!-- name -->
                                                    <label for="name" class="modal-login-credentials-text mt-2">Votre nom d'utilisateur :</label>
                                                    <input id="name" class="input-login" type="text" placeholder="Votre pseudo" name="name" value="" required autocomplete="name" v-model="name" autofocus>

                                                    <!-- password -->
                                                    <label for="password" class="modal-login-credentials-text mt-2">Votre mot de passe :</label>
                                                    <input id="password" type="password" class="input-login" placeholder="Votre mot de passe" name="password" required autocomplete="new-password" v-model="password">

                                                    <!-- password_verify -->
                                                    <label for="password-confirm" class="modal-login-credentials-text mt-2">Confirmation du mot de passe :</label>
                                                    <input id="password-confirm" type="password" class="input-login" placeholder="Confirmer le mot de passe" name="password_confirmation" required autocomplete="new-password" v-model="password_verify">

                                                </div>
                                            </div>
                                            <div class="margin-modal-login-right h-100" style="margin-top: 0 !important; margin-bottom: 10px !important;">
                                                <div class="w-100 h-100 p-3">
                                                    <div class="d-flex justify-content-center">
                                                        <img class="modal-login-logo" src="img/logos/BreakOut_Logotype_Citation.png">
                                                    </div>
                                                    <div class="text-center">
                                                        <label for="password-confirm" class="modal-login-credentials-text" style="margin-top: 42px;">Un code de parrainage :</label>
                                                        <div class="w-100">
                                                            <div class="input-group mb-3 d-flex justify-content-center">
                                                                <div class="input-group-prepend btn-parrainage-prepend">
                                                                    <span class="input-group-text" id="inputGroup-sizing-default"><img src="img/icones/ajouter_un_ami.png"></span>
                                                                </div>
                                                                <input type="text" class="btn-parrainage" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                                            </div>
                                                        </div>
                                                        <div class="form-check" style="/*margin-top: -6px;*/">
                                                            <input class="form-check-input" type="checkbox" value="" id="CheckConditions" v-model="checked">
                                                            <label class="form-check-label" for="CheckConditions">
                                                                <small>J'ai bien lu et j'accepte les conditions générales</small>
                                                            </label>
                                                        </div>
                                                        <button type="submit" class="btn-submit-register" style="margin-top: 6px;">Envoyer</button>
                                                        <div class="text-center" style="margin-top: 3px;">
                                                            <a href="" class="lien-conditions"><small>Conditions générales</small></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN Modal connexion/register -->
    <!-- Modal profil -->

    <!-- FIN Modal profil -->
    <div class="modal fade" id="modalprofil" v-if="app.user" tabindex="-1" aria-labelledby="modalprofil" aria-hidden="true">
        <div class="modal-dialog login-modal-dialog modal-dialog-centered">
            <div class="login-modal-content">
                <div class="login-modal-header">
                    <div class="josephin-bold color-white">{{ app.user.name }} - Mon profil</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 1 !important;">
                        <div aria-hidden="true" class="modal-cross"></div>
                    </button>
                </div>
                <div class="login-modal-body">
                    <div class="">{{ app.user.name }} - Mon profil</div>

                    <div style="float: left; width: 70px;">
                        {{ getGold }}
                        <div style="background-image: url('img/Banque_graphique/Objets/BOCoin_64.png'); background-repeat: no-repeat; background-size: contain; max-height: 20px !important; height: 20px; width: 20px; float: left;"></div>
                        <p>&nbsp;: {{ gold }}</p>
                    </div>

                    <div>
                        {{ getGem }}
                        <div style="background-image: url('img/Banque_graphique/Objets/gemme96.png'); background-repeat: no-repeat; background-size: contain; max-height: 20px !important; height: 20px; width: 20px; float: left;"></div>
                        <p>&nbsp;: {{ gem }}</p>
                    </div>
                    <a href="#" @click="logout"><button class="btn-profile"><i class="fas fa-sign-out-alt"></i></button></a>


                </div>
            </div>
        </div>
    </div>
    </div>
</template>
<script>
export default {
    name: "Navbar",
    props: ['app'],
    data(){
        return {
            /* modal */
            modalconnection:false,
            modalprofil:false,
            /* login */
            email : "",
            password : "",
            errors: [],
            /* register */
            modal : "#modalconnexion",
            name : "",
            password_verify : "",
            checked : false,
            /* Content */
            gold: 0,
            gem: 0
            /*test:""*/
        }
    },
    updated() {
       /*
        if(localStorage.email) this.test = localStorage.email;
        console.log(this.test);*/

        // Quand les valeurs sont modifiées
        this.modalValue();
    },
    methods: {
        modalValue() {
            if (this.app.user !== null){
                this.modal = "#modalprofil"
            } else
            {
                this.modal = "#modalconnexion";
            }
        },
        login: function () {
            if (!this.email) {
                this.errors.push('Email is required')
            }
            if (!this.password) {
                this.errors.push('Password is required')
            }

            if (!this.errors.length)
            {
                console.log("ok")
                const data = {
                    email: this.email,
                    password: this.password
                };
                console.log(data)

                this.app.req
                .post("auth/login", data)
                .then(response => {
                    this.app.user = response.data;
                    console.log("user login : " + this.app.user.name)
                    /* Variables de session*/
                    localStorage.email = response.data.email;
                    /* ... */

                    this.modal = "#modalprofil";
                    this.$router.push('/')
                })
                .catch(error => {
                    this.errors.push(error.response.data.error)
                })

            } else
            {
                console.log(this.errors.length)
            }

        },
        register() {
            this.errors = [];
            if (!this.name)
            {
                this.errors.push('Un nom est requis')
            }
            if (!this.email)
            {
                this.errors.push('Un email est requis')
            }
            if (!this.password)
            {
                this.errors.push('Un mot de passe est requis')
            }
            if (!this.password_verify)
            {
                this.errors.push('Un mot de passe de confirmation est requis')
            }
            if (this.password !== this.password_verify)
            {
                this.errors.push('Les mots de passes ne correspondent pas')
            }
            if (this.checked !== true)
            {
                this.errors.push('Vous devez accepter les conditions générales')
            }
            if (!this.errors.length)
            {
                console.log("ok")
                /*Vidéo : 28:15*/
                const data = {
                    email: this.email,
                    name: this.name,
                    password: this.password
                }

                this.app.req.post('auth/register', data).then(response => {
                    this.app.user = response.data;
                    this.$router.push("/");
                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });

            } else
            {
                console.log(this.errors);
            }
        },
        logout() {
            this.app.req.post("auth/logout").then(() => {
                this.app.user=null;
                this.modal = "#modalconnexion";
                this.$router.push("/home");
            });
        }
    },
    computed: {
        getGold: function () {
            this.app.req.post("useritems/getgold").then(response => {
                this.gold = response.data;
            });
        },
        getGem: function () {
            this.app.req.post("useritems/getgem").then(response => {
                this.gem = response.data;
            });
        }
    }

    /*https://www.youtube.com/watch?v=qKr1V9GGpcA*/
}
</script>
<style>

</style>
