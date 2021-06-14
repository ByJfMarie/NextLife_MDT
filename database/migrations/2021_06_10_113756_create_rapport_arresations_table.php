<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapportArresationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapport_arresations', function (Blueprint $table) {
            $table->id();
            $table->date('date_arrestation');
            $table->string('heure_arrestation');
            $table->string('addresse_pdp');
            $table->date('date_rapport');
            $table->text('description');
            $table->unsignedBigInteger('id_police');
            $table->unsignedBigInteger('id_citoyen');
            $table->unsignedBigInteger('id_amende');
            $table->timestamps();

            $table->foreign('id_police')->references('id')->on('users');
            $table->foreign('id_citoyen')->references('id')->on('citoyens');
            $table->foreign('id_amende')->references('id')->on('historique_amendes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rapport_arresations');
    }
}
