<template>
    <div>
        <div class="breakout-body-before" style="margin-top: 100px;">
            <marquee>{{sentence}}</marquee>
        </div>
        <div class="breakout-body">
            <hr class="liseret-rouge">
            <div class="container">

                <div class="panneau-ligne-1" style="margin-top: -20px;">
                    <hr>
                    <div class="d-flex justify-content-center"><div>
                        <h1 class="title-mentions josephin-bold">Utilisation des données à caractère personnel</h1>
                    </div>
                    </div>
                </div>

                    <p class="text-mentions pt-4">
                        Les informations recueillies lors de l’inscription sur le site BreakOut sont enregistrées dans un fichier informatisé par l’équipe BreakOut pour pouvoir établir des statistiques sur l’affluence des visiteurs / joueurs.

                        <br><br>

                        La base légale du traitement est le consentement.

                        Les données collectées seront communiquées aux seuls destinataires suivants : l’équipe de développement BreakOut.

                        Les données sont conservées pendant une durée de dix ans.<br><br>

                        Vous pouvez accéder aux données vous concernant, les rectifier, demander leur effacement ou exercer votre droit à la limitation du traitement de vos données.<br><br>

                        Vous pouvez retirer à tout moment votre consentement au traitement de vos données, vous pouvez également vous opposer au traitement de vos données, vous pouvez également exercer votre droit à la portabilité de vos données.<br><br>

                        Consultez le site cnil.fr pour plus d’informations sur vos droits.

                        Pour exercer ces droits ou pour toute question sur le traitement de vos données dans ce dispositif, vous pouvez contacter l’équipe de BreakOut à l’adresse mail suivante : <a href="mailto:breakout@gmail.com" style="font-weight: bold; color: #f9ba48;">breakout@gmail.com</a>.<br><br>

                        Si vous estimez, après nous avoir contactés, que vos droits « Informatique et Libertés » ne sont pas respectés, vous pouvez adresser une réclamation à la CNIL.
                    </p>


            </div>

            <global-footer></global-footer>
        </div>
    </div>
</template>
<script>
import GlobalFooter from "../layout/Footer";
export default {
    name: "DonneesPerso",
    components: {GlobalFooter},
    props: ['app'],
    data() {
        return {
            sentence: "",
        }
    },
    mounted() {
        document.title="BreakOut - Page Info";
        this.loadScrolling();
    },
    methods: {
        loadScrolling(){
            this.app.req.post('bo_dashboard/loadscrolling').then(response => {
                this.sentence = response.data.scrolling;
            }).catch(error => {
                this.errors.push(error.response.data.error);
            });
        },
    }
}
</script>
<style>
    .title-mentions {
        font-size: 20px;
        color: #f9ba48;
        margin-top: 6px;
        text-transform: uppercase;
        text-align: center;
    }
    .text-mentions
    {
        text-align: justify;
    }
</style>
