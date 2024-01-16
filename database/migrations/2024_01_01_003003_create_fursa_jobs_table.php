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
        Schema::create('fursa__jobs', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('name');
            $table->text('job_description');
            $table->string('job_tasks');
            $table->string('job_type');
            $table->string('Category');
            $table->string('Location');
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('depertment_id');
            $table->foreign('depertment_id')->references('id')->on('fursa__depertments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fursa__jobs');
    }
};
