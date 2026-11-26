<template>
    <div>
        <navbar v-if="navbool" :app="this"></navbar>
        <main>
            <router-view :app="this"></router-view>
        </main>
    </div>
</template>
<script>
import Navbar from "./layout/Navbar";
export default {
    name: "App",
    components: {Navbar},
    data() {
        return {
            navbool: true,
            carousel: false,
            /*Authentification*/
            user: null,
            loading: false,
            initiated: false,
            req: axios.create({
                baseUrl: BASE_URL
            })
        }
    },
    mounted() {
        this.init();

    },
    methods: {
        carouselactive(carouselon) {
            this.carousel = carouselon;
            console.log("value" + value)
        },
        init() {
            this.loading = true;

            axios.post("/auth/init").then(response => {
                /* this.req.get -> bug */
                this.user = response.data.user;
                console.log(response.data);
                if(response.data.user == null)
                {
                    console.log("user disconnect");
                } else
                {
                    console.log("user connect");
                }
                this.loading=false;
                this.initiated=true;
            });
        }
    }
}
</script>
<style>

</style>
