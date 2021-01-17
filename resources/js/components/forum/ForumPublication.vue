<template>
    <div>
        <p>{{ post.subject }}</p>
        <p>{{ post.message }}</p>
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

            errors: []
        }
    },
    mounted() {
        document.title="BreakOut - Forum";
        this.loadOnePost(this.forum.post_id);
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
        loadComments(id)
        {
            this.forum.app.req.post('forum/loadcomments' + id).then(response => {
                this.comments = response.data;
                //If message
                //Alors on va vers la page message et on envoie l'id du message en paramètre
            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
    }
}
</script>
<style>



</style>
