<template>
    <footer>
        <img class="img-fluid" src="/img/Banque_graphique/Footer/footer_landscape_min.svg">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="d-flex h-100">
                    <div class="d-flex flex-column text-center pt-2 pb-2 m-auto">
                        <div><img class="img-fluid logo-footer" src="/img/logos/BreakOut_Logotype_Blanc.png"></div>
                        <div class="texte-footer"><h6 class="josephin-bold">©Break Out 2020</h6></div>
                        <div>
                            <div class="d-flex justify-content-center">
                                <div><a href="#" target="_blank"><button class="btn-twitter btn-footer"></button></a></div>
                                <div><a href="#" target="_blank"><button class="btn-facebook btn-footer"></button></a></div>
                                <div><a href="#" target="_blank"><button class="btn-instagram btn-footer"></button></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex h-100">
                    <div class="d-flex flex-column text-center pt-2 pb-2 m-auto">
                        <div>
                            <router-link to="/mentions_legales"><a href="#" class="texte-footer">Mentions légales</a></router-link><br>
                            <router-link to="/donnees_personnelles"><a href="#" class="texte-footer">Utilisation des données personnelles</a></router-link><br>
                            <router-link to="/infos"><a href="#" class="texte-footer">Support</a></router-link><br>
                            <a href="#" class="texte-footer">Plan du site</a><br>
                            <router-link to="/gemclicker" class="texte-footer">Gemclicker</router-link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex flex-column text-center pt-2 pb-2 h-100">
                    <small class="texte-footer m-auto p-4">
                        Redécouvrez les escapes games avec BreakOut, un nouveau concept d'escape
                        game en ligne. Nous vous proposons des scénarios complexes à jouer seul ou
                        à plusieurs. Entrez dans la salle de votre choix et lancez-vous !
                    </small>
                </div>
            </div>
        </div>
    </footer>
</template>
<script>
export default {
    name: "Footer",
}
</script>
<style>

</style>
