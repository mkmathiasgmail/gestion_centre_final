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
        Schema::create('regions_activites', function (Blueprint $table) {
            $table->uuid('id');
            $table->foreignUuid('activite_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignUuid('region_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regions_activites');
    }
};
