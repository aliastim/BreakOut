<template>
    <div class="base-timer">
        {{displayHours}}
        {{ displayMinutes}}
        {{ displaySeconds}}
    </div>
</template>

<script>
export default {
    data: () => ({
        displayHours: 0,
        displayMinutes: 0,
        displaySeconds: 0,
    }),
    computed: {
        _seconds: () => 1000,
        _minutes(){
            return this._seconds * 60
        },
        _hours(){
            return this._minutes * 60
        },
    },
    mounted() {
        this.showRemaining();
    },
    methods: {
        formatNum: num => (num < 10 ? "0" + num : num),

        showRemaining(){
            const timer = setInterval(()=>{
                const now = new Date();
                const end = new Date(2021, 4, 22, 10,10,10,10);
                const distance = end.getTime() - now.getTime();

                if (distance < 0){
                    clearInterval(timer);
                    return
                }

                const hours = math.floor(distance / this._hours);
                const minutes = math.floor((distance % this._hours) / this._minutes);
                const seconds = math.floor((distance % this._minutes) / this._seconds);

                this.displayMinutes = this.formatNum(minutes);
                this.displaySeconds = this.formatNum(seconds);
                this.displayHours = this.formatNum(hours);
            })
        }
    },
}
</script>
