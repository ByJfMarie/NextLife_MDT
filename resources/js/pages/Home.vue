<template>
    <div class="home-container">
       <h1>Bienvenue sur le site de la Police de Los Santos !</h1>

        <div class="menu-container">

            
            <div class="menu-home" v-if="isLoggedIn">
              <router-link to="/login" class="nav-item nav-link">Accès au M.D.T / C.A.D</router-link>
            </div>

            <div class="menu-home" v-else>
                <router-link to="/login" class="nav-item nav-link">Accès au M.D.T / C.A.D</router-link>
                <router-link to="/register" class="nav-item nav-link">Nouvelle Recrue</router-link>
            </div>
        </div>
       
    </div>
</template>

<style lang="scss" scoped >
    @import "../../css/appli.scss";
    @import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap');
</style>

<script>
export default {
    name: "Home",
    data() {
        return {
            isLoggedIn: false,
        }
    },
    created() {
        if (window.Laravel.isLoggedin) {
            this.isLoggedIn = true
        }
    },
    methods: {}
}
</script>

