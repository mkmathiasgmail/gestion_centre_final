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
            $table->dropColumn('genre_contrat');
            $table->foreignId('odcuser_id')
                    ->nullable()
                    ->constrained('odcusers')
                    ->onDelete('cascade');



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
