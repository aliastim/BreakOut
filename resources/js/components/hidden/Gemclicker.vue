<template>
    <div>
        <div class="gemclicker-body">
            <div class="gemclicker-gemme" @click="gemclick"></div>
            <p style="color: white; font-size: 50px; position: absolute; bottom: 0;">{{ count }}</p>
        </div>
    </div>
</template>
<script>

export default {
    name: "Gemclicker",
    data() {
        return {
            count:0,
        }
    },
    methods : {
        gemclick() {
            this.count++;
        }
    }

}
</script>
<style>

</style>
