<template lang="fr">
    <div>
        <div class="content">

            <div class="serach-container">
                <h1>heelo</h1>
            </div>

            <div class="right">
                
                <div class="buttons">
                    <router-link to="/siv/create" class="nav-item nav-link">Ajouter</router-link>
                    <router-link to="/taj" class="nav-item nav-link">Modifier</router-link>
                    <router-link to="/login" class="nav-item nav-link">Supprimer</router-link>
                    <router-link to="/dashboard" class="logout">Retour Dashboard</router-link>
                </div>
                
                <div class="cards-container">
                    
                    <div class="card" v-for="data in datas">
                    <!-- <div class="image-container">
                        <img :src="`/storage/${data.photo_path}`" alt="">
                    </div> -->
                        <div class="infos-container">
                            <p>{{data.id}}</p>
                            <p>{{data.immatriculation}}</p>
                            <p>{{data.modele}} - {{data.type}}</p> 
                            <p>{{data.prenom_proprio}} {{data.nom_proprio}}</p>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            datas: null,
        }
    },
    created() {
        this.$axios.get('/api/vehicules')
            .then(response => {
            // JSON responses are automatically parsed.

                this.datas = response.data;
            })
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    },
}
</script>
<style lang="scss" scoped>
    @import "../../css/siv.scss";
</style>