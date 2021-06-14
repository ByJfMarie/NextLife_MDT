<template lang="fr">
    <div>
        <div class="content">

            <div class="serach-container">
                <h1>heelo</h1>
            </div>

            <div class="right">
                
                <div class="buttons">
                    <router-link to="/taj/create" class="nav-item nav-link">Ajouter</router-link>
                    <router-link to="/rapport-arrestation" class="nav-item nav-link">Rapport D'arrestation</router-link>
                    <router-link to="/taj/amende" class="nav-item nav-link">Créer une amende</router-link>
                    <router-link to="/dashboard" class="logout">Retour Dashboard</router-link>
                </div>
                
                <div class="cards-container">
                    
                    
                    <div class="card" v-for="data in datas" v-on:click="goToCasier(data.id)">
                        <!-- <div class="image-container">
                            <img :src="`/storage/${data.photo_path}`" alt="">
                        </div> -->
                        <div class="infos-container">
                            <p>{{data.id}}</p>
                            <p>{{data.prenom}} {{data.nom}}</p>
                            <p>{{data.telephone}}</p>
                            <p>{{data.adresse}}</p> 
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
        this.$axios.get('/api/citoyens')
            .then(response => {
            // JSON responses are automatically parsed.

                this.datas = response.data;
            })
    },
    methods: {
        goToCasier(data){
            window.location.href = "/taj/" + data;
        }
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
    @import "../../css/taj.scss";
</style>