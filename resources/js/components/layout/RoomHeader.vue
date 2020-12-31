<template>
    <div class="w-100 d-flex" style="position: absolute; z-index: 10000;">
        <!-- le timer se modifie dans le composant parent / La forme est commune à toutes les salles -->
       <div class="timer mt-3 ml-3">{{ hour }} : {{ minute }} : {{ second }}</div>
        <div class="ml-auto mt-3 mr-3">
            <!-- le bouton se modifie dans le composant parent -->
            <button class="modalingame" type="button" data-toggle="modal" data-target="#modalingame">Menu</button>
        </div>

        <div class="modal fade" id="modalingame" tabindex="-1" aria-labelledby="modalingame" aria-hidden="true">
            <div class="modal-dialog login-modal-dialog modal-dialog-centered" style="max-width: 600px !important;">
                <div class="login-modal-content">
                    <div class="login-modal-header">
                        <div class="josephin-bold color-white">Menu</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 1 !important;">
                            <div aria-hidden="true" class="modal-cross"></div>
                        </button>
                    </div>
                    <div class="login-modal-body text-center p-4">
                        <a @click="home()" style="cursor: pointer;">Retourner sur la page d'accueil</a>
                    </div>

                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "RoomHeader",
    props: ['room'],
        data() {
            return {
                index: 0,
                hour: this.room.hour,
                minute: this.room.minute,
                second: this.room.second,
            }
        },
        mounted() {
            this.$interval = setInterval(()=> {
                if (parseInt(this.second) === 0 ) {
                    if ((parseInt(this.hour) === 0) && (parseInt(this.minute) === 0) && (parseInt(this.second) === 0))
                    {
                        this.room.lost();
                    }
                    else if (parseInt(this.minute) > 0) {
                        if (parseInt(this.minute) <= 10) {
                            this.minute = (parseInt(this.minute) - 1).toString();
                            this.minute = "0" + this.minute;
                        } else {
                            this.minute = (parseInt(this.minute) - 1).toString();
                        }
                        this.second = "59"

                    } else if (parseInt(this.minute) === 0) {
                        if (parseInt(this.hour) > 0) {
                            if (parseInt(this.hour) <= 10) {
                                this.hour = (parseInt(this.hour) - 1).toString();
                                this.hour = "0" + this.hour;
                            } else {
                                this.hour = (parseInt(this.hour) - 1).toString();
                            }
                            this.minute = "59"
                        }
                        this.second = "59"
                    }

                } else if (parseInt(this.second) > 0) {
                    if (parseInt(this.second) <= 10) {
                        this.second = (parseInt(this.second) - 1).toString();
                        this.second = "0" + this.second;
                    } else {
                        this.second = (parseInt(this.second) - 1).toString();
                    }

                }

            }, 1000)
        },
        methods: {
            home() {
                window.location.href = '/home'
            }
        }
}
</script>
<style>
    .timer
    {
        width: 170px;
        border: 1px solid white;
        border-radius: 20px;
        padding: 2px 20px;
        text-align: center;
        font-size: 20px;
    }
</style>
