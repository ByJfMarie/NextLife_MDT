<template lang="fr">
    <div>
        <div class="content">

            <div class="search-container">
                    <router-link to="/taj/create" class="nav-item nav-link">Ajouter Casier</router-link>
                    <router-link to="/rapport-arrestation" class="nav-item nav-link">Rapport D'arrestation</router-link>
                    <router-link to="/rapport-agent" class="nav-item nav-link">Rapport Agent</router-link>
                    <router-link to="/taj/amende" class="nav-item nav-link">Créer une amende</router-link>
                    <router-link to="add-coffre" class="nav-item nav-link">Ajouter au coffre des saisies</router-link>
                
            </div>

            <div class="right">
                
                <div class="buttons">
                    <input class="nav-item-input search" type="search" placeholder="Recherche Citoyen (nom et/ou prénom)" name="" v-model="searchKey" id="search">
                    <router-link to="/dashboard" class="logout">Retour Dashboard</router-link>
                </div>
                
                <div class="cards-container">
                    
                    
                    <div class="card" v-for="data in filteredList" v-on:click="goToCasier(data.id)">
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
            searchKey: ''
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
    computed: {
        filteredList() {
            if (this.datas !== null) {
                 return this.datas.filter((data) => {
                    var name = data.prenom + " " + data.nom;
                    return name.toLowerCase().includes(this.searchKey.toLowerCase());
                })
            }
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