<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="alert alert-danger" role="alert" v-if="error !== null">
                    {{ error }}
                </div>

                <div class="card card-default">
                    <div class="card-header">Nouvelle Recrue - S'enregistrer</div>
                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">Identité</label>
                                <div class="col-md-6">
                                    <input id="name" type="email" placeholder="Raul Marquez" class="form-control" v-model="name" required
                                           autofocus autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="matricule" class="col-sm-4 col-form-label text-md-right">Matricule</label>
                                <div class="col-md-6">
                                    <input id="matricule" type="text" placeholder="44" class="form-control" v-model="matricule" required
                                           autofocus autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">Adresse Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" placeholder="rmarquez@discord.gg" class="form-control" v-model="email" required
                                           autofocus autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Mot de Passe</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" v-model="password"
                                           required autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="access-token" class="col-md-4 col-form-label text-md-right">Access Token</label>
                                <div class="col-md-6">
                                    <input id="access-token" type="text" placeholder="Délivré par le supérieur" class="form-control" v-model="access_token"
                                           required autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary" @click="handleSubmit">
                                        S'enregistrer
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
    @import '../../css/auth.scss';
    @import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap');
</style>

<script>
export default {
    data() {
        return {
            name: "",
            email: "",
            password: "",
            matricule: "",
            access_token: "",
            grade: null,
            error: null
        }
    },
    methods: {
        handleSubmit(e) {
            e.preventDefault()
            if (this.password.length > 0) {
                this.$axios.get('/api/access_token?access_token=' + this.access_token).then(response=>{
                    if (response.data.length != 0) {
                    this.grade = response.data[0].grade;
                    axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('api/register', {
                        name: this.name,
                        matricule: this.matricule,
                        email: this.email,
                        password: this.password,
                        grade: this.grade,
                    })
                        .then(response => {
                            if (response.data.success) {
                                window.location.href = "/login"
                            } else {
                                this.error = response.data.message
                            }
                        })
                        .catch(function (error) {
                            console.error(error);
                        });
                    })
                    }
                    else{
                        alert("Token d'accès invalide")
                    }
                })
                // if (this.grade) {
                //     axios.get('/sanctum/csrf-cookie').then(response => {
                //     axios.post('api/register', {
                //         name: this.name,
                //         matricule: this.matricule,
                //         email: this.email,
                //         password: this.password,
                //         grade: this.grade,
                //     })
                //         .then(response => {
                //             if (response.data.success) {
                //                 window.location.href = "/login"
                //             } else {
                //                 this.error = response.data.message
                //             }
                //         })
                //         .catch(function (error) {
                //             console.error(error);
                //         });
                //     })
                // }
                // else{
                //     alert("Token d'accès invalide")
                // }
                
            }
        }
    },
    beforeRouteEnter(to, from, next) {
        if (window.Laravel.isLoggedin) {
            return next('dashboard');
        }
        next();
    }
}
</script>