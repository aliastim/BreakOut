<template>
    <div>
        {{ adminverify }}
        <div class="breakout-body-before" style="margin-top: 100px;">
            <marquee>{{ sentence }}</marquee>
        </div>
        <div class="breakout-body">
            <hr class="liseret-rouge">
            <div class="container text-center pt-4">
                <div class="w-100 d-flex">
                    <div class="mr-auto"><h1 class="title-BO">Forum BreakOut</h1></div>
                    <div><button class="button-plus" type="button" data-toggle="modal" data-target="#modaladdpost" @click="publish_active()"><i class="fas fa-plus-circle"></i></button></div>
                </div>
                <div class="w-100">
                    <table class="table table-BO">
                        <thead>
                        <tr>
                            <th scope="col" style="border-top-left-radius: 10px;">#</th>
                            <th scope="col"></th>
                            <th scope="col">Sujet</th>
                            <!--<th scope="col">Auteur</th>-->
                            <th scope="col">Réponses</th>
                            <th scope="col">Date de publication</th>
                            <!--<th scope="col">Dernier message</th>-->
                            <th scope="col" style="border-top-right-radius: 10px;">Cloturé ?</th>
                            <th v-if="admin === true" style="background: none;"></th>
                            <th v-if="admin === true" style="background: none;"></th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(post, index) in posts.slice().reverse()" v-bind:index="index">
                                <td><p v-text="post.id"></p></td>
                                <td><router-link class="btn-voir josephin-bold" :to="'/forum/posts/'+post.id">Voir</router-link></td>
                                <td><p v-text="post.subject"></p></td>
                                <!--<td><p v-text="post.user_id"></p></td>-->
                                <td><p v-text="post.comments"></p></td>
                                <td><p v-text="date(post.created_at)"></p></td>
                                <!--<td><p v-text="post.updated_at"></p></td>-->
                                <td>
                                    <p class="open-status" v-if="post.closed === 0">OUVERT</p>
                                    <p class="close-status" v-if="post.closed === 1">FERMÉ</p>

                                </td>
                                <td v-if="admin === true">
                                    <button v-if="post.closed === 0" class="delete-post" @click="lockPost(post.id)"><i class="fas fa-lock"></i></button>
                                    <button v-if="post.closed === 1" class="delete-post" @click="lockPost(post.id)"><i class="fas fa-unlock"></i></button>
                                </td>
                                <td v-if="admin === true">
                                    <button class="delete-post" @click="deletePost(post.id)"><i class="fas fa-ban"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>

            <!-- Modal add post -->
            <div class="modal fade" id="modaladdpost" tabindex="-1" aria-labelledby="modaladdpost" aria-hidden="true">
                <div class="modal-dialog login-modal-dialog modal-dialog-centered" style="max-width: 600px !important;">
                    <div class="login-modal-content">
                        <div class="login-modal-header">
                            <div class="josephin-bold color-white">Publier sur le forum</div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 1 !important;">
                                <div aria-hidden="true" class="modal-cross"></div>
                            </button>
                        </div>
                        <div class="login-modal-body p-4">
                            <div v-if="publish === false">
                                <input class="form-control input-bo mb-3" type="text" v-model="subject" style="width: 100% !important;" placeholder="Saisir un titre ici" maxlength="50">
                                <textarea class="textarea-bo" v-model="message" placeholder="Tapez votre texte ici" style="border-radius: 0.25rem;"></textarea>
                                <div class="w-100 d-flex mt-2">
                                    <div class="mr-auto">
                                        <p class="josephin-regular" style="color: white; font-size: 10px;">
                                            *En postant cette publication, je reconnais avoir pris connaissances des <a href="/mentions_legales"><B class="josephin-bold" style="color : #f9ba48; cursor: pointer;">conditions du forum</B></a> et à les respecter
                                        </p>
                                    </div>
                                    <div><button class="btn-submit-register" style="width: 120px !important;" @click="addPost()">Publier</button></div>
                                </div>

                            </div>
                            <div v-if="publish === true" style="color: limegreen;">
                                <p class="h-100 text-center josephin-bold">
                                    <B>Votre article a bien été publié !</B><br>
                                </p>
                            </div>
                            <div class="login-modal-error mt-3" v-if="errors.length" style="color: darkred;">
                                <p class="h-100 text-center">
                                    <span v-for="error in errors">
                                        <B>{{ error }}</B><br>
                                    </span>
                                </p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <global-footer></global-footer>
        </div>
    </div>
</template>
<script>
import GlobalFooter from "./layout/Footer";
import moment from "moment";

export default {
    name: "Forum",
    components: {GlobalFooter},
    props: ['app'],
    data() {
        return {
            sentence: "",
            admin: false,
            publish: false,
            posts: [],
            post_id: null,

            subject: "",
            message: "",
            img: "",

            errors: []
        }
    },
    mounted() {
        document.title="BreakOut - Forum";
        this.loadScrolling();
        this.loadPost();
    },
    methods: {
        loadScrolling(){
            axios.post('/bo_dashboard/loadscrolling').then(response => {
                this.sentence = response.data.scrolling;
            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
        loadPost()
        {
            axios.post('/forum/loadpost').then(response => {
                this.posts = response.data;
                //If message
                //Alors on va vers la page message et on envoie l'id du message en paramètre
            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
        addPost() {
            this.errors = [];
            const data = {
                subject : this.subject,
                message : this.message,
                img: this.img
            };
            axios.post('/forum/addpost', data).then(response => {
                console.log(response.data);
                this.publish = true;
                //If message
                //Alors on va vers la page message et on envoie l'id du message en paramètre
            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
        deletePost(id)
        {
            this.errors = [];
            axios.post('/forum/deletepost/' + id).then(response => {
                console.log(response.data);

            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
        lockPost(id)
        {
            this.errors = [];
            axios.post('/forum/lockpost/' + id).then(response => {
                console.log(response.data);

            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
        publish_active()
        {
            this.publish = false
        },
        page(){

        },
        date(d)
        {
           return moment(d).format('DD/MM');
        }
    },
    computed :
        {
            adminverify: function ()
            {
                if(this.app.user !== null)
                {
                    if(this.app.user.admin === 1)
                    {
                        this.admin = true;
                    }
                }
            }
        }
}
</script>
<style>
    .btn-voir
    {
        border: 2px groove #F9BA48; /* outset */
        border-radius: 10px;
        padding: 5px 20px 2px 20px;
        text-transform: uppercase;
        color: white;
        background: none;
        /*background: linear-gradient(60deg, #7B5B25, #F9BA48, #C38414,#7B5B25);*/
        transition: 0.3s;
        cursor: pointer;
        margin-top: -3px;
        margin-bottom: 3px;
    }

    .btn-voir:hover
    {
        color: white;
        background: #F9BA48;
    }

    .open-status
    {
        color: #43FA43;
        text-transform: uppercase;
        font-weight: bold;
    }

    .close-status
    {
        color: #FF253D;
        text-transform: uppercase;
        font-weight: bold;
    }

    .delete-post
    {
        color: #F9BA48;
        font-weight: bold;
        border: none;
        background: none;
        padding: 0 !important;
    }

    .delete-post:hover
    {
        color: #FF253D;
    }
</style>
