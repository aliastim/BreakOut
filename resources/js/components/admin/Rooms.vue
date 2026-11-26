<template>
    <div class="breakout-admin-rooms-body">
        <div class="w-100 h-100 row" style="margin: 0 !important;">
            <div class="breakout-admin-rooms-left">
                <div class="nav flex-column nav-pills h-100" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" v-bind:style="{ height: 'calc(100% /' + (nbr_rooms + 1) +') !important'}" id="rooms-add-tab" data-toggle="pill" href="#rooms-add" role="tab" aria-controls="rooms-add" aria-selected="true">
                        <div>Nouvelle salle</div>
                    </a>
                    <a class="nav-link" v-for="(room, index) in rooms" v-bind:index="index" v-bind:style="{ height: 'calc(100% /' + (nbr_rooms + 1) +') !important'}" :id="'rooms-tab-'+ index" data-toggle="pill" :href="'#rooms-' + index" role="tab" aria-controls="rooms-1" aria-selected="false">
                        <div v-text="room.name"></div>
                    </a>
                </div>
            </div>
            <div class="breakout-admin-rooms-right position-relative">
                <div class="tab-content h-100" id="v-pills-tabContent">
                    <div class="tab-pane h-100 fade show active" id="rooms-add" role="tabpanel" aria-labelledby="rooms-add-tab">
                        <div class="breakout-admin-rooms-content">
                            <div class="bandeau-nouvelle-salle mb-3">
                                Création d'une nouvelle salle
                            </div>
                            <form method="POST" v-on:submit.prevent="newRoom" enctype="multipart/form-data">
                                <div class="row" style="margin: 0;">
                                    <div class="col-12 col-md-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend input-bo-prepend">
                                                <span class="input-group-text"><i class="fab fa-quinscape"></i></span>
                                            </div>
                                            <input class="input-bo" type="text" v-model="room_name" placeholder="Nom de la salle">
                                        </div>
                                        <div>
                                            <label for="newimage" class="custom-file-upload d-flex">
                                                <p class="m-auto">Ajouter une image de couverture</p>
                                            </label>
                                            <input type="file" ref="file_image" v-on:change="getImage()" accept="image/*" id="newimage" class="d-none">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <div class="cadre-admin-image-salle">
                                            <img :src="room_image">
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin: 0;">
                                    <div class="col-12">
                                        <div><label>Description de la salle :</label></div>
                                        <div>
                                            <textarea class="textarea-bo" v-model="room_description"></textarea>
                                        </div>

                                    </div>
                                </div>

                                <div class="row" style="margin: 0;">
                                    <div class="col-12 col-md-4">
                                        <div><label>Nombre de joueurs :</label></div>
                                        <div class="input-group">
                                            <div class="input-group-prepend input-bo-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <select class="custom-select input-bo" v-model="room_players">
                                                <option disabled>Nombre de joueurs</option>
                                                <option selected  value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div><label>Support :</label></div>
                                        <div class="input-group">
                                            <div class="input-group-prepend input-bo-prepend">
                                                <span class="input-group-text"><i class="fas fa-desktop"></i></span>
                                            </div>
                                            <select class="custom-select input-bo" v-model="room_device">
                                                <option disabled>Support</option>
                                                <option selected  value="Desktop">Desktop</option>
                                                <option value="Mobile">Mobile</option>
                                                <option value="Tablette">Tablette</option>
                                                <option value="All">Tous les appareils</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div><label>Nombre d'énigmes :</label></div>
                                        <div class="input-group">
                                            <div class="input-group-prepend input-bo-prepend">
                                                <span class="input-group-text"><i class="fas fa-question"></i></span>
                                            </div>
                                            <input class="input-bo" type="number" v-model="room_riddles">
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin: 0;">
                                    <div class="col-12 col-md-4">
                                        <div><label>Durée de la partie :</label></div>
                                        <div class="input-group">
                                            <div class="input-group-prepend input-bo-prepend">
                                                <span class="input-group-text"><i class="fas fa-hourglass-half"></i></span>
                                            </div>
                                            <select class="custom-select input-bo" v-model="room_duration">
                                                <option disabled>Durée estimée</option>
                                                <option selected  value="15min">15 minutes</option>
                                                <option value="30min">30 minutes</option>
                                                <option value="45min">45 minutes</option>
                                                <option value="1h">1 heure</option>
                                                <option value="1h30">1 heure 30</option>
                                                <option value="2h">2 heures</option>
                                                <option value="2h+">Plus de 2 heures</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div><label>Prix en boutique :</label></div>
                                        <div class="input-group">
                                            <div class="input-group-prepend input-bo-prepend">
                                                <span class="input-group-text"><i class="fas fa-coins"></i></span>
                                            </div>
                                            <input class="input-bo" type="text" v-model="room_price" placeholder="Prix de la salle">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div><label>Niveau de difficulté :</label></div>
                                        <div class="input-group">
                                            <div class="input-group-prepend input-bo-prepend">
                                                <span class="input-group-text"><i class="fas fa-skull-crossbones"></i></span>
                                            </div>
                                            <select class="custom-select input-bo" v-model="room_difficulty">
                                                <option disabled>Difficulté de la salle</option>
                                                <option selected  value="1">1/5</option>
                                                <option value="2">2/5</option>
                                                <option value="3">3/5</option>
                                                <option value="4">4/5</option>
                                                <option value="5">5/5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin: 0;">
                                    <div class="col-12 col-md-8">
                                        <div><label>Lien vers la salle:</label></div>
                                        <div class="input-group">
                                            <div class="input-group-prepend input-bo-prepend">
                                                <span class="input-group-text"><i class="fas fa-link"></i></span>
                                            </div>
                                            <input class="input-bo" type="text" v-model="room_url" placeholder="Url de la salle">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <button class="create-room-button" type="submit">Créer</button>
                                    </div>
                                </div>
                            </form>

                            <div class="row" style="margin: 0;">
                                <div class="col-12">
                                    <div class="login-modal-error" v-if="errors.length" style="color: darkred;">
                                        <p class="h-100">
                                        <span v-for="error in errors">
                                            {{ error }}<br>
                                        </span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane fade h-100"  v-for="(room, index) in rooms" :id="'rooms-'+index" role="tabpanel" :aria-labelledby="'rooms-tab-'+index">
                        <div class="breakout-admin-rooms-content">
                            <div class="bandeau-nouvelle-salle mb-3">
                                 <p v-text="room.name"></p>
                            </div>
                            <!--<form method="POST" v-on:submit.prevent="updateRoom" enctype="multipart/form-data">-->
                                <div class="row" style="margin: 0;">
                                    <div class="col-12 col-md-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend input-bo-prepend">
                                                <span class="input-group-text"><i class="fab fa-quinscape"></i></span>
                                            </div>
                                            <input id="test" class="input-bo" type="text" :value="room.name" placeholder="Nom de la salle" @change="room_name_update = $event.target.value">
                                        </div>
                                        <div>
                                            <label :for="'updateimage'+index" class="custom-file-upload d-flex">
                                                <p class="m-auto">{{ room_image_update_name }}</p>
                                            </label>
                                            <input type="file" :ref="'file_image_update'+room.id" @change="getImageUpdate(room.id)" accept="image/*" :id="'updateimage'+index" class="d-none">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <div class="cadre-admin-image-salle">
                                            <img :src="[(room_image_update !== '') ? room_image_update : room.img_link]">
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin: 0;">
                                    <div class="col-12">
                                        <div><label>Description de la salle :</label></div>
                                        <div>
                                            <textarea class="textarea-bo" :value="room.description" @change="room_description_update = $event.target.value"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin: 0;">
                                    <div class="col-12 col-md-4">
                                        <div><label>Nombre de joueurs :</label></div>
                                        <div class="input-group">
                                            <div class="input-group-prepend input-bo-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <select class="custom-select input-bo" @change="room_players_update = $event.target.value">
                                                <option disabled>Nombre de joueurs</option>
                                                <option :selected="room.players === 1" value="1">1</option>
                                                <option :selected="room.players === 2" value="2">2</option>
                                                <option :selected="room.players === 3" value="3">3</option>
                                                <option :selected="room.players === 4" value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div><label>Support :</label></div>
                                        <div class="input-group">
                                            <div class="input-group-prepend input-bo-prepend">
                                                <span class="input-group-text"><i class="fas fa-desktop"></i></span>
                                            </div>
                                            <select class="custom-select input-bo" @change="room_device_update = $event.target.value">
                                                <option disabled>Support</option>
                                                <option :selected="room.device === 'Desktop'" value="Desktop">Desktop</option>
                                                <option :selected="room.device === 'Mobile'" value="Mobile">Mobile</option>
                                                <option :selected="room.device === 'Tablette'" value="Tablette">Tablette</option>
                                                <option :selected="room.device === 'All'" value="All">Tous les appareils</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div><label>Nombre d'énigmes :</label></div>
                                        <div class="input-group">
                                            <div class="input-group-prepend input-bo-prepend">
                                                <span class="input-group-text"><i class="fas fa-question"></i></span>
                                            </div>
                                            <input class="input-bo" type="number" :value="room.riddles" @change="room_riddles_update = $event.target.value">
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin: 0;">
                                    <div class="col-12 col-md-4">
                                        <div><label>Durée de la partie :</label></div>
                                        <div class="input-group">
                                            <div class="input-group-prepend input-bo-prepend">
                                                <span class="input-group-text"><i class="fas fa-hourglass-half"></i></span>
                                            </div>
                                            <select class="custom-select input-bo" @change="room_duration_update = $event.target.value">
                                                <option disabled>Durée estimée</option>
                                                <option :selected="room.duration === '15min'" value="15min">15 minutes</option>
                                                <option :selected="room.duration === '30min'" value="30min">30 minutes</option>
                                                <option :selected="room.duration === '45min'" value="45min">45 minutes</option>
                                                <option :selected="room.duration === '1h'" value="1h">1 heure</option>
                                                <option :selected="room.duration === '1h30'" value="1h30">1 heure 30</option>
                                                <option :selected="room.duration === '2h'" value="2h">2 heures</option>
                                                <option :selected="room.duration === '2h+'" value="2h+">Plus de 2 heures</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div><label>Prix en boutique :</label></div>
                                        <div class="input-group">
                                            <div class="input-group-prepend input-bo-prepend">
                                                <span class="input-group-text"><i class="fas fa-coins"></i></span>
                                            </div>
                                            <input class="input-bo" type="text" :value="room.price" @change="room_price_update = $event.target.value" placeholder="Prix de la salle">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div><label>Niveau de difficulté :</label></div>
                                        <div class="input-group">
                                            <div class="input-group-prepend input-bo-prepend">
                                                <span class="input-group-text"><i class="fas fa-skull-crossbones"></i></span>
                                            </div>
                                            <select class="custom-select input-bo" @change="room_difficulty_update = $event.target.value">
                                                <option disabled>Difficulté de la salle</option>
                                                <option :selected="room.difficulty === 1" value="1">1/5</option>
                                                <option :selected="room.difficulty === 2" value="2">2/5</option>
                                                <option :selected="room.difficulty === 3" value="3">3/5</option>
                                                <option :selected="room.difficulty === 4" value="4">4/5</option>
                                                <option :selected="room.difficulty === 5" value="5">5/5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin: 0;">
                                    <div class="col-12 col-md-8">
                                        <div><label>Lien vers la salle:</label></div>
                                        <div class="input-group">
                                            <div class="input-group-prepend input-bo-prepend">
                                                <span class="input-group-text"><i class="fas fa-link"></i></span>
                                            </div>
                                            <input class="input-bo" type="text" :value="room_url" @change="room_url_update = $event.target.value" placeholder="Url de la salle">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="row" style="margin: 0;">
                                            <div class="col-9" style="padding: 0 !important;">
                                                <button class="create-room-button" @click.prevent="updateRoom(room.id, index)" type="submit">Actualiser</button>
                                            </div>
                                            <div class="col-3" style="padding-left: 10px; padding-right: 0 !important;">
                                                <button class="delete-room-button" @click.prevent="deleteRoom(room.id, index)"><i class="fas fa-times"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!--</form>-->

                            <div class="row" style="margin: 0;">
                                <div class="col-12">
                                    <div class="login-modal-error" v-if="errors_update.length" style="color: darkred;">
                                        <p class="h-100">
                                        <span v-for="error in errors_update">
                                            {{ error }}<br>
                                        </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

</template>
<script>
export default {
    name: "Rooms",
    props: ['admin'],
    data() {
        return {
            // Load Rooms
            rooms: [],
            nbr_rooms: 0,
            // Create New Room
            room_name : "",
            room_description : "",
            room_players: 1,
            room_device: "",
            room_riddles: 1,
            room_duration: "",
            room_difficulty: 1,
            room_price: 0,
            room_image: "",
            room_url: "",
            errors: [],
            new_room: null,
            // Update Room
            room_name_update : "",
            room_description_update : "",
            room_players_update: null,
            room_device_update: "",
            room_riddles_update: null,
            room_duration_update: "",
            room_difficulty_update: null,
            room_price_update: null,
            room_image_update: "",
            room_url_update: "",
            errors_update: [],
            room_image_update_name: "Changer l'image de couverture"
        }
    },
    mounted() {
        this.loadAll();
    },
    methods: {
        loadAll(){
            this.admin.req.post('bo_rooms/loadall').then(response => {
                this.rooms = response.data;
                this.nbr_rooms = this.rooms.length;
                console.log(this.rooms);

            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
        getImage(){
            let image = this.$refs.file_image.files[0];
            //console.log(this.$refs.file_image.files[0]);
            let reader = new FileReader();
            var vm = this;

            reader.onload = function(e) {
                //console.log(e);
                vm.room_image = e.target.result;
                //console.log(image);
            };
            reader.readAsDataURL(image);
        },
        newRoom() {
            this.errors = [];
            if (!this.room_name)
            {
                this.errors.push('Un nom de salle est requis')
            }
            if (!this.room_description)
            {
                this.errors.push('Une description est requise')
            }
            if (!this.errors.length)
            {
                const data = {
                    room_name: this.room_name,
                    room_description: this.room_description,
                    room_players: this.room_players,
                    room_device: this.room_device,
                    room_riddles: this.room_riddles,
                    room_duration: this.room_duration,
                    room_difficulty: this.room_difficulty,
                    room_price: this.room_price,
                    room_image: this.room_image,
                    room_url: this.room_url
                }
                console.log(data)

                this.admin.req.post('bo_rooms/newroom', data).then(response => {
                    this.new_room = response.data;
                    console.log(this.new_room);
                    this.loadAll();

                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });

            }  else
            {
                console.log(this.errors);
            }
        },
        getImageUpdate(id){
            let newfile = 'file_image_update'+id;
            let image = this.$refs[newfile][0].files[0];
            let reader = new FileReader();
            var vm = this;

            reader.onload = function(e) {
                vm.room_image_update = e.target.result;
            };
            reader.readAsDataURL(image);
            this.room_image_update_name = "Image chargée"

        },
        updateRoom: function (id, index) {
            this.errors_update = [];
            if (!this.errors_update.length) {

                const data = {
                    room_id : id,
                    room_name: this.room_name_update,
                    room_description: this.room_description_update,
                    room_players: this.room_players_update,
                    room_device: this.room_device_update,
                    room_riddles: this.room_riddles_update,
                    room_duration: this.room_duration_update,
                    room_difficulty: this.room_difficulty_update,
                    room_price: this.room_price_update,
                    room_image: this.room_image_update,
                    room_url: this.room_url_update
                }
                //console.log(data);

                this.admin.req.post('bo_rooms/updateroom', data).then(response => {
                    console.log(response.data);
                    //Une fois créé on vide les variables
                    this.room_name_update = "";
                    this.room_description_update = "";
                    this.room_players_update= null;
                    this.room_device_update= "";
                    this.room_riddles_update= null;
                    this.room_duration_update= "";
                    this.room_difficulty_update= null;
                    this.room_price_update= null;
                    this.room_image_update= "";
                    this.room_url_update= "";
                    this.loadAll();

                }).catch(error => {
                    this.errors_update.push(error.response.data.error);
                });

            } else
            {
                console.log(this.errors_update);
            }
        },
        deleteRoom: function (id, index) {
            this.rooms.splice(index, 1);
            this.nbr_rooms = this.nbr_rooms - 1;
            this.admin.req.delete('bo_rooms/deleteroom/' + id).then(response => {
                console.log(response.data);
            });
        }
    }
}
</script>
<style>
.breakout-admin-rooms-left>div>.nav-link
{
    /*height: calc(100% / 4) !important;*/
    text-align: center;
    display: flex;
}

.breakout-admin-rooms-left>div>.nav-link:hover
{
    cursor: pointer;
}

.breakout-admin-rooms-left>div>.active
{
    background: #C38414 !important;
}

.breakout-admin-rooms-left>div>.nav-link>div
{
    margin: auto;
}
</style>
