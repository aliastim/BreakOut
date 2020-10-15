<template>
    <div class="breakout-admin-rooms-body">
        <div class="w-100 h-100 row" style="margin: 0 !important;">
            <div class="breakout-admin-rooms-left">
                <div class="nav flex-column nav-pills h-100" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="rooms-add-tab" data-toggle="pill" href="#rooms-add" role="tab" aria-controls="rooms-add" aria-selected="true">
                        <div>Nouvelle salle</div>
                    </a>
                    <a class="nav-link" id="rooms-tab-1" data-toggle="pill" href="#rooms-1" role="tab" aria-controls="rooms-1" aria-selected="false">
                        <div>Salle 1</div>
                    </a>
                    <a class="nav-link" id="rooms-tab-2" data-toggle="pill" href="#rooms-2" role="tab" aria-controls="rooms-2" aria-selected="false">
                        <div>
                            Salle 2
                        </div>
                    </a>
                    <a class="nav-link" id="rooms-tab-3" data-toggle="pill" href="#rooms-3" role="tab" aria-controls="v-pills-objets" aria-selected="false">
                        <div>Salle 3</div>
                    </a>
                </div>
            </div>
            <div class="breakout-admin-rooms-right position-relative">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="rooms-add" role="tabpanel" aria-labelledby="rooms-add-tab">
                        <form method="POST" v-on:submit.prevent="newRoom" enctype="multipart/form-data">
                            <input type="text" v-model="room_name" placeholder="Nom de la salle">
                            <textarea v-model="room_description"></textarea>
                            <select class="custom-select" v-model="room_players">
                                <option disabled>Nombre de joueurs</option>
                                <option selected  value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <select class="custom-select" v-model="room_device">
                                <option disabled>Nombre de joueurs</option>
                                <option selected  value="Desktop">Desktop</option>
                                <option value="Mobile">Mobile</option>
                                <option value="Tablette">Tablette</option>
                                <option value="All">Tous les appareils</option>
                            </select>
                            <input type="number" v-model="room_riddles">
                            <select class="custom-select" v-model="room_duration">
                                <option disabled>Durée estimée</option>
                                <option selected  value="15min">15 minutes</option>
                                <option value="30min">30 minutes</option>
                                <option value="45min">45 minutes</option>
                                <option value="1h">1 heure</option>
                                <option value="1h30">1 heure 30</option>
                                <option value="2h">2 heures</option>
                                <option value="2h+">Plus de 2 heures</option>
                            </select>
                            <select class="custom-select" v-model="room_difficulty">
                                <option disabled>Difficulté de la salle</option>
                                <option selected  value="1">1/5</option>
                                <option value="2">2/5</option>
                                <option value="3">3/5</option>
                                <option value="4">4/5</option>
                                <option value="5">5/5</option>
                            </select>
                            <input type="text" v-model="room_price" placeholder="Prix de la salle">
                            <!--<input type="text" v-model="room_image" placeholder="Image de la salle">-->
                            <label for="newimage">Image de la salle</label>

                            <input type="file" ref="file_image" v-on:change="getImage()" id="newimage">
                            <input type="text" v-model="room_url" placeholder="Url de la salle">
                            <button type="submit">Créer</button>
                        </form>
                        <img :src="room_image" alt="Couverture de salle">
                    </div>
                    <div class="tab-pane fade" id="rooms-1" role="tabpanel" aria-labelledby="rooms-tab-1">
                        <p>image</p>
                        <p>Description</p>
                        <p>Temps, joueurs, etc</p>
                    </div>
                    <div class="tab-pane fade" id="rooms-2" role="tabpanel" aria-labelledby="rooms-tab-2"></div>
                    <div class="tab-pane fade" id="rooms-3" role="tabpanel" aria-labelledby="rooms-tab-3">...</div>
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
        }
    },
    methods: {
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

                //https://www.youtube.com/watch?v=rYkBRdDuFzU
                //https://codepen.io/Atinux/pen/qOvawK/
                //Envoi de l'image
                /*let formData = new FormData();
                formData.append('file', this.room_image);

                console.log(formData)
                this.admin.req.post( 'bo_rooms/newroom',
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(response => {
                    console.log(response);
                }).catch(function(){
                        console.log('FAILURE!!');
                });*/

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
                //console.log(data)

                this.admin.req.post('bo_rooms/newroom', data).then(response => {
                    this.new_room = response.data;
                    console.log(this.new_room);

                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });



                /*this.admin.req.post('bo_rooms/newroom', data, {headers: {'Content-Type': 'multipart/form-data charset=utf-8; boundary=' + Math.random().toString().substr(2)}}).then(response => {
                    this.new_room = response.data;
                    console.log(this.new_room);

                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });*/

            }  else
            {
                console.log(this.errors);
            }
        }
    }
}
</script>
<style>
.breakout-admin-rooms-left>div>.nav-link
{
    height: calc(100% / 4) !important;
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
