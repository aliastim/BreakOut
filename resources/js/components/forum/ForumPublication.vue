<template>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="bandeau-publication-left">
                <div class="mr-auto">
                    <h1 class="josephin-bold" style="color: #F9BA48; font-size: 16px; margin-top: 0;">{{ post.subject }}</h1>
                </div>
                <div>
                    <p class="open-status" v-if="post.closed === 0">OUVERT</p>
                    <p class="close-status" v-if="post.closed === 1">FERMÉ</p>
                </div>
            </div>

            <div class="fenetre-publication">
                <div class="fenetre-publication-header">
                    <div class="mr-auto">
                        <p class="josephin-bold"></p>
                    </div>
                    <div>
                        <p v-text="forum.date(post.created_at)"></p>
                    </div>
                </div>
                <div class="fenetre-publication-body">
                    <p>{{ post.message }}</p>

                    <img v-if="post.img" src="/img/icones/brain.png" height="60px" width="60px">
                </div>
            </div>

            <div class="fenetre-commenter">
                <h4 class="josephin-bold">Laisser un commentaire</h4>
                <div v-if="post.closed === 0">
                    <div v-if="publish === false">
                        <textarea class="textarea-bo" v-model="comment_message" placeholder="Tapez votre texte ici" style="border-radius: 0.25rem;"></textarea>
                        <div class="w-100 d-flex mt-2">
                            <div class="mr-auto">
                                <p class="josephin-regular" style="color: white; font-size: 10px;">
                                    *En postant cette publication, je reconnais avoir pris connaissances des <a href="/mentions_legales"><B class="josephin-bold" style="color : #f9ba48; cursor: pointer;">conditions du forum</B></a> et à les respecter
                                </p>
                            </div>
                            <div><button class="btn-submit-register" style="width: 120px !important;" @click="addComment(post.id)">Publier</button></div>
                        </div>

                    </div>
                    <div v-if="publish === true" style="color: limegreen;">
                        <p class="h-100 text-center josephin-bold">
                            <B>Votre commentaire a bien été publié !</B><br>
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
                <div v-else>
                    <div class="mt-3" style="color: darkred;">
                        <p class="h-100 text-center">
                            Le sujet a été clôturé par un administrateur.<br>Il n'est plus possible de laisser de commentaires pour ce sujet.
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12 col-md-6">
            <div class="bandeau-publication-right">
                <div class="mr-auto">
                    <p class="" style="font-size: 16px; color: #212121;">{{ post.comments }} commentaires</p>
                </div>
                <div>
                    <a href="/forum" class="josephin-bold" style="color: #F9BA48; cursor: pointer;">Retourner au forum</a>
                </div>
            </div>
            <div class="zone-commentaires">
                <!-- commentaires -->
                <div class="fenetre-commentaire" v-for="(comment, index) in comments.slice().reverse()" v-bind:index="index">
                    <div class="fenetre-commentaire-header">
                        <div class="mr-auto">
                            <p class="josephin-bold"></p>
                        </div>
                        <div>
                            <div class="d-flex">
                                <div class="mr-auto">
                                    <p v-text="forum.date(comment.created_at)"></p>
                                </div>
                                <div v-if="forum.admin === true" style="padding-left: 7px">
                                    <button class="delete-post" @click="deleteComment(comment.id)"><i class="fas fa-ban"></i></button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="fenetre-commentaire-body">
                        <p>{{ comment.message }}</p>

                        <img v-if="comment.img" src="/img/icones/brain.png" height="60px" width="60px">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import GlobalFooter from "../layout/Footer";
export default {
    name: "ForumPublication",
    components: {GlobalFooter},
    props: ['forum'],
    data() {
        return {
            post: [],
            comments: [],
            publish: false,

            comment_message: "",
            comment_img: "",

            errors: []
        }
    },
    mounted() {
        document.title="BreakOut - Forum";
        this.loadOnePost(this.forum.post_id);
        this.loadComments(this.forum.post_id);
    },
    methods: {
        loadOnePost(id)
        {
            this.forum.app.req.post('forum/loadonepost/' + id).then(response => {
                this.post = response.data;
                console.log(this.post);
                //If message
                //Alors on va vers la page message et on envoie l'id du message en paramètre
            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
        loadComments(post_id)
        {
            this.forum.app.req.post('forum/loadcomments/' + post_id).then(response => {
                this.comments = response.data;
                console.log(response.data);

            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
        addComment(post_id)
        {
            this.errors = [];
            const data = {
                post_id : post_id,
                message : this.comment_message,
                img: this.comment_img
            };
            this.forum.app.req.post('forum/addcomment', data).then(response => {
                console.log(response.data);
                this.publish = true;
                this.post.comments = this.post.comments + 1;

            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
        deleteComment(id)
        {
            this.errors = [];
            this.forum.app.req.post('forum/deletecomment/' + id).then(response => {
                console.log(response.data);

            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        }
    }
}
</script>
<style>
    .bandeau-publication-left
    {
        display: flex;
        background: #212121;
        height: 30px;
        width: 100%;
        border-radius: 3px;
        box-shadow: 0 5px 0 #212121;
        padding: 10px;
    }

    .bandeau-publication-right
    {
        display: flex;
    }

    .bandeau-publication-right>div>p
    {
        margin: 0 !important;
        padding-top: 6px;
    }

    .fenetre-publication
    {
        margin-top: 20px;
        border-radius: 5px;
        border: 1px solid #394E63;
    }

    .fenetre-publication-header
    {
        display: flex;
        padding: 6px;
        width: 100%;
        height: 30px;
        color: white;
        background: #394E63;
    }

    .fenetre-publication-header>div>p
    {
        margin: 0 !important;
    }

    .fenetre-publication-body
    {
        color: #212121;
        background: whitesmoke;
        width: 100%;
        max-height: 300px;
        padding: 10px;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
        overflow: auto;
    }

    .zone-commentaires
    {
        margin-top: 20px;
        border-radius: 5px;
        width: 100%;
        background: #E2D2A1;
        padding: 1px 20px 20px 20px;
    }

    .fenetre-commentaire
    {
        border-radius: 5px;
        border: 1px solid #394E63;
        box-shadow: 0 3px 6px rgba(0,0,0,0.16);
        margin-top: 20px
    }

    .fenetre-commentaire-header
    {
        display: flex;
        padding: 6px;
        width: 100%;
        height: 30px;
        color: white;
        background: #394E63;
    }

    .fenetre-commentaire-header>div>p
    {
        margin: 0 !important;
    }

    .fenetre-commentaire-body
    {
        color: #212121;
        background: whitesmoke;
        width: 100%;
        max-height: 200px;
        padding: 10px;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
        overflow: auto;
    }

    .fenetre-commenter
    {
        margin-top: 20px;
        border-radius: 5px;
        width: 100%;
        background: #E2D2A1;
        padding: 20px;
        text-align: left !important;
    }

    .fenetre-commenter>h4
    {
        color: black;
        font-size: 16px;
    }

</style>
