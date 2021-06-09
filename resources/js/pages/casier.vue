<template lang="fr">
    <div class="block">
        <div class="citoyen-container">
            <div class="left">
                <div class="infos-citoyen">
                    <div class="haut">
                        <div class="citoyen-photo">
                            <img :src="`/storage/${citoyen.photo_path}`" style="height: 150px;">
                        </div>
                        <div class="info">
                            <p>{{citoyen.prenom}} {{citoyen.nom}}</p>
                            <p>{{citoyen.civilite}} - {{citoyen.dateDeNaissance}}</p>
                            <p>{{citoyen.adresse}}</p>
                        </div>
                    </div>
                    <div class="bas">
                        <div class="bas-left">
                            <p v-if="citoyen.driveLicense == 1">Permis de Conduire</p>
                            <p v-if="citoyen.weaponLicense == 1">Permis de Port D'arme</p>
                        </div>
                        <div class="bas-right">
                            <p class="alert" v-if="citoyen.isWanted == 1">⚠️ Recherché</p>
                            <p class="convoque" v-if="citoyen.isSummoned == 1">Convoqué</p>
                        </div>
                        
                    </div>
                </div>
                <div class="modifCheck">
                    <div class="formModifCheck" v-if="id">

                        <div class="driveLicense form-group">
                            <label for="driveLicense">Permis de Conduire</label>
                            <!-- <input type="checkbox" name="driveLicense" v-if="citoyen.driveLicense" v-model="driveLicense" checked id="driveLicense" class="switch"> -->
                            <input type="checkbox" name="driveLicense" id="driveLicense" v-model="driveLicense" class="switch">
                        </div>
                        <div class="weaponLicense form-group">
                            <label for="weaponLicense form-group">Permis de Port d'Arme</label>
                            <!-- <input type="checkbox" name="weaponLicense" v-if="citoyen.weaponLicense" v-model="weaponLicense" checked id="weaponLicense" class="switch"> -->
                            <input type="checkbox" name="weaponLicense" id="weaponLicense" v-model="weaponLicense" class="switch">
                        </div>
                        <div class="isWanted form-group">
                            <label for="isWanted">Est Recherché</label>
                            <!-- <input type="checkbox" name="isWanted" v-if="citoyen.isWanted" checked id="isWanted" v-model="isWanted" class="switch"> -->
                            <input type="checkbox" name="isWanted"  id="isWanted" v-model="isWanted" class="switch">
                        </div>
                        <div class="isSummoned form-group">
                            <label for="isSummoned">Est Convoqué</label>
                            <!-- <input type="checkbox" name="isSummoned" v-if="citoyen.isSummoned" checked id="isSummoned" v-model="isSummoned" class="switch"> -->
                            <input type="checkbox" name="isSummoned" id="isSummoned" v-model="isSummoned" class="switch">
                        </div>
                        <button v-on:click="modifyValue">Modifier</button>
                        
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="vehicules-container container">
                    <div class="card" v-for="vehicule in vehicules_citoyen" >
                        <div class="infos-container">
                            <p>{{vehicule.id}}</p>
                            <p>{{vehicule.immatriculation}}</p>
                            <p>{{vehicule.modele}} - {{vehicule.type}}</p>
                        </div>
                    </div>
                </div>
                <div class="saisie-container container">
                    <div class="weapons-container">
                        <div class="card" v-for="item in coffreW" >
                            <div class="infos-container">
                                <div class="p">

                                    <p>{{item.nom}}</p>
                                    <p>X {{item.quantity}}</p>
                                </div>
                                <button class="addToCart" v-on:click="delete(item.nom)" style="justify-self: flex-end;"></button>
                            </div>
                        </div>
                    </div>
                    <div class="objects-container">
                        <div class="card" v-for="item in coffreO">
                            <div class="infos-container">
                                <div class="p">

                                    <p>{{item.nom}}</p>
                                    <p>X {{item.quantity}}</p>
                                </div>
                                <button class="addToCart" v-on:click="delete(item.nom)" style="justify-self: flex-end;"></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="justice-container container">
                    <div class="casier-container"></div>
                    <div v-if="bracelet != null" class="bracelet-container">
                        <h1>Numéro du série du Bracelet :</h1>
                        <p>{{bracelet.num_serie}}</p>
                        <button v-on:click="destroyBracelet">Retirer le Bracelet</button>
                    </div>
                    <div v-else class="bracelet-container">
                        <button v-on:click="encodeBracelet">Encoder un Bracelet</button>
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
            id: null,
            citoyen: null,
            vehicules_citoyen: null,
            driveLicense: null,
            weaponLicense: null,
            isWanted: null,
            isSummoned: null,
            bracelet: null,
            coffreO: null,
            coffreW: null,
        }
    },
    methods: {
        modifyValue(){
            var upCitoyen = new Object;
            
            upCitoyen.driveLicense = this.driveLicense;
            upCitoyen.weaponLicense = this.weaponLicense;
            upCitoyen.isWanted = this.isWanted;
            upCitoyen.isSummoned = this.isSummoned;

            this.$axios.put('/api/citoyens/' + this.id, upCitoyen).then(response => {
                window.location.href = "/taj/" + this.id;
            })
        },
        encodeBracelet(){
            var newBracelet = new Object;

            newBracelet.id = this.id;

            this.$axios.post('/api/bracelet', newBracelet).then(response =>{
                window.location.href = "/taj/" + this.id;
            })
        },
        destroyBracelet(){

            this.$axios.delete('/api/bracelet/' +this.bracelet.id).then(response =>{
                window.location.href = "/taj/" + this.id;
            })
        },
        delete(data){
            console.log(data);
        }


    },
    async created() {
        this.id = this.$route.params.id;

        if (this.id != null) {
            await this.$axios
            .get('/api/citoyens/' + this.id)
            .then(response => {
            // JSON responses are automatically parsed.

                this.citoyen = response.data;
            })

            if (this.citoyen.driveLicense == 1) {
                this.driveLicense = true;
            }
            else{
                this.driveLicense = false;
            }

            if (this.citoyen.weaponLicense == 1) {
                this.weaponLicense = true;
            }
            else{
                this.weaponLicense = false;
            }

            if (this.citoyen.isWanted == 1) {
                this.isWanted = true;
            }
            else{
                this.isWanted = false;
            }

            if (this.citoyen.isSummoned == 1) {
                this.isSummoned = true;
            }
            else{
                this.isSummoned = false;
            }

            await this.$axios
            .get('/api/vehicules?proprietaire=' + this.id)
            .then(response => {
            // JSON responses are automatically parsed.

                this.vehicules_citoyen = response.data;
            })

            await this.$axios.get('/api/coffre?id_citoyenW=' + this.id).then(response => {
                this.coffreW = response.data;
            })

            await this.$axios.get('/api/coffre?id_citoyenO=' + this.id).then(response => {
                this.coffreO = response.data;
            })

            await this.$axios
            .get('/api/bracelet?citoyen=' + this.id)
            .then(response =>{
                this.bracelet = response.data[0];
            })
        }
    }
}
</script>
<style lang="scss" scoped>
    @import "../../css/casier.scss";
    @import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
</style>