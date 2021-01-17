<template>
    <div>
        <div class="breakout-body-before" style="margin-top: 100px;">
            <marquee>{{ sentence }}</marquee>
        </div>
        <div class="breakout-body">
            <hr class="liseret-rouge">
            <div class="container text-center pt-4">
                <div class="w-100 d-flex">
                    <div class="mr-auto"><h1 class="title-BO">Forum BreakOut</h1></div>
                    <div><button class="button-plus" type="button" data-toggle="modal" data-target="#modaladdpost" v-if="publication === false"><i class="fas fa-plus-circle"></i></button></div>
                </div>
                <div class="w-100">
                    <table class="table table-BO" v-if="publication === false">
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
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(post, index2) in posts" v-bind:index2="index2">
                                <td><p v-text="post.id"></p></td>
                                <td><button  @click="goTo(post.id)">Voir</button></td>
                                <td><p v-text="post.subject"></p></td>
                                <!--<td><p v-text="post.user_id"></p></td>-->
                                <td><p v-text="post.comments"></p></td>
                                <td><p v-text="post.created_at"></p></td>
                                <!--<td><p v-text="post.updated_at"></p></td>-->
                                <td>
                                    <p v-if="post.closed === 0">OUVERT</p>
                                    <p v-if="post.closed === 1">FERMÉ</p>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <forum-publication :forum="this"  v-if="publication === true"></forum-publication>

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
                            <div>
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
import ForumPublication from "./forum/ForumPublication";
export default {
    name: "Forum",
    components: {ForumPublication, GlobalFooter},
    props: ['app'],
    data() {
        return {
            sentence: "",
            publication: false,
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
            this.app.req.post('bo_dashboard/loadscrolling').then(response => {
                this.sentence = response.data.scrolling;
            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
        loadPost()
        {
            this.app.req.post('forum/loadpost').then(response => {
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
            this.app.req.post('forum/addpost', data).then(response => {
                console.log(response.data);
                //If message
                //Alors on va vers la page message et on envoie l'id du message en paramètre
            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
        goTo(id) {
            this.publication = true;
            this.post_id = id;
            /*const data = {
                messageId : n,
            };
            this.app.req.post('forum/loadscrolling', data).then(response => {
                console.log(response.data);
                //If message
                //Alors on va vers la page message et on envoie l'id du message en paramètre
            }).catch(error => {
                this.errors.push(error.response.data.error);
            });*/
        },
        page(){

        },
    }
}
</script>
<style>



</style>
