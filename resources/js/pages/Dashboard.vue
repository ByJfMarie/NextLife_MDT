<template>
    <div class="dash-container">
       <h1>Bonjour {{ grade }} {{ name }} - {{ matricule }}</h1>
       <div class="button-container">
           <router-link to="/login" class="nav-item nav-link">SIV</router-link>
           <router-link to="/login" class="nav-item nav-link">TAJ</router-link>
           <router-link to="/login" class="nav-item nav-link">Etat-Major</router-link>
           <a class="logout" style="cursor: pointer;" @click="logout">Sortir du M.D.T / C.A.D</a>
        </div>
        <div class="infos-container">
            
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
            matricule: null
        }
    },
    created() {
        if (window.Laravel.user) {
            this.id = window.Laravel.user.id
            this.name = window.Laravel.user.name
            this.matricule = window.Laravel.user.matricule
            
            axios
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