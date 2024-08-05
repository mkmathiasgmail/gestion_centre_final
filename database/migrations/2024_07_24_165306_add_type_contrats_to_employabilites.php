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
            $table->unsignedBigInteger('type_contrat_id')->nullable();
            $table->foreign('type_contrat_id')
                  ->references('id')
                  ->on('type_contrats')
                  ->onDelete('cascade');
                  
            $table->dropColumn('type_contrat');

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
