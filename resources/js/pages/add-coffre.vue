<template lang="fr">
    <div class="coffre-container">
        <h1>Ajouter un item au coffre des saisies</h1>
        <div class="form">

            <label for="id_citoyen">ID Citoyen</label>
            <input type="number" name="id_citoyen" id="id_citoyen" v-model="id_citoyen">
            <label for="nom">Nom Item</label>
            <input type="text" name="nom" id="nom" v-model="nom">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" v-model="quantity">
            <label for="type">Type</label>
            <select name="type" id="type" v-model="type">
                <option value="weapon">Arme</option>
                <option value="object">Object / Argent</option>
            </select>
            <button v-on:click="add_coffre">Ajouter au Coffre</button>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            id_citoyen: null,
            nom: null,
            type: null,
            quantity: null,
        }
    },
    methods: {
        add_coffre(){

            var newItem = new Object;

            newItem.id_citoyen = this.id_citoyen;
            newItem.nom = this.nom;
            newItem.type = this.type;
            newItem.quantity = this.quantity;

            this.$axios.post('/api/coffre', newItem).then(response => {
                alert(response.data.success)
            })

            this.id_citoyen = null;
            this.nom = null;
            this.type = null;
            this.quantity = null;
        }
    },
    beforeRouteEnter (to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>
<style lang="scss" scoped>
    .coffre-container {
        width: 100%;
        height: 100vh;
        border: 1px solid red;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        color: white;

        .form {
            margin-top: 20px;

            label{
                margin-right: 5px;
            }

            input{
                margin-right: 15px;
            }

            button {
                margin-left: 15px;
            }
        }
    }
</style>