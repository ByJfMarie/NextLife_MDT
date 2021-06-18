<template lang="fr">
    <div>
        <div class="access-token">
            <h1>Génération Access Token</h1>
            <label for="grade">Sélectionner le grade : </label>
            <select name="grade" id="grade" v-model="grade">
                <option v-for="grade in grades" v-bind:value="grade.code" >{{grade.libelle}}</option>
            </select>
            <button v-on:click="generate">Générer</button>
            <br>
            <br><br><br>
            <h1>Ajout d'amende :</h1>
            <label for="description">Description de L'amende</label>
            <input type="text" name="description" v-model="description_amende" id="description">
            <label for="prix">Prix de L'Amende</label>
            <input type="number" name="prix" v-model="prix_amende" id="prix">
            <button v-on:click="addAmende">Ajouter l'amende</button>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            grades: null,
            grade: null,
            description_amende: null,
            prix_amende: null,
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
        },
        addAmende(){
            var newAmende = new Object;

            newAmende.description = this.description_amende;
            newAmende.prix = this.prix_amende;

            console.log(newAmende);

            this.$axios.post('/api/liste_amendes', newAmende).then(response =>{
                alert(response.data.success);
            })
        }
    },
}
</script>
<style lang="scss">
    
</style>