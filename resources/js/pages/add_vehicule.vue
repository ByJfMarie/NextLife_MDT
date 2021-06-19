<template lang="fr">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="form-container">
        <form action="vehicules" method="POST" enctype="multipart/form-data">
        
            <input type="hidden" name="_token" :value="csrf">

            <div class="form-group">
                <label for="modele">Modèle</label>
                <input type="text" name="modele" id="modele" required>
            </div>
            <div class="form-group">
                <label for="immatriculation">Plaque d'immatriculation</label>
                <input type="text" name="immatriculation" id="immatriculation" required>
            </div>
            <div class="form-group">
                <label for="type">Type du Véhicule</label>
                <input type="text" placeholder="Citadine" name="type" id="type" required>
            </div>
            <div class="form-group">
                <label for="proprietaire">Propriétaire (ne rien mettre si véhicule concitoyen)</label>
                <input type="text" name="proprietaire" id="proprietaire">
            </div>
            <div class="form-group">
                <label for="description">Courte description du contexte de saisie</label>
                <!-- <input type="text" name="adresse" id="adresse" required> -->
                <textarea name="description" id="description" cols="30" rows="10" required></textarea>
            </div>
            <div class="form-group">
                <label for="photo_path">Photo de la voiture (facultatif)</label>
                <input type="file" name="photo_path" id="photo_path">
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
<style lang="scss" scoped>
    
</style>