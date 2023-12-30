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
        Schema::create('offers', function (Blueprint $table) {
            $table->uuid('offer_id')->primary();
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->json('competences')->nullable()->default(new Expression('(JSON_ARRAY())'));
            $table->json('languages')->default(new Expression('(JSON_ARRAY())'));
            $table->year('experienceYear');
            $table->enum('EducationLevel', ['bac+1', 'bac+2','bac+3','bac+4','bac+5']);
            $table->string('typeContract');
            $table->double('salary', 10, 2);
            $table->foreignUuid('recruiter_id')->references('recruiter_id')->on('recruiters');
            $table->timestamps(); // date == created_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
