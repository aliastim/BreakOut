<template>
    <div>
        <div class="bandeau-nouvelle-salle mb-3">
            Création d'un nouvel item
        </div>
        <div class="row mt-2" style="margin: 0;">
            <div class="col-12 col-md-4">
                <div class="cadre-admin-image-item">
                    <img :src="item_image">
                </div>
            </div>
            <div class="col-12 col-md-8" style="height: 210px !important;">
                <div class="row" style="margin: 0;">
                    <div class="col-12 col-md-4">
                        <div><label>Nom de l'objet :</label></div>
                        <div class="input-group">
                            <div class="input-group-prepend input-bo-prepend">
                                <span class="input-group-text"><i class="fas fa-hourglass-half"></i></span>
                            </div>
                            <input class="input-bo" type="text" v-model="item_name" placeholder="Nom de l'objet">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div><label>Type d'objet :</label></div>
                        <div class="input-group">
                            <div class="input-group-prepend input-bo-prepend">
                                <span class="input-group-text"><i class="fas fa-hourglass-half"></i></span>
                            </div>
                            <select class="custom-select input-bo" v-model="item_type">
                                <option disabled>Type d'objet</option>
                                <option selected  value="objet">Objet</option>
                                <option value="avatar/visage">Avatar/Visage</option>
                                <option value="avatar/hauts">Avatar/Hauts</option>
                                <option value="avatar/bas">Avatar/Bas</option>
                                <option value="avatar/gants">Avatar/Gants</option>
                                <option value="avatar/chaussures">Avatar/Chaussures</option>
                                <option value="avatar/accessoires">Avatar/Accessoires</option>
                                <option value="avatar/familiers">Avatar/Familiers</option>
                                <option value="avatar/fonds">Avatar/Fonds</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div><label>Monnaie d'échange :</label></div>
                        <div class="input-group">
                            <div class="input-group-prepend input-bo-prepend">
                                <span class="input-group-text"><i class="fas fa-hourglass-half"></i></span>
                            </div>
                            <select class="custom-select input-bo" v-model="item_money" >
                                <option disabled>Monnaie d'échange</option>
                                <option selected value="gold">Or</option>
                                <option value="gem">Gemme</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3" style="margin: 0;">
                    <div class="col-12 col-md-4">
                        <div><label>Prix en boutique :</label></div>
                        <div class="input-group">
                            <div class="input-group-prepend input-bo-prepend">
                                <span class="input-group-text"><i class="fas fa-hourglass-half"></i></span>
                            </div>
                            <input class="input-bo" type="text" v-model="item_price" placeholder="Prix en boutique">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div><label>Sexe (Avatar) :</label></div>
                        <div class="input-group">
                            <div class="input-group-prepend input-bo-prepend">
                                <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                            </div>
                            <select class="custom-select input-bo" v-model="item_sexe" >
                                <option disabled>Utilisable en jeu ?</option>
                                <option selected value="">Objet non avatar</option>
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div><label>Utilisable en jeu ? :</label></div>
                        <div class="input-group">
                            <div class="input-group-prepend input-bo-prepend">
                                <span class="input-group-text"><i class="fas fa-hourglass-half"></i></span>
                            </div>
                            <select class="custom-select input-bo" v-model="item_ingame" >
                                <option disabled>Utilisable en jeu ?</option>
                                <option selected value="0">Non</option>
                                <option value="1">Oui</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin: 0;">
            <div class="col-12 col-md-4">
                <label for="newitemimage" class="custom-file-upload d-flex">
                    <p class="m-auto">Ajouter une image de couverture</p>
                </label>
                <input type="file" ref="item_image" v-on:change="getItemImage()" accept="image/*" id="newitemimage" class="d-none">
            </div>
            <div class="col-12 col-md-8">
                <textarea class="textarea-bo" style="height: 230px !important; margin-top: 20px;" placeholder="Description de l'objet" v-model="item_description"></textarea>
            </div>

        </div>
        <div class="row" style="margin: 0;">
            <div class="col-12 col-12">
                <div class="w-100 d-flex">
                    <div class="mr-auto">
                        <div class="login-modal-error" v-if="errors.length" style="color: darkred;">
                            <p class="h-100">
                                <span v-for="error in errors">
                                    {{ error }}<br>
                                </span>
                            </p>
                        </div>
                    </div>
                    <div style="width: 200px;">
                        <button type="submit" class="create-room-button" @click.prevent="newItem" style="margin-top: 0;">Créer</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</template>
<script>
export default {
    name: "Item",
    props: ['items_app'],
    data() {
        return {
            new_item: null,
            // New Item
            item_name: "",
            item_type: "",
            item_money: "",
            item_price: 0,
            item_ingame: 0,
            item_image: "",
            item_sexe: "",
            item_description: "",
            errors: []
        }
    },
    methods: {
        getItemImage(){
            let image = this.$refs.item_image.files[0];
            let itemreader = new FileReader();
            var vm = this;

            itemreader.onload = function(e) {
                vm.item_image = e.target.result;
            };
            itemreader.readAsDataURL(image);
        },
        newItem()
        {
            this.errors = [];
            if (!this.item_name)
            {
                this.errors.push('Un nom est requis pour cet objet');
            }
            if (!this.item_description)
            {
                this.errors.push('Une description est requise');
            }
            if (!this.item_image)
            {
                this.errors.push('Une image est requise');
            }
            if (!this.errors.length) {
                const data = {
                    item_name: this.item_name,
                    item_type: this.item_type,
                    item_money: this.item_money,
                    item_price: this.item_price,
                    item_ingame: this.item_ingame,
                    item_image: this.item_image,
                    item_sexe: this.item_sexe,
                    item_description: this.item_description,
                }
                //console.log(data);
                this.items_app.admin.req.post('bo_items/newitem', data).then(response => {
                    this.new_item = response.data;
                    console.log(this.new_item);

                    //Remise à 0 des variables
                    this.item_name= "";
                    this.item_type= "";
                    this.item_money= "";
                    this.item_price= 0;
                    this.item_ingame= 0;
                    this.item_image= "";
                    this.item_sexe="";
                    this.item_description= "";

                    //Rechargement des items
                    this.items_app.loadAll();

                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });

            }  else
            {
                console.log(this.errors);
            }
        }
    }
}
</script>
