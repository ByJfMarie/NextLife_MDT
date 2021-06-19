<template lang="fr">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="form-container">
        <form action="citoyens" method="POST" enctype="multipart/form-data">
        
            <input type="hidden" name="_token" :value="csrf">

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" required>
            </div>
            <div class="form-group">
                <label for="dateDeNaissance">Date de Naissance</label>
                <input type="text" placeholder="AAAA-MM-JJ" name="dateDeNaissance" id="dateDeNaissance" required>
            </div>
            <div class="form-group">
                <label for="civilite">Civilité</label>
                <input type="text" name="civilite" id="civilite" required>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" placeholder="Caucasien" name="type" id="type" required>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" id="adresse" required>
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" id="telephone" required>
            </div>
            <div class="form-group">
                <label for="photo_path">Photo D'identité</label>
                <input type="file" name="photo_path" id="photo_path" required>
            </div>
            <div class="form-group">
                <label for="driveLicense">Permit de Conduire</label>
                <input class="switch" type="checkbox" name="driveLicense" id="driveLicense">
            </div>
            <div class="form-group">
                <label for="weaponLicense">Permit de Port d'Arme</label>
                <input class="switch" type="checkbox" name="weaponLicense" id="weaponLicense">
            </div>
            <button type="submit">Creer</button>
        </form>
    </div>
</template>
<script>
export default {
    data() {
    return {
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    }
}
}
</script>
<style lang="scss"  scoped>
    @import "../../css/create_form.scss";
    @import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap');
</style>