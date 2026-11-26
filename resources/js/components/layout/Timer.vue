<template>
    <div class="base-timer">
        <h1>{{ displayHours }}</h1>
    </div>
</template>

<script>
export default {

    props: ['hours', 'minutes', 'seconds'],
    data: () => ({
        displayHours: 0,
        displayMinutes: 0,
        displaySeconds: 0,
    }),
    computed: {
        _seconds: () => 1000,
        _minutes() {
            return this._seconds * 60;
        },
        _hours() {
            return this._minutes * 60;
        },
        /*end() {
        return new Date(
        this.hours,
        this.minutes,
        this.seconds,
        );
        }*/
    },
    mounted() {
        this.showRemaining();
    },
    methods: {
        formatNum: num => (num < 10 ? "0" + num : num),

        showRemaining() {
            const timer = setInterval(() => {
                const now = 60
                const end = 0
                const distance = end - now;

                if (distance < 0) {
                    clearInterval(timer);
                    return
                }

                const hours = Math.floor(distance / this._hours);
                const minutes = Math.floor((distance % this._hours) / this._minutes);
                const seconds = Math.floor((distance % this._minutes) / this._seconds);

                this.displayHours = this.formatNum(hours);
                this.displayMinutes = this.formatNum(minutes);
                this.displaySeconds = this.formatNum(seconds);
            })
        }
    },
}

</script>
