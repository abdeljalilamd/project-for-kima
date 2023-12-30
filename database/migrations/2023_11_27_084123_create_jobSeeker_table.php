<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_seekers', function (Blueprint $table) {
            $table->uuid('seeker_id')->primary(); // identify seekers id
            $table->string('title'); // Position Name
            $table->date('dateBirthday');
            $table->enum('EducationLevel', ['bac+1', 'bac+2','bac+3','bac+4','bac+5']);
            $table->text('educationDescription');
            $table->string('experience');
            $table->text('experienceDescription');
            $table->json('skills')->default(new Expression('(JSON_ARRAY())'));
            $table->string('cv');
            $table->json('languages')->default(new Expression('(JSON_ARRAY())'));
            $table->string('linkedinLink');
            $table->foreignUuid('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_seekers');
    }
};
