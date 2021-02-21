<template>
    <div class="body-admin-parameters">
        <div class="row" style="margin: 0 !important;">
            <div class="col-12 col-md-4">
                <div class="cadre-admin-image-carousel">
                    <img :src="[(carousel_image_1 !== '') ? carousel_image_1 : carousel[0].img]">
                </div>
                <div class="d-flex sous-cadre-image-carousel">
                    <div>
                        <p>Image 1</p>
                    </div>
                    <div class="row ml-auto" style="margin: 0;">
                        <div>
                            <label for="carousel1" class="admin-carousel-btn-1">
                                <p>Modifier</p>
                            </label>
                            <input type="file" ref="carousel1" v-on:change="getCarouselImageUpdate(1)" accept="image/*" id="carousel1" class="d-none">
                        </div>
                        <div>
                            <button @click="updateCarousel(1)" class="admin-carousel-btn-2">Sauvegarder</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="cadre-admin-image-carousel">
                    <img :src="[(carousel_image_2 !== '') ? carousel_image_2 : carousel[1].img]">
                </div>
                <div class="d-flex sous-cadre-image-carousel">
                    <div>
                        <p>Image 2</p>
                    </div>
                    <div class="row ml-auto" style="margin: 0;">
                        <div>
                            <label for="carousel2" class="admin-carousel-btn-1">
                                <p>Modifier</p>
                            </label>
                            <input type="file" ref="carousel2" v-on:change="getCarouselImageUpdate(2)" accept="image/*" id="carousel2" class="d-none">
                        </div>
                        <div>
                            <button @click="updateCarousel(2)" class="admin-carousel-btn-2">Sauvegarder</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="cadre-admin-image-carousel">
                    <img :src="[(carousel_image_3 !== '') ? carousel_image_3 : carousel[2].img]">
                </div>
                <div class="d-flex sous-cadre-image-carousel">
                    <div>
                        <p>Image 3</p>
                    </div>
                    <div class="row ml-auto" style="margin: 0;">
                        <div>
                            <label for="carousel3" class="admin-carousel-btn-1">
                                <p>Modifier</p>
                            </label>
                            <input type="file" ref="carousel3" v-on:change="getCarouselImageUpdate(3)" accept="image/*" id="carousel3" class="d-none">
                        </div>
                        <div>
                            <button @click="updateCarousel(3)" class="admin-carousel-btn-2">Sauvegarder</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin: 0 !important;">
            <div class="col-12 col-md-4">
                <div class="cadre-admin-salles-vedette">
                    Salle 1
                    <select class="custom-select input-bo" @change="room_1 = $event.target.value" style="width: 100% !important;">
                        <option disabled>Salle sélectionnée</option>
                        <option v-for="room in rooms" :selected="room.id === room_1" value="room.id">{{ room.name }}</option>
                    </select>
                    <button>Modifiler la salle 1</button>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="cadre-admin-salles-vedette">
                    Salle 2
                    <select class="custom-select input-bo" @change="room_2 = $event.target.value" style="width: 100% !important;">
                        <option disabled>Salle sélectionnée</option>
                        <option v-for="room in rooms" :selected="room.id === room_2" value="room.id">{{ room.name }}</option>
                    </select>
                    <button>Modifiler la salle 2</button>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="cadre-admin-salles-vedette">
                    Salle 3
                    <select class="custom-select input-bo" @change="room_3 = $event.target.value" style="width: 100% !important;">
                        <option disabled>Salle sélectionnée</option>
                        <option v-for="room in rooms" :selected="room.id === room_3" value="room.id">{{ room.name }}</option>
                    </select>
                    <button>Modifiler la salle 3</button>
                </div>
            </div>
        </div>
        <div class="row" style="margin: 0 !important;">
            <div class="col-12">
                <div class="w-100 cadre-admin-scrolling">
                    <div class="w-100">
                        <div class="d-flex">
                            <div class="mr-auto">
                                Phrase défilante
                            </div>
                            <div>
                                <button @click="updateScrolling">Modifier</button>
                            </div>
                        </div>
                    </div>
                    <div class="w-100">
                        <textarea @change="scrolling = $event.target.value">{{ scrolling }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin: 0 !important;">
            <div class="col-12 text-center">
                <button class="admin-btn-regenerate-items"><i class="fas fa-sync-alt"></i> Régénérer les objets en vedette</button>
            </div>
        </div>
        <!--<div class="row" style="margin: 0 !important;">
            <div class="col-12 text-center">
                <button class="admin-btn-regenerate-items" @click="avatarGenerate()"><i class="fas fa-sync-alt"></i> Avatar Generate</button>
            </div>
        </div>-->
    </div>
</template>
<script>
export default {
    name: "Parameters",
    props: ['admin'],
    data() {
        return {
            carousel:[],
            carousel_image_1: "",
            carousel_image_2: "",
            carousel_image_3: "",
            room_1 : 0,
            room_2 : 0,
            room_3 : 0,
            rooms:[],
            selected_rooms:[],
            errors: [],
            scrolling: ""
        }
    },
    mounted() {
        this.loadCarousel();
        this.loadSelectedRooms();
        this.loadRooms();
        this.loadScrolling();
    },
    methods:
        {
            getCarouselImageUpdate(n) {
                let ref = "carousel" + n;
                let image = this.$refs[ref].files[0];
                let itemreader = new FileReader();
                var vm = this;
                var carousel_image = "carousel_image_" + n;

                itemreader.onload = function (e) {
                    vm[carousel_image] = e.target.result;
                };
                itemreader.readAsDataURL(image);
            },
            updateCarousel(n) {
                var carousel_image = "carousel_image_" + n;
                //console.log(this[carousel_image]);

                const data = {
                    carousel_id: n,
                    carousel_img: this[carousel_image],
                }
                console.log(data);
                this.admin.req.post('bo_dashboard/updatecarousel', data).then(response => {
                    console.log(response.data);
                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });
            },
            loadCarousel(){
                this.admin.req.post('bo_dashboard/loadcarousel').then(response => {
                    this.carousel = response.data;
                    //console.log(this.carousel);

                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });
            },
            loadRooms(){
                this.admin.req.post('bo_rooms/loadall').then(response => {
                    this.rooms = response.data;
                    //console.log(this.rooms);

                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });
            },
            loadSelectedRooms(){
                this.admin.req.post('bo_dashboard/loadselectedrooms').then(response => {
                    this.selected_rooms = response.data;
                    this.room_1 = this.selected_rooms[0].id;
                    this.room_2 = this.selected_rooms[1].id;
                    this.room_3 = this.selected_rooms[2].id;

                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });
            },
            loadScrolling(){
                this.admin.req.post('bo_dashboard/loadscrolling').then(response => {
                    this.scrolling = response.data.scrolling;
                    console.log(this.scrolling);

                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });
            },
            updateScrolling() {
                const data = {
                    text_scrolling: this.scrolling,
                }
                this.admin.req.post('bo_dashboard/updatescrolling', data).then(response => {
                    console.log(response.data);
                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });
            },
            avatarGenerate()
            {
                this.admin.req.post('bo_avatar/autogenerate').then(response => {
                    console.log(response.data);
                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });
            },
        },

}
</script>
