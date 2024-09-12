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
        Schema::create('coursera_usages', function (Blueprint $table) {

            $table->id();
            $table->string('email');
            //$table->foreign('email')->references('email')->on('coursera_members')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('course_name')->nullable();
            $table->string('course_id')->nullable();
            $table->string('course_slug')->nullable();
            $table->string('university')->nullable();
            $table->date('enrollement_time')->nullable();
            $table->date('class_start_time')->nullable();
            $table->date('class_end_time')->nullable();
            $table->date('last_course_activity')->nullable();
            $table->double('overall_progress')->nullable();
            $table->double('estimated_learning_hours')->nullable();
            $table->string('completed')->nullable();
            $table->string('removed_from_program')->nullable();
            $table->string('enrollement_source')->nullable();
            $table->string('completion_time')->nullable();
            $table->string('course_grade')->nullable();
            $table->string('course_type')->nullable();
            $table->string('course_certificate_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coursera_usages');
    }
};
