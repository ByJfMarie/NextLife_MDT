<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('modele');
            $table->string('immatriculation')->unique();
            $table->string('type');
            $table->unsignedbigInteger('proprietaire')->default('1');
            $table->text('description');
            $table->boolean('isWanted')->default(false);
            $table->string('photo_path')->nullable();
            $table->timestamps();

            $table->foreign('proprietaire')->references('id')->on('citoyens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicules');
    }
}
