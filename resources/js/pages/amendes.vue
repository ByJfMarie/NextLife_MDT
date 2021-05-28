<template lang="fr">
    <div>
        <div class="content">

            <div class="serach-container">
                <h1>heelo</h1>
            </div>

            <div class="right">
                
                <div class="buttons">
                    <router-link to="/taj/create" class="nav-item nav-link">ID Citoyen</router-link>
                    <router-link to="/taj" class="nav-item nav-link search">Recherche Mot Clé</router-link>
                    <router-link to="/dashboard" class="logout">Retour Dashboard</router-link>
                </div>
                
                <div class="cards-container">
                    
                    <div class="card" v-for="data in datas">
                        <!-- <div class="image-container">
                            <img :src="`/storage/${data.photo_path}`" alt="">
                        </div> -->
                        <div class="infos-container">
                            <div class="p">

                                <p>{{data.descritpion}}</p>
                                <p>-</p>
                                <p>{{data.prix}} $</p>
                            </div>
                            <button class="addToCart" style="justify-self: flex-end;"></button>
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
        this.$axios.get('/api/liste_amendes')
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
    }
}
</script>
<style lang="scss" scoped>
    @import "../../css/amendes.scss";
    @import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap');
</style>