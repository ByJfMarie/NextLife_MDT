<template lang="fr">
    <div class="page">
        <div class="container">

            <div class="datetime">

                <input type="date" name="date" id="date" v-model="date">
                <input type="time" name="time" id="time" v-model="time">
                <p> {{grade}} {{user.name}}</p>
            </div>
            <div class="amende">    
                <label for="recherche_citoyen">Arrestation lié aux faits : </label>
                <input type="text" name="recherche_amende" id="recherche_amende" placeholder="Optionnel" v-model="idAmende">
            </div>
            
            <textarea placeholder="Détails des faits..." name="description" id="description" cols="120" rows="25" v-model="description"></textarea>
            
            <button v-on:click="envoyerRapport">Soumettre le rapport</button>
        </div>
        
    </div>
</template>
<script>
export default {
   data() {
       return {
           date: null,
           time: null,
           user: null,
           description: null,
           idAmende: null,
           grade: null,
          
       }
   },
   methods: {
        envoyerRapport(){
            console.log('test');
           var newRapport = new Object;

           newRapport.date_fait = this.date;
           newRapport.heure_fait = this.time;
           newRapport.description = this.description;
           newRapport.id_agent = this.user.id;
           newRapport.id_rapport_arrestation = this.idAmende;

           this.$axios.post('api/rapport_agent', newRapport).then(response => {
               alert(response.data.success);
           })
       }
   }, 
   created() {

        if (window.Laravel.user) {
            
            this.user = window.Laravel.user
        }

        this.$axios
            .get('/api/users/' + this.user.id)
            .then(response => {
            // JSON responses are automatically parsed.

                this.grade = response.data[0].grade;
            })

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

        
   },
}
</script>
<style lang="scss" scoped>
    @import "../../css/rapport-agent.scss";
    @import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap');
</style>