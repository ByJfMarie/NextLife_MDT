<?php

namespace Database\Seeders;


use App\Models\AccessToken;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Grade::factory(1)->create([
            'code' => 'LSPD_O',
            'libelle' => 'Officier',
            'etat_major' => 0,
        ]);

        \App\Models\Grade::factory(1)->create([
            'code' => 'LSPD_S',
            'libelle' => 'Sergent',
            'etat_major' => 0,
        ]);

        \App\Models\Grade::factory(1)->create([
            'code' => 'LSPD_L',
            'libelle' => 'Lieutenant',
            'etat_major' => 0,
        ]);

        \App\Models\Grade::factory(1)->create([
            'code' => 'LSPD_LC',
            'libelle' => 'Lieutenant Chef',
            'etat_major' => 1,
        ]);

        \App\Models\Grade::factory(1)->create([
            'code' => 'LSPD_CP',
            'libelle' => 'Capitaine',
            'etat_major' => 1,
        ]);

        \App\Models\Grade::factory(1)->create([
            'code' => 'LSPD_CM',
            'libelle' => 'Commandant',
            'etat_major' => 1,
        ]);

        \App\Models\Citoyen::factory(1)->create([
            'nom' => 'Concitoyen',
            'prenom' => 'Mr',
            'dateDeNaissance' => '1900-01-01',
            'civilite' => 'Non-Binaire',
            'type' => 'Lambda',
            'adresse' => 'Los Santos',
            'telephone' => '000-0000',
            'photo_path' => 'citoyens/GMGrLlDcP35XBVMuAl0UO51XViuFSzlUKjJqAJhQ.png',
    
        ]);

        \App\Models\AccessToken::factory(1)->create([
            'access_token' => 'AF51K6MN',
            'grade' => 'LSPD_CM',
        ]);

        
    }
}

