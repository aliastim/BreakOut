<template>
    <div>
        <div class="breakout-body-before" style="margin-top: 100px;">
            <marquee>{{ sentence }}</marquee>
        </div>
        <div class="breakout-body">
            <hr class="liseret-rouge">
            <div class="container text-center pt-4">
                <h1>Liste des salles </h1>
            </div>
            <global-footer></global-footer>
        </div>
    </div>
</template>
<script>
import GlobalFooter from "./layout/Footer";
export default {
    name: "Rooms",
    components: {GlobalFooter},
    props: ['app'],
    data() {
        return {
            sentence: "",
        }
    },
    mounted() {
        document.title="BreakOut - Page Info";
        this.loadScrolling();
    },
    methods: {
        loadScrolling(){
            this.app.req.post('bo_dashboard/loadscrolling').then(response => {
                this.sentence = response.data.scrolling;
            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
    }
}
</script>
<style>

</style>
