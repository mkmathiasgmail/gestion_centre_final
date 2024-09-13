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
        Schema::table('employabilites', function (Blueprint $table) {
            $table->string('genre')->after('date_participation');
            $table->string('tranche_age')->after('genre');
            $table->string('niveau_academique')->after('tranche_age');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employabilites', function (Blueprint $table) {
            //
        });
    }
};