<template>
    <div>
        <div class="bandeau-nouvelle-salle mb-3">
            {{ majdonnees }}
        </div>
        <div class="row mt-2" style="margin: 0;">
            <div class="col-12 col-md-4">
                <div class="cadre-admin-image-item">
                    <img :src="item_image_selected">
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
                            <input class="input-bo" type="text" :value="item_name_selected" @change="item_name_selected = $event.target.value" placeholder="Nom de l'objet">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div><label>Type d'objet :</label></div>
                        <div class="input-group">
                            <div class="input-group-prepend input-bo-prepend">
                                <span class="input-group-text"><i class="fas fa-hourglass-half"></i></span>
                            </div>
                            <select class="custom-select input-bo" @change="item_type_selected = $event.target.value">
                                <option disabled>Type d'objet</option>
                                <option :selected="item_type_selected === 'objet'" value="objet">Objet</option>
                                <option :selected="item_type_selected === 'avatar/chapeau'" value="avatar/chapeau">Avatar/Chapeau</option>
                                <option :selected="item_type_selected === 'avatar/hauts'" value="avatar/hauts">Avatar/Hauts</option>
                                <option :selected="item_type_selected === 'avatar/bas'" value="avatar/bas">Avatar/bas</option>
                                <option :selected="item_type_selected === 'avatar/manteaux'" value="avatar/manteaux">Avatar/Manteaux</option>
                                <option :selected="item_type_selected === 'avatar/chaussures'" value="avatar/chaussures">Avatar/Chaussures</option>
                                <option :selected="item_type_selected === 'avatar/accessoires'" value="avatar/accessoires">Avatar/Accessoires</option>
                                <option :selected="item_type_selected === 'avatar/familiers'" value="avatar/familiers">Avatar/Familiers</option>
                                <option :selected="item_type_selected === 'avatar/fonds'" value="avatar/fonds">Avatar/Fonds</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div><label>Monnaie d'échange :</label></div>
                        <div class="input-group">
                            <div class="input-group-prepend input-bo-prepend">
                                <span class="input-group-text"><i class="fas fa-hourglass-half"></i></span>
                            </div>
                            <select class="custom-select input-bo" @change="item_money_selected = $event.target.value">
                                <option disabled>Monnaie d'échange</option>
                                <option :selected="item_money_selected === 'gold'" value="gold">Or</option>
                                <option :selected="item_money_selected === 'gem'" value="gem">Gemme</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3" style="margin: 0;">
                    <div class="col-12 col-md-8">
                        <div><label>Prix en boutique :</label></div>
                        <div class="input-group">
                            <div class="input-group-prepend input-bo-prepend">
                                <span class="input-group-text"><i class="fas fa-hourglass-half"></i></span>
                            </div>
                            <input class="input-bo" type="text" :value="item_price_selected" @change="item_price_selected = $event.target.value" placeholder="Prix en boutique">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div><label>Utilisable en jeu ? :</label></div>
                        <div class="input-group">
                            <div class="input-group-prepend input-bo-prepend">
                                <span class="input-group-text"><i class="fas fa-hourglass-half"></i></span>
                            </div>
                            <select class="custom-select input-bo" @change="item_ingame_selected = $event.target.value">
                                <option disabled>Utilisable en jeu ?</option>
                                <option :selected="item_ingame_selected === 0" value="0">Non</option>
                                <option :selected="item_ingame_selected === 1" value="1">Oui</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin: 0;">
            <div class="col-12 col-md-4">
                <label for="newitemimageupdate" class="custom-file-upload d-flex">
                    <p class="m-auto">Ajouter une image de couverture</p>
                </label>
                <input type="file" ref="item_image_update" v-on:change="getItemImageUpdate()" accept="image/*" id="newitemimageupdate" class="d-none">
            </div>
            <div class="col-12 col-md-8">
                <textarea class="textarea-bo" style="height: 230px !important; margin-top: 20px;" placeholder="Description de l'objet" v-text="item_description_selected" @change="item_description_selected = $event.target.value"></textarea>
            </div>

        </div>
        <div class="row" style="margin: 0;">
            <div class="col-12 col-12">
                <div class="w-100 d-flex">
                    <div class="mr-auto">
                        <div class="login-modal-error" v-if="errors_update.length" style="color: darkred;">
                            <p class="h-100">
                                <span v-for="error in errors_update">
                                    {{ error }}<br>
                                </span>
                            </p>
                        </div>
                    </div>
                    <div style="width: 200px;">
                        <button type="submit" class="create-room-button" @click.prevent="updateItem()" style="margin-top: 0;">Actualiser</button>
                    </div>
                    <div style="width: 50px; padding-left: 10px;">
                        <button type="submit" class="delete-room-button" @click.prevent="deleteItem(item_id, item_index)" style="margin-top: 0;"><i class="fas fa-times"></i></button>
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
            //Valeurs prédéfinies
            item_id: this.items_app.item_id,
            item_index: this.items_app.item_index,
            item_name_selected: "",
            item_type_selected: "",
            item_money_selected: "",
            item_price_selected: 0,
            item_ingame_selected: 0,
            item_image_selected: "",
            item_description_selected: "",

            errors_update: []
        }
    },
    computed: {
        majdonnees: function () {
            this.item_id= this.items_app.item_id;
            this.item_index= this.items_app.item_index;
            this.item_name_selected = this.items_app.items[this.item_index].name;
            this.item_type_selected= this.items_app.items[this.item_index].type;
            this.item_money_selected= this.items_app.items[this.item_index].money;
            this.item_price_selected= this.items_app.items[this.item_index].price;
            this.item_ingame_selected= this.items_app.items[this.item_index].ingame;
            this.item_image_selected= this.items_app.items[this.item_index].img;
            this.item_description_selected= this.items_app.items[this.item_index].description;

            return this.item_name_selected;
        }
    },
    methods:
    {
        getItemImageUpdate(){
            let image = this.$refs.item_image_update.files[0];
            let itemreader = new FileReader();
            var vm = this;

            itemreader.onload = function(e) {
                vm.item_image_selected = e.target.result;
            };
            itemreader.readAsDataURL(image);
        },
        updateItem() {
            this.errors_update = [];
            if (!this.item_name_selected)
            {
                this.errors_update.push('Un nom est requis pour cet objet');
            }
            if (!this.item_description_selected)
            {
                this.errors_update.push('Une description est requise');
            }
            if (!this.item_image_selected)
            {
                this.errors_update.push('Une image est requise');
            }
            if (!this.errors_update.length) {
                const data = {
                    item_id: this.item_id,
                    item_name: this.item_name_selected,
                    item_type: this.item_type_selected,
                    item_money: this.item_money_selected,
                    item_price: this.item_price_selected,
                    item_ingame: this.item_ingame_selected,
                    item_image: this.item_image_selected,
                    item_description: this.item_description_selected,
                }
                console.log(data);
                this.items_app.admin.req.post('bo_items/updateitem', data).then(response => {
                    console.log(response.data);
                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });

            }  else
            {
                console.log(this.errors);
            }
        },
        deleteItem: function (id, index)
        {
            this.items_app.items.splice(index, 1);

            this.items_app.nbr_items = this.items_app.nbr_items - 1;
            this.items_app.admin.req.delete('bo_items/deleteitem/' + id).then(response => {
                console.log(response);
                this.items_app.item_new = true;
                this.items_app.item_id = 0;
                this.items_app.item_index = 0;

            });
        }
    }
}
</script>
