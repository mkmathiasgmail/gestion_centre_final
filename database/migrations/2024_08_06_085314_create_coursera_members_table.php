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
        Schema::create('coursera_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('external_id')->nullable();
            $table->integer('enrolled_courses')->nullable();
            $table->string('completed_courses')->nullable();
            $table->string('member_state')->nullable();
            $table->date('join_date')->nullable();
            $table->date('invitation_date')->nullable();
            $table->date('latest_program_activity_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coursera_members');
    }
};
