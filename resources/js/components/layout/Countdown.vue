<template>
    <div>
        {{ countDown }}
    </div>
</template>

<script>
export default {
    props: ['countDown'],
    data: () => ({
        countDown: 0,
    }),
    methods: {
        countDownTimer(){
            if (this.countDown > 0) {
                setTimeout(() => {
                    this.countDown -= 1
                    this.countDownTimer()
                }, 1000)
            }
        }
    },
    created() {
        this.countDownTimer()
    }
}
</script>
