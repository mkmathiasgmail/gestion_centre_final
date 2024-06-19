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
        Schema::table('odcusers', function (Blueprint $table) {
            $table->renameColumn('firstname', 'firstName');
            $table->renameColumn('lastname', 'lastName');
            $table->renameColumn('birthdate', 'birthDay');
            $table->renameColumn('linkedin', 'linkedIn');
            $table->json('odcCountry');
            $table->string('role');
            $table->boolean('isActive');
            $table->json('hashtags')->nullable();
            $table->json('profession')->change();
            $table->boolean('codingSchool')->default(false);
            $table->boolean('fabLabSolidaire')->default(false);
            $table->boolean('training')->default(false);
            $table->boolean('internship')->default(false);
            $table->boolean('event')->default(false);
            $table->boolean('subscribe')->default(false);
            $table->json('newsletters')->nullable();
            $table->json('topics')->nullable();
            $table->dateTime('last_connection')->nullable();
            $table->string('_id');
            $table->json('detailProfession')->nullable();
            $table->dateTime('createdAt');
            $table->dateTime('updatedAt');
            $table->integer('__v')->default(0);
            $table->string('picture')->nullable();
            $table->string('userCV')->nullable();
            $table->dropColumn('phone');
            $table->dropColumn('company');
            $table->dropColumn('university');
            $table->dropColumn('speciality');
            $table->dropColumn('country');
            $table->dropColumn('cv');
            $table->dropColumn('photo');
            $table->dateTime('birthDate')->change();

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
