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
        Schema::create('selections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('interview_id');
            $table->string('hr_id');
            $table->string('recruiter_id');
            $table->string('interviewer_id');
            $table->string('hr_score');
            $table->string('recruiter_score');
            $table->string('interviewer_score');
            $table->string('interviewer_feedback');
            $table->string('hr_feedback');
            $table->string('recruiter_feedback');
            $table->string('status');
            $table->foreign('interview_id')->references('id')->on('interviews')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('selections');
    }
};
