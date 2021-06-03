<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBraceletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bracelets', function (Blueprint $table) {
            $table->id();
            $table->string('num_serie');
            $table->unsignedBigInteger('citoyen');
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
        Schema::dropIfExists('bracelets');
    }
}
