<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitoyensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citoyens', function (Blueprint $table) {
            $table->id();
            $table->text('nom');
            $table->text('prenom');
            $table->date('dateDeNaissance');
            $table->text('civilite');
            $table->text('type');
            $table->text('adresse');
            $table->text('telephone');
            $table->string('photo_path');
            $table->boolean('driveLicense')->default(false);
            $table->boolean('weaponLicense')->default(false);
            $table->boolean('isWanted')->default(false);
            $table->boolean('isSummoned')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citoyens');
    }
}
