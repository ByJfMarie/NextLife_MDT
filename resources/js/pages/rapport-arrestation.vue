<template lang="fr">
    <div>
        <input type="date" name="test" id="test" v-model="date">
        <input type="time" name="test1" id="test1" v-model="time">
        <input type="text" name="addresse_pdp" id="addresse_pdp" v-model="addresse_pdp">
        <input type="date" name="date_rapport" id="date_rapport" v-model="date_rapport">
        <p>{{name}}</p>
        <div>
            <label for="recherche_citoyen">Recherche l'amande lié</label>
            <input type="text" name="recherche_amende" id="recherche_amende" v-model="idAmende">
            <button v-on:click="rechercheAmende">Recherche</button>
        </div>
        <div v-if="dataAmende">
            <p>{{dataAmende.prenom}} {{dataAmende.nom}}</p>
            <p>{{dataAmende.adresse}} {{dataAmende.civilite}}</p>
            <p>{{dataAmende.telephone}} {{dataAmende.type}} {{dataAmende.dateDeNaissance}}</p>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            date: null,
            time: null,
            addresse_pdp: "Mission Row",
            date_rapport: null,
            id: null,
            name: null,
            idCitoyen: null,
            dataCitoyen: null,
            idAmende: null,
            dataAmende: null,

        }
    },
    methods: {
        rechercheAmende(){
            this.$axios.get('/api/historique_amendes/' + this.idAmende).then(response => {
                this.dataAmende = response.data[0];
                console.log(this.dataAmende);
            })
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    },
    created() {
        var today = new Date();
        
        var dd = today.getDate();
        var mm = today.getMonth()+1; 
        var yyyy = today.getFullYear();

        var hours = today.getHours();
        var minutes = today.getMinutes();
        
        if(dd<10) 
        {
            dd='0'+dd;
        } 

        if(mm<10) 
        {
            mm='0'+mm;
        } 
        
        today = yyyy+'-'+mm+'-'+dd;

        this.time = hours+':'+minutes;
        this.date = today;
        this.date_rapport = today;

        if (window.Laravel.user) {
            
            this.id = window.Laravel.user.id
            this.name = window.Laravel.user.name
        }

    },
}
</script>
<style lang="scss">
    
</style>