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
            $table->id('seeker_id'); // identify seekers id
            $table->string('title'); // Position Name
            $table->date('dateBirthday');
            $table->string('EducationLevel');
            $table->text('educationDescription');
            $table->string('experience');
            $table->text('experienceDescription');
            $table->json('skills')->default(new Expression('(JSON_ARRAY())'));
            $table->string('cv');
            $table->json('languages')->default(new Expression('(JSON_ARRAY())'));
            $table->string('linkedinLink');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
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
