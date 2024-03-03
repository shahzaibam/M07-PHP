<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTorneoUserTable extends Migration
{
    public function up()
    {
        Schema::create('torneo_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('torneo_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('torneo_id')->references('id')->on('torneos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unique(['torneo_id', 'user_id']); // Para evitar inscripciones duplicadas
        });
    }

    public function down()
    {
        Schema::dropIfExists('torneo_user');
    }
}
