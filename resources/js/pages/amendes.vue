<template lang="fr">
    <div>
        <div class="content">

            <div class="left">
                
                <div class="cart-container">
                    <div v-for="amende in cart" class="cart-item">
                        <h1>{{amende.descritpion}}</h1>
                        <p>{{amende.prix}} $</p>
                    </div>
                </div>
                <h1 class="total">Total : {{cartTotalAmmount}} $</h1>
                <div class="cart-button">
                    <button v-on:click="valider">Valider</button>
                    <button v-on:click="reset">Reset</button>
                </div>
            </div>

            <div class="right">
                
                <div class="buttons">
                    <input class="nav-item-input" v-model="id_citoyen" type="text" placeholder="ID Citoyen" name="id_citoyen" id="id_citoyen">
                    <!-- <router-link to="/taj/create" class="nav-item nav-link">ID Citoyen</router-link> -->
                    <input class="nav-item-input search" type="search" placeholder="Recherche Mot Clé" name="" v-model="searchKey" id="search">
                    <!-- <router-link to="/taj" class="nav-item nav-link search">Recherche Mot Clé</router-link> -->
                    <router-link to="/dashboard" class="logout">Retour Dashboard</router-link>
                </div>
                
                <div class="cards-container">
                    
                    <div class="card" v-for="data in filteredList">
                        <!-- <div class="image-container">
                            <img :src="`/storage/${data.photo_path}`" alt="">
                        </div> -->
                        <div class="infos-container">
                            <div class="p">

                                <p>{{data.descritpion}}</p>
                                <p>-</p>
                                <p>{{data.prix}} $</p>
                            </div>
                            <button class="addToCart" v-on:click="addToCart(data)" style="justify-self: flex-end;"></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            datas: null,
            cart: [],
            id_citoyen: null,
            prix_amende: null,
            searchKey: '',
        }
    },
    created() {
        this.$axios.get('/api/liste_amendes')
            .then(response => {
            // JSON responses are automatically parsed.

                this.datas = response.data;
            })
    },
    computed: {
        cartTotalAmmount(){
            let total = 0;
            for (let item in this.cart){
                total = total + this.cart[item].prix;
            }
            return total;
        },
        filteredList(){
            if (this.datas != null){
                return this.datas.filter((data) => {
                    return data.descritpion.toLowerCase().includes(this.searchKey.toLowerCase());
                })
            }
            
        }
    },
    methods: {
        addToCart(data){
            
            for (let i = 0; i < this.cart.length; i++) {
                if (this.cart[i].id === data.id) {
                    return this.cart.quantity += 1;
                }
                
            }
            this.cart.push({
                    id: data.id,
                    descritpion: data.descritpion,
                    prix: data.prix,
                    quantity: 1
            })

            
        },
        reset(){
            this.cart = [];
        },
        valider(){
            this.prix_amende = this.cartTotalAmmount;
            
            var newAmende = new Object;
            newAmende.citoyen = parseInt(this.id_citoyen) ;
            newAmende.prix = this.prix_amende.toString();

            newAmende.descriptif = [];
            for (let i=0; i<this.cart.length; i++) {
                newAmende.descriptif[i] = this.cart[i].descritpion;
            }

            //newAmende.descriptif = JSON.stringify(newAmende.descriptif);

            //console.log(newAmende.descriptif);

            this.$axios.post('/api/historique_amendes', newAmende);
            this.$axios.get('/api/historique_amendes?top=1').then(response =>{
                alert('Voici l\'id de l\'amende crée : '+response.data[0].id);
            })

            this.cart = [];
            
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>
<style lang="scss" scoped>
    @import "../../css/amendes.scss";
    @import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap');
</style>