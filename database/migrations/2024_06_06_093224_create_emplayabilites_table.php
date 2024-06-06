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
        Schema::create('emplayabilites', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type_contrat');
            $table->string('genre_contrat');
            $table->string('nomboite');
            $table->string('periode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emplayabilites');
    }
};
