<template>
    <div>
        <div class="gemclicker-body">
            <div class="gemclicker-cadre">
                <div class="gemclicker-gemme" @click="gemclick"></div>
                <!--<p style="color: white; font-size: 50px; position: absolute; bottom: 0;">{{ count }}</p>-->
                <div class="gemclicker-count">{{ count }}</div>
            </div>

        </div>
    </div>
</template>
<script>

export default {
    name: "Gemclicker",
    props: ['app'],
    data() {
        return {
            count:0,
            errors: []
        }
    },
    methods : {
        gemclick() {
            this.count++;
            this.app.req.post('bo_shop/addgem').then(response => {
                console.log(response);
            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        }
    }

}
</script>
