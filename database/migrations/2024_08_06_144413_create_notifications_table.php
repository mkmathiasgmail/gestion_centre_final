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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->string('type');
            $table->integer('person_number');
            $table->timestamp('send_date');
            $table->timestamps();
            $table->foreignUuid('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('activite_id')->nullable()->constrained('activites')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('model_mail_id')->nullable()->constrained('model_mails')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('sms_model_id')->nullable()->constrained('sms_models')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
