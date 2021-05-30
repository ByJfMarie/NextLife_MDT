<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriqueAmendesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historique_amendes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('citoyen');
            $table->integer('prix');
            $table->json('descriptif');
            $table->timestamps();

            $table->foreign('citoyen')->references('id')->on('citoyens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historique_amendes');
    }
}
