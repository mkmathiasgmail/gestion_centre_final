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
        Schema::create('odcusers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gender');
            $table->date('birthdate');
            $table->string('phone');
            $table->string('linkedin')->nullable();
            $table->string('profession');
            $table->string('company')->nullable();
            $table->string('university')->nullable();
            $table->string('speciality')->nullable();
            $table->string('country');
            $table->string('cv');
            $table->string('photo');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('odcusers');
    }
};
