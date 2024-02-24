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
        Schema::create('apuntars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('events_id')->nullable(); // puede ser nulo
            $table->unsignedBigInteger('torneos_id')->nullable(); // puede ser nulo
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('events_id')->references('id')->on('eventos')->nullOnDelete();
            $table->foreign('torneos_id')->references('id')->on('torneos')->nullOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apuntars');
    }
};
