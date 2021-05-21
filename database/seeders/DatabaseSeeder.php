<?php

namespace Database\Seeders;


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
        ]);

        \App\Models\Grade::factory(1)->create([
            'code' => 'LSPD_S',
            'libelle' => 'Sergent',
        ]);

        \App\Models\Grade::factory(1)->create([
            'code' => 'LSPD_L',
            'libelle' => 'Lieutenant',
        ]);

        \App\Models\Grade::factory(1)->create([
            'code' => 'LSPD_CP',
            'libelle' => 'Capitaine',
        ]);

        \App\Models\Grade::factory(1)->create([
            'code' => 'LSPD_CM',
            'libelle' => 'Commandant',
        ]);
    }
}
