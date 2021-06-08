<template>
    <div class="dash-container">
       <h1>Bonjour {{ grade }} {{ name }} - {{ matricule }}</h1>
       <div class="button-container">
           <router-link to="/siv" class="nav-item nav-link">SIV</router-link>
           <router-link to="/taj" class="nav-item nav-link">TAJ</router-link>
           <router-link to="/etat-major" class="nav-item nav-link">Etat-Major</router-link>
           <a class="logout" style="cursor: pointer;" @click="logout">Sortir du M.D.T / C.A.D</a>
        </div>
        <div class="infos-container">
            <div class="wantedCitoyens">
                <h1>Personnes les plus recherchées :</h1>
                <div class="citoyens" v-for="citoyen in citoyens">
                    <div class="citoyen" v-if="citoyen.isWanted == 1">
                        <p>{{citoyen.prenom}} {{citoyen.nom}}</p>
                    </div>
                </div>
            </div>
            <div class="wantedVehicule">
                <h1>Véhicules recherchées :</h1>
                <div class="vehicules" v-for="vehicule in vehicules">
                    <div class="vehicule" v-if="vehicule.isWanted == 1">
                        <p>{{vehicule.immatriculation}} - {{vehicule.modele}}</p>
                        <p>{{vehicule.prenom_proprio}} {{vehicule.nom_proprio}}</p>
                    </div>
                </div>
            </div>
            <div class="summonedCitoyens">
                <h1>Citoyens Convoquées :</h1>
                <div class="citoyens" v-for="citoyen in citoyens">
                    <div class="citoyen" v-if="citoyen.isSummoned == 1">
                        <p>{{citoyen.prenom}} {{citoyen.nom}}</p>
                    </div>
                </div>
            </div>
            <div class="bracelets">
                <h1>Bracelet Electroniques :</h1>
                <div class="citoyens" v-for="bracelet in bracelets">
                    <p>{{bracelet.num_serie}} - {{bracelet.prenom_proprio}} {{bracelet.nom_proprio}}</p>
                </div>
            </div>
        </div> 
    </div>
</template>

<style lang="scss" scoped >
    @import "../../css/dashboard.scss";
    @import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
</style>

<script>
import axios from 'axios'
export default {
    name: "Dashboard",
    data() {
        return {
            id: null,
            name: null,
            grade: null,
            matricule: null,
            citoyens: null,
            bracelets: null,
            vehicules: null,
        }
    },
    async created() {
        if (window.Laravel.user) {
            this.id = window.Laravel.user.id
            this.name = window.Laravel.user.name
            this.matricule = window.Laravel.user.matricule
            
            await axios.get('/api/citoyens').then(response =>{
                this.citoyens = response.data;
            })

            await axios
            .get('/api/vehicules')
            .then(response =>{
                this.vehicules = response.data;
            })

            await axios
            .get('/api/bracelet')
            .then(response =>{
                this.bracelets = response.data;
            })

            await axios
            .get('/api/users/' + this.id)
            .then(response => {
            // JSON responses are automatically parsed.

                this.grade = response.data[0].grade;
            })   

            

        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    },
    methods: {
        logout(e) {
            e.preventDefault()
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/logout')
                    .then(response => {
                        if (response.data.success) {
                            window.location.href = "/"
                        } else {
                            console.log(response)
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
}
</script>