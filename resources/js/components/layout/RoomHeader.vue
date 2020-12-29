<template>
    <div>
        test room header <br>
        <Timer
        :hours="1"
        :minutes="0"
        :seconds="0"
        />

        <Countdown
            :count-down="countDown"
        />

    </div>
</template>

<script>
import Timer from './Timer'
import Countdown from "./Countdown";
export default {
    name: "RoomHeader",
    components: {Timer, Countdown},
    data(){
        return{
            countDown: this.countDown,
        }
    }
}
</script>
