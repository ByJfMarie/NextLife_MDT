<template lang="fr">
    <div>
        <div class="card" v-for="data in datas">
            <div class="image-container">
                <img :src="`/storage/${data.photo_path}`" alt="">
            </div>
            <div class="infos-container">
                <h1>{{data.nom}} {{data.prenom}}</h1>
                <h2>{{data.adresse}} - {{data.telephone}}</h2>
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