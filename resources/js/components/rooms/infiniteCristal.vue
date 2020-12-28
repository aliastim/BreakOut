<template>
    <div>
        <room-header :room="this"></room-header>
        <div>
            <div class="container text-center mt-3">
                <h1 style="font-size: 200px;">Infinite Cristal</h1>
            </div>
        </div>
    </div>
</template>
<script>

import RoomHeader from "../layout/RoomHeader";
export default {
    name: "infiniteCristal",
    props: ['app'],
    components: {RoomHeader},
    data(){
        return {
            timer: 60,
        }
    },
    mounted() {
        this.app.navbool = false;
    },
    methods : {

    },
}

</script>
<style>

</style>
