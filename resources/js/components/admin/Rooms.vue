<template>
    <div class="breakout-admin-rooms-body">
        <div class="w-100 h-100 row" style="margin: 0 !important;">
            <div class="breakout-admin-rooms-left">
                <div class="nav flex-column nav-pills h-100" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="rooms-add-tab" data-toggle="pill" href="#rooms-add" role="tab" aria-controls="rooms-add" aria-selected="true">
                        <div>Nouvelle salle</div>
                    </a>
                    <a class="nav-link" id="rooms-tab-1" data-toggle="pill" href="#rooms-1" role="tab" aria-controls="rooms-1" aria-selected="false">
                        <div>Salle 1</div>
                    </a>
                    <a class="nav-link" id="rooms-tab-2" data-toggle="pill" href="#rooms-2" role="tab" aria-controls="rooms-2" aria-selected="false">
                        <div>
                            Salle 2
                        </div>
                    </a>
                    <a class="nav-link" id="rooms-tab-3" data-toggle="pill" href="#rooms-3" role="tab" aria-controls="v-pills-objets" aria-selected="false">
                        <div>Salle 3</div>
                    </a>
                </div>
            </div>
            <div class="breakout-admin-rooms-right position-relative">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="rooms-add" role="tabpanel" aria-labelledby="rooms-add-tab"></div>
                    <div class="tab-pane fade" id="rooms-1" role="tabpanel" aria-labelledby="rooms-tab-1">
                        <p>image</p>
                        <p>Description</p>
                        <p>Temps, joueurs, etc</p>
                    </div>
                    <div class="tab-pane fade" id="rooms-2" role="tabpanel" aria-labelledby="rooms-tab-2"></div>
                    <div class="tab-pane fade" id="rooms-3" role="tabpanel" aria-labelledby="rooms-tab-3">...</div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "Rooms",
    props: ['admin'],
    data() {
        return {}
    }
}
</script>
<style>
.breakout-admin-rooms-left>div>.nav-link
{
    height: calc(100% / 4) !important;
    text-align: center;
    display: flex;
}

.breakout-admin-rooms-left>div>.nav-link:hover
{
    cursor: pointer;
}

.breakout-admin-rooms-left>div>.active
{
    background: #C38414 !important;
}

.breakout-admin-rooms-left>div>.nav-link>div
{
    margin: auto;
}
</style>
