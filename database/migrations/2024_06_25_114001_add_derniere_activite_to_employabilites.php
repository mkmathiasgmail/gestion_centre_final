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
            $table->string('derniere_activite')->after('periode');
            $table->string('derniere_service')->after('derniere_activite');
            $table->string('date_participation')->after('derniere_service');

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
