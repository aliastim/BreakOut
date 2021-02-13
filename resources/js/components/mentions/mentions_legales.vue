<template>
    <div>
        <div class="breakout-body-before" style="margin-top: 100px;">
            <marquee>{{ sentence }}</marquee>
        </div>
        <div class="breakout-body">
            <hr class="liseret-rouge">
            <div class="container">
                <div class="panneau-ligne-1" style="margin-top: -20px;">
                    <hr>
                    <div class="d-flex justify-content-center">
                        <div>
                            <h1 class="title-mentions josephin-bold">Mentions légales</h1>
                        </div>
                    </div>
                </div>

                <p class="text-mentions pt-4">

                </p>
            </div>
            <global-footer></global-footer>
        </div>
    </div>
</template>
<script>
import GlobalFooter from "../layout/Footer";
export default {
    name: "Mentions",
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
