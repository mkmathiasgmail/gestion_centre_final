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
            $table->string('_id');
            $table->boolean('showInSlider');
            $table->string('publishStatus');
            $table->boolean('send');
            $table->string('form');
            $table->string('miniatureColor');
            $table->boolean('showInCalendar');
            $table->boolean('liveStatus');
            $table->boolean('bookASeat');
            $table->boolean('isEvents');
            $table->date('createdAt');
            $table->date('updatedAt');
            $table->json('creator');
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
