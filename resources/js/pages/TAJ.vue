<template lang="fr">
    <div>
        <div class="content">

            <div class="serach-container">
                <h1>heelo</h1>
            </div>

            <div class="cards-container">
                
                <div class="card" v-for="data in datas">
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
    }
}
</script>
<style lang="scss">
    @import "../../css/taj.scss";
</style>