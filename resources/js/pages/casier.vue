<template lang="fr">
    <div class="block">
        <div class="citoyen-container">
            <div class="left">
                <div class="infos-citoyen">
                    <div class="haut">
                        <div class="citoyen-photo">
                            <img :src="`/storage/${citoyen.photo_path}`" style="height: 150px;">
                        </div>
                        <div class="info">
                            <p>{{citoyen.prenom}} {{citoyen.nom}}</p>
                            <p>{{citoyen.civilite}} - {{citoyen.dateDeNaissance}}</p>
                            <p>{{citoyen.adresse}}</p>
                        </div>
                    </div>
                    <div class="bas">
                        <p>test</p>
                    </div>
                </div>
                <div class="modifCheck"></div>
            </div>
            <div class="right">
                <div class="vehicules-container container">
                    <div class="card" v-for="vehicule in vehicules_citoyen" >
                        <div class="infos-container">
                            <p>{{vehicule.id}}</p>
                            <p>{{vehicule.immatriculation}}</p>
                            <p>{{vehicule.modele}} - {{vehicule.type}}</p>
                        </div>
                    </div>
                </div>
                <div class="saisie-container container">
                    <div class="weapons-container"></div>
                    <div class="objects-container"></div>
                </div>
                <div class="casier-container container"></div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            id: null,
            citoyen: null,
            vehicules_citoyen: null,
        }
    },
    async created() {
        this.id = this.$route.params.id;

        if (this.id != null) {
            await this.$axios
            .get('/api/citoyens/' + this.id)
            .then(response => {
            // JSON responses are automatically parsed.

                this.citoyen = response.data;
            })

            await this.$axios
            .get('/api/vehicules?proprietaire=' + this.id)
            .then(response => {
            // JSON responses are automatically parsed.

                this.vehicules_citoyen = response.data;
            })
        }
    }
}
</script>
<style lang="scss" scoped>
    @import "../../css/casier.scss";
    @import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
</style>