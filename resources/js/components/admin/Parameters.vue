<template>
    <div class="body-admin-parameters">
        <div class="row" style="margin: 0 !important;">
            <div class="col-12 col-md-4">
                <div class="cadre-admin-image-carousel">
                    <img :src="carousel_image_1">
                </div>
                <div class="d-flex">
                    <div>
                        <p>Image 1</p>
                    </div>
                    <div class="ml-auto">
                        <button>Modifier</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="cadre-admin-image-carousel">
                    <img :src="carousel_image_2">
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="cadre-admin-image-carousel">
                    <img :src="carousel_image_3">
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "Parameters",
    props: ['admin'],
    data() {
        return {
            carousel_image_1: "",
            carousel_image_2: "",
            carousel_image_3: ""
        }
    }
}
</script>
