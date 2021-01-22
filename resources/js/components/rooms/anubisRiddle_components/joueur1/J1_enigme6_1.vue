<template>
    <div class="terminal-body text-center">
        <div class="body-c w-100">
            <div class="w-100" style="margin-bottom: -30px;">
                <h1 class="title-egypte" style="margin-bottom: 50px; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">ENIGME 6</h1>
            </div>

            <div class="">
                <div class="d-flex justify-content-center">
                <div class="">
                    <div class="d-flex flex-row">
                        <div><button :class="{ 'b6-animation' : anim1, 'button-6' : a_true}"></button></div>
                        <div><button :class="{ 'b6-animation' : anim2, 'button-6' : a_true}" @click="choice('C')"></button></div>
                        <div><button :class="{ 'b6-animation' : anim3, 'button-6' : a_true}"></button></div>
                        <div><button :class="{ 'b6-animation' : anim1, 'button-6' : a_true}"></button></div>
                        <div><button :class="{ 'b6-animation' : anim2, 'button-6' : a_true}"></button></div>
                    </div>
                    <div class="d-flex flex-row">
                        <div><button :class="{ 'b6-animation' : anim3, 'button-6' : a_true}"></button></div>
                        <div><button :class="{ 'b6-animation' : anim1, 'button-6' : a_true}"></button></div>
                        <div><button :class="{ 'b6-animation' : anim2, 'button-6' : a_true}"></button></div>
                        <div><button :class="{ 'b6-animation' : anim3, 'button-6' : a_true}"></button></div>
                        <div><button :class="{ 'b6-animation' : anim1, 'button-6' : a_true}"></button></div>
                    </div>
                    <div class="d-flex flex-row">
                        <div><button :class="{ 'b6-animation' : anim2, 'button-6' : a_true}"></button></div>
                        <div><button :class="{ 'b6-animation' : anim1, 'button-6' : a_true}"></button></div>
                        <div><button :class="{ 'b6-animation' : anim2, 'button-6' : a_true}"></button></div>
                        <div><button :class="{ 'b6-animation' : anim3, 'button-6' : a_true}" @click="choice('B')"></button></div>
                        <div><button :class="{ 'b6-animation' : anim3, 'button-6' : a_true}"></button></div>
                    </div>
                    <div class="d-flex flex-row">
                        <div><button :class="{ 'b6-animation' : anim3, 'button-6' : a_true}"></button></div>
                        <div><button :class="{ 'b6-animation' : anim2, 'button-6' : a_true}" @click="choice('A')"></button></div>
                        <div><button :class="{ 'b6-animation' : anim1, 'button-6' : a_true}"></button></div>
                        <div><button :class="{ 'b6-animation' : anim3, 'button-6' : a_true}"></button></div>
                        <div><button :class="{ 'b6-animation' : anim2, 'button-6' : a_true}"></button></div>
                    </div>
                </div>
                </div>
            </div>
            <div class="row" style="margin: 0;">
                <div class="col-md-4 mx-auto" style="margin-top: 20px;">
                    <p class="sous-texte" style="margin-top: 20px;">
                        Ton partenaire est bloqué à l'énigme 5 :<br>
                        "Ose toucher la mort 3 fois !"
                    </p>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "enigme6",
    props: ['room'],
    data() {
        return {
            interval: null,
            a_true : true,
            anim: 1,
            anim1: true,
            anim2: false,
            anim3: false,
            btn1 : false,
            btn2 : false,
            btn3 : false,
            errors: []
        }
    },
    mounted() {
        document.title="Breakout - Anubis Riddle";
        this.b6_animation();
    },
    methods: {
        b6_animation()
        {
            this.interval = setInterval(()=> {
                switch (this.anim)
                {
                    case 1:
                        this.anim1 = false;
                        this.anim2 = true;
                        this.anim3 = false;
                        this.anim = 2;
                        console.log("2");
                        break;

                    case 2:
                        this.anim1 = false;
                        this.anim2 = false;
                        this.anim3 = true;
                        this.anim = 3;
                        console.log("3");
                        break;

                    case 3:
                        this.anim1 = true;
                        this.anim2 = false;
                        this.anim3 = false;
                        this.anim = 1;
                        console.log("1");
                        break;
                }

            },1000);

        },
        choice(n)
        {
            if(n === 'A')
            {
                this.btn1 = true;
                this.verify();
            }
            if(n === 'B')
            {
                this.btn2 = true;
                this.verify();
            }
            if(n === 'C')
            {
                this.btn3 = true;
                this.verify();
            }
        },
        verify()
        {
            if(this.btn1 === true && this.btn2 === true && this.btn3 === true)
            {
                this.room.enigme = 7;
                this.room.phase = 0;
            }
        },
    },
    beforeDestroy () {
        clearInterval(this.interval)
    },
    computed: {

    }
}
</script>
<style scoped>
    .button-6
    {
        margin: 30px 20px;
        height: 70px;
        width: 70px;
        background-image: url(/img/salles/anubis_riddle/boutton_normal.png);
        background-size: 150%;
        background-position: center;
        border-radius: 10px;
        border: none;
    }

    .button-6:hover {
        background-image: url(/img/salles/anubis_riddle/boutton_hover.png);
    }

    .button-6:active
    {
        background-image: url(/img/salles/anubis_riddle/boutton_click.png);
    }

    .b6-animation
    {
        animation: lightbox-loading 1s ease infinite;
    }

    @keyframes lightbox-loading {
        0%{
            opacity: 1;
        }
        50%{
            opacity: 0.5;
        }
        100% {
            opacity: 1;
        }

    }
</style>
