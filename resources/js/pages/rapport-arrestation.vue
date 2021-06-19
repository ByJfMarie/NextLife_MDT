<template lang="fr">
    <div>
        <section class="formulaire" style="background-color: pink;">
            <h2>RAPPORT ARRESTATION LOS SANTOS POLICE DEPARTEMENT</h2>
            <div class="fiche">
                <div class="ligne">
                    <div class="date_arres">
                        <h4> Date d'arrestation:</h4>
                        <input type="date" name="test" id="test" v-model="date">
                    </div>
                    <div class="heure_arres">
                        <h4>Heure d'arrestation:</h4>
                        <input type="time" name="test1" id="test1" v-model="time">
                    </div>
                    <div class="num_doss">
                        <h4>Numéro de rapport:</h4>
                        <p class="imple"></p>
                    </div>
                </div>
    
                <div class="ligne">
                    <div class="adresse_remp">
                        <h4>Adresse PDP:</h4>
                        <input type="text" name="addresse_pdp" id="addresse_pdp" v-model="addresse_pdp" placeholder="PDP">
                    </div>
                    <div class="date_crea_doss">
                        <h4>Date du dossier:</h4>
                        <input type="date" name="date_rapport" id="date_rapport" v-model="date_rapport">
                    </div>
                    <div class="officier">
                        <h4>Matricule:</h4>
                        <input type="text" placeholder="Matricule" v-model="name">
    
                    </div>
                </div>
    
                <div class="ligne" v-if="dataAmende">
                    <div class="identite">
                        <h4>Identité:</h4>
                        <p>{{dataAmende.prenom}} {{dataAmende.nom}}</p>
                    </div>
                </div>
    
                <div class="ligne" v-if="dataAmende">
                    <div class="adresse">
                        <h4>Adresse:</h4>
                        <p>{{dataAmende.adresse}}</p>
                    </div>
                    <div class="genre">
                        <h4>Genre:</h4>
                        <p>{{dataAmende.civilite}}</p>
                    </div>
                </div>
    
                <div class="ligne" v-if="dataAmende">
                    <div class="tel">
                        <h4>Téléphone:</h4>
                        <p>{{dataAmende.telephone}}</p>
                    </div>
                    <div class="type">
                        <h4>Type:</h4>
                        <p>{{dataAmende.type}}</p>
                    </div>
                    <div class="date_naiss">
                        <h4>Naissance:</h4>
                        <p>{{dataAmende.dateDeNaissance}}</p>
                    </div>
                </div>
    
                <div class="ligne">
                    <div class="left">
    
                        <label for="amende">Numéro Amende Lié</label>
                        <input type="text" id="amende" v-model="idAmende" placeholder="Numéro Amende Lié">
                    </div>
    
                    <div class="right">
                        <button v-on:click="rechercheAmende">Rechercher l'amende</button>
                    </div>
    
                </div>
    
                <div class="ligne lignes" v-if="dataAmende">
                    <div class="charges" v-for="fait in dataAmende.descriptif">
                        <p style="color: red;">{{fait}}</p>
    
                    </div>
                    <div class="div">
                        <h4>Prix : {{dataAmende.prix}}</h4>
                        <h4>Temps de prison : "Bientot Disponible"</h4>
                    </div>
                </div>

    
                <div class="ligne">
    
                    <div class="description">
                        <h4>Description de l'arrestation:</h4>
                        <textarea v-model="description_text" placeholder="Description de l'arrestation..."></textarea>
                    </div>
                </div>
    
                <button v-on:click="postRapport">Signer et soumettre</button>
    
            </div>
        </section>
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
<style scoped lang="css" scoped>
    /* @import '../../css/rapport.css'; */
    @import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap');
</style>