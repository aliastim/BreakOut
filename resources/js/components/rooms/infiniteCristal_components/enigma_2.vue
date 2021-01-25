<template>
    <div>
        <div class="row">
            <div class="col-md-6" id="bassin">

            </div>
            <div class="col-md-6 align-self-center" style="background-color: #0f6674">
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <div id="cristal"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "enigma_2",
    props: ['room'],
    data() {
        return {}
    },

}
</script>

<style scoped>
#bassin {
    height: 500px;
    background-color: white;
}

#cristal {
    height: 100px;
    width: 100px;
    background-color: #bbb;
    border-radius: 50%;
}

</style>
