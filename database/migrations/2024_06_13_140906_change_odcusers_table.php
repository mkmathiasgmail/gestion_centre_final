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
            $table->renameColumn('firstname', 'first_name');
            $table->renameColumn('lastname', 'last_name');
            $table->dateTime('birthdate')->nullable()->change();
            $table->renameColumn('linkedin', 'linkedin');
            $table->json('odc_country')->nullable();
            $table->string('role')->nullable();
            $table->boolean('is_active')->nullable();
            $table->json('hashtags')->nullable();
            $table->json('profession')->change();
            $table->boolean('coding_school')->default(false);
            $table->boolean('fablab_solidaire')->default(false);
            $table->boolean('training')->default(false);
            $table->boolean('internship')->default(false);
            $table->boolean('event')->default(false);
            $table->boolean('subscribe')->default(false);
            $table->json('newsletters')->nullable();
            $table->json('topics')->nullable();
            $table->dateTime('last_connection')->nullable();
            $table->string('_id')->nullable();
            $table->json('detail_profession')->nullable();
            $table->dateTime('createdAt')->nullable();
            $table->dateTime('updatedAt')->nullable();
            $table->integer('__v')->default(0);
            $table->string('picture')->nullable();
            $table->string('user_cv')->nullable();
            $table->dropColumn('phone');
            $table->dropColumn('company');
            $table->dropColumn('university');
            $table->dropColumn('speciality');
            $table->dropColumn('country');
            $table->dropColumn('cv');
            $table->dropColumn('photo');
        }) ;

        Schema::table('odcusers', function (Blueprint $table){
            $table->renameColumn('birthdate', 'birth_date');
            $table->string('first_name')->nullable()->change();
            $table->string('last_name')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('password')->nullable()->change();
            $table->string('gender')->nullable()->change();
            $table->json('profession')->nullable()->change();
        }) ;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
