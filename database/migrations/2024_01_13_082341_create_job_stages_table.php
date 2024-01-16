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
        Schema::create('job_stages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id')->references('id')->on('fursa__jobs')->onDelete('cascade');
            $table->string('name');
            $table->unsignedBigInteger('round')->nullable();
            $table->unsignedBigInteger('fursa__applicant_id')->nullable();
            $table->foreign('fursa__applicant_id')->references('id')->on('fursa__applicants')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_stages');
    }
};
