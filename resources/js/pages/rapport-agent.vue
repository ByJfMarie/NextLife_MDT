<template lang="fr">
    <div>
        <input type="date" name="date" id="date" v-model="date">
        <input type="time" name="time" id="time" v-model="time">
        <p> {{user.grade}} {{user.name}}</p>

        <label for="recherche_citoyen">Arrestation lié aux faits : </label>
        <input type="text" name="recherche_amende" id="recherche_amende" placeholder="Optionnel" v-model="idAmende">
        <br>
        <textarea name="description" id="description" cols="100" rows="30"></textarea>

        <button>Soumettre le rapport</button>
        
    </div>
</template>
<script>
export default {
   data() {
       return {
           date: null,
           time: null,
           user: null,
          
       }
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

        if (window.Laravel.user) {
            
            this.user = window.Laravel.user
        }
   },
}
</script>
<style lang="scss">
    
</style>