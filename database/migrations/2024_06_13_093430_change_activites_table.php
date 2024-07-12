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
            $table->boolean('show_in_slider')->default(false)->nullable();
            $table->string('publish_status')->default('public')->nullable();
            $table->boolean('send')->default(false)->nullable();
            $table->foreignId('form_id')->nullable()->constrained()->onDelete('no action')->onUpdate('no action');
            $table->string('miniature_color')->nullable();
            $table->boolean('show_in_calendar')->default(false)->nullable();
            $table->boolean('live_status')->default(false)->nullable();
            $table->boolean('book_a_seat')->default(false)->nullable();
            $table->boolean('is_events')->default(false)->nullable();
            $table->date('createdAt')->nullable();
            $table->date('updatedAt')->nullable();
            $table->json('creator')->nullable();
            $table->renameColumn('date_debut', 'start_date');
            $table->renameColumn('date_fin', 'end_date');
            $table->dropColumn('image');
            $table->string('thumbnail_url')->nullable();
            $table->string('number_hour')->nullable();
        }) ;

        Schema::table('activites', function (Blueprint $table) {
            $table->json('content')->change();
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
