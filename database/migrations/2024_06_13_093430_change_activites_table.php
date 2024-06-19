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
            $table->string('_id')->nullable();
            $table->boolean('showInSlider')->default(false)->nullable();
            $table->string('publishStatus')->default('public')->nullable();
            $table->boolean('send')->default(false)->nullable();
            $table->string('form')->nullable();
            $table->string('miniatureColor')->nullable();
            $table->boolean('showInCalendar')->default(false)->nullable();
            $table->boolean('liveStatus')->default(false)->nullable();
            $table->boolean('bookASeat')->default(false)->nullable();
            $table->boolean('isEvents')->default(false)->nullable();
            $table->date('createdAt')->nullable();
            $table->date('updatedAt')->nullable();
            $table->json('creator')->nullable();
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
