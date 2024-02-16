<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description', 300);
            $table->date('fecha');
            $table->string('hora');
            $table->unsignedBigInteger('autonomo_id')->nullable();
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->timestamps();

            $table->foreign('autonomo_id')->references('user_id')->on('autonomos')->onDelete('set null');
            $table->foreign('empresa_id')->references('user_id')->on('empresas')->onDelete('set null');
        });



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
