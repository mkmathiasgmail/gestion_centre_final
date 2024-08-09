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
            $table->unsignedBigInteger('poste_id')->nullable();
            $table->foreign('poste_id')
                ->references('id')
                ->on('postes')
                ->onDelete('cascade');

            $table->unsignedBigInteger('entreprise_id')->nullable();
            $table->foreign('entreprise_id')
                ->references('id')
                ->on('entreprises')
                ->onDelete('cascade');

            $table->dropColumn('poste');
            $table->dropColumn('nomboite');




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