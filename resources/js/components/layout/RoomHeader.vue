<template>
    <div class="w-100 d-flex" style="position: absolute; z-index: 10000;">
        <!-- le timer se modifie dans le composant parent / La forme est commune à toutes les salles -->
       <div :class="{'timer mt-3 ml-3': true, 'timer_ar': room_selected === 'ar', 'timer_404': room_selected === '404', 'timer_qc': room_selected === 'qc'}">{{ hour }} : {{ minute }} : {{ second }}</div>
        <div class="ml-auto mt-3 mr-3">
            <!-- le bouton se modifie dans le composant parent -->
            <button :class="{'modalingame':true, 'modalingame_ar': room_selected === 'ar', 'modalingame_404': room_selected === '404', 'modalingame_qc': room_selected === 'qc' }" type="button" data-toggle="modal" data-target="#modalingame">Menu</button>
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
                room_selected: this.room.room_selected,
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
                this.endverify();

            }, 1000)
        },
        methods: {
            home() {
                window.location.href = '/home'
            },
            endverify()
            {
                if(this.room.end === true)
                {
                    console.log("fini");
                    clearInterval(this.$interval);
                    this.userstat(this.room.room_slug, this.room.room_status);
                }
            },
            userstat(room_slug, room_status)
            {
                const data = {
                    room_slug: room_slug,
                    room_status: room_status,
                    room_duration_hour: this.room.hour,
                    room_duration_minute: this.room.minute,
                    room_duration_second: this.room.second,
                    user_duration_hour: this.hour,
                    user_duration_minute: this.minute,
                    user_duration_second: this.second,
                }
                console.log(data);
                axios.post('/users/setstats', data).then(response => {
                    console.log(response.data);

                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });
            }
        },
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
