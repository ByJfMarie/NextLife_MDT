<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoffresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coffres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_citoyen');
            $table->string('nom');
            $table->integer('quantity');
            $table->string('type');
            $table->timestamps();

            $table->foreign('id_citoyen')->references('id')->on('citoyens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coffres');
    }
}
