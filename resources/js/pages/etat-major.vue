<template lang="fr">
    <div>
        <div class="access-token">
            <h1>Génération Access Token</h1>
            <label for="grade">Sélectionner le grade : </label>
            <select name="grade" id="grade" v-model="grade">
                <option v-for="grade in grades" v-bind:value="grade.code" >{{grade.libelle}}</option>
            </select>
            <button v-on:click="generate">Générer</button>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            grades: null,
            grade: null,
        }
    },
    created() {
        this.$axios.get('/api/grades').then(response =>{
            this.grades = response.data;
        })
    },
    methods: {
        generate(){
            var newAccessToken = new Object;

            newAccessToken.grade = this.grade;

            this.$axios.post('/api/access_token', newAccessToken).then(response =>{
                alert("Voici l'Access Token : " + response.data.token);
            })
        }
    },
}
</script>
<style lang="scss">
    
</style>