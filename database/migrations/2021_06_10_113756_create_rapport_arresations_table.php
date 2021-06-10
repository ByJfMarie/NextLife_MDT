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
            $table->text('descriprion');
            $table->unsignedBigInteger('id_police');
            $table->unsignedBigInteger('id_citoyen');
            $table->unsignedBigInteger('id_amende');
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
        Schema::dropIfExists('rapport_arresations');
    }
}
