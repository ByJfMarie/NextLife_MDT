<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapportAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapport_agents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_agent');
            $table->unsignedBigInteger('id_rapport-arrestation')->nullable();
            $table->date('date_fait');
            $table->time('heure_fait');
            $table->text('description');
            $table->timestamps();


            $table->foreign('id_agent')->references('id')->on('users');
            $table->foreign('id_rapport-arrestation')->references('id')->on('rapport_arresations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rapport_agents');
    }
}
