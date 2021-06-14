<template lang="fr">
    <div>
        <input type="date" name="test" id="test" v-model="date">
        <input type="time" name="test1" id="test1" v-model="time">
        <input type="text" name="addresse_pdp" id="addresse_pdp" v-model="addresse_pdp">
        <input type="date" name="date_rapport" id="date_rapport" v-model="date_rapport">
        <p>{{name}}</p>
        <div>
            <label for="recherche_citoyen">Recherche l'amende lié</label>
            <input type="text" name="recherche_amende" id="recherche_amende" v-model="idAmende">
            <button v-on:click="rechercheAmende">Recherche</button>
        </div>
        <div v-if="dataAmende">
            <p>{{dataAmende.prenom}} {{dataAmende.nom}}</p>
            <p>{{dataAmende.adresse}} {{dataAmende.civilite}}</p>
            <p>{{dataAmende.telephone}} {{dataAmende.type}} {{dataAmende.dateDeNaissance}}</p>

            <div class="amende" v-for="fait in dataAmende.descriptif" >
                <p>{{fait}}</p>
            </div>

            <p>{{dataAmende.prix}} $</p>
        </div>
        <textarea name="description" id="description" cols="30" rows="10" v-model="description_text"></textarea>
        <input type="button" value="Signer et Soumettre le rapport" v-on:click="postRapport">
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
            description_text: null,

        }
    },
    methods: {
        rechercheAmende(){
            this.$axios.get('/api/historique_amendes/' + this.idAmende).then(response => {
                this.dataAmende = response.data[0];
                this.dataAmende.descriptif = JSON.parse(this.dataAmende.descriptif);
                console.log(this.dataAmende.descriptif);
            })
        },
        postRapport(){

            if (this.dataAmende != null) {
                
                
                var newRapport = new Object;
                
                newRapport.date_arrestation = this.date;
                newRapport.heure_arrestation = this.time;
                newRapport.addresse_pdp = this.addresse_pdp;
                newRapport.date_rapport = this.date_rapport;
                newRapport.description = this.description_text;
                newRapport.id_police = this.id;
                newRapport.idCitoyen = this.dataAmende.id_citoyen;
                newRapport.id_amende = this.dataAmende.id;


                 this.$axios.post('/api/rapport_arrestation', newRapport).then(response =>{
                     alert(response.data.success);
                 })
            }
            else{
                alert('Merci de Sélectionner l\'amende liée au rapport');
            }
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