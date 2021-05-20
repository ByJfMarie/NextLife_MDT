<template>
    <div>
        Bonjour {{ grade }} {{ name }} - {{ matricule }}
    </div>
    <a class="nav-item nav-link" style="cursor: pointer;" @click="logout">Logout</a>
</template>

<script>
export default {
    name: "Dashboard",
    data() {
        return {
            name: null,
            grade: null,
            matricule: null
        }
    },
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
            this.grade = window.Laravel.user.grade
            this.matricule = window.Laravel.user.matricule
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