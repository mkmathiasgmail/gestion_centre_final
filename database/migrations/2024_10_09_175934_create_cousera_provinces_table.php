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
        Schema::create('cousera_provinces', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('nom');
            $table->string('prenom')->nullable();
            $table->integer('postnom')->nullable();
            $table->string('genre')->nullable();
            $table->string('numero')->nullable();
            $table->date('universite')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cousera_provinces');
    }
};
