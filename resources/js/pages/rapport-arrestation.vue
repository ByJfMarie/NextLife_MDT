<template lang="fr">
    <div>
        <input type="date" name="test" id="test" v-model="date">
        <input type="time" name="test1" id="test1" v-model="time">
        <input type="text" name="addresse_pdp" id="addresse_pdp" v-model="addresse_pdp">
        <input type="date" name="date_rapport" id="date_rapport" v-model="date_rapport">
        <p>{{name}}</p>
        <div>
            <label for="recherche_citoyen">Recherche un Citoyen</label>
            <input type="text" name="recherche_citoyen" id="recherche_citoyen" v-model="idCitoyen">
            <button v-on:click="rechercheCitoyen">Recherche</button>
        </div>
        <div v-if="dataCitoyen">
            <p>{{dataCitoyen.prenom}} {{dataCitoyen.nom}}</p>
            <p>{{dataCitoyen.adresse}} {{dataCitoyen.civilite}}</p>
            <p>{{dataCitoyen.telephone}} {{dataCitoyen.type}} {{dataCitoyen.dateDeNaissance}}</p>
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
        rechercheCitoyen(){
            this.$axios.get('/api/citoyens/' + this.idCitoyen).then(response => {
                this.dataCitoyen = response.data;
                console.log(this.dataCitoyen);
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