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
        Schema::table('activites', function (Blueprint $table) {
            $table->renameColumn('description', 'content');
            $table->renameColumn('lieu', 'location');
            $table->string('typeEvent');
            $table->renameColumn('date_debut', 'startDate');
            $table->renameColumn('date_fin', 'endDate');
            $table->dropColumn('image');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
