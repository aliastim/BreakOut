<template>
    <div>
        test room header <br>
        timer : {{ timer }}
    </div>
</template>

<script>
export default {
    name: "RoomHeader",
    props: ['room'],
        data() {
            return {
                timer: this.room.timer,
            }
        },
        methods: {

        }
}
</script>
