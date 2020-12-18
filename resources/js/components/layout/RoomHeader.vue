<template>
    <div>
        test room header <br>
        timer : {{ timer }}

    </div>
</template>

<script>
import Timer from './Timer'
export default {
    name: "RoomHeader",
    props: ['room', 'Timer'],
    data() {
        return {
            timer: this.room.timer,
        }
    },
    methods: {}
}
</script>
