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
        Schema::create('file__file_targets', function (Blueprint $table) {
            $table->id();
            $table->string('target_name');
            $table->string('target_name_id');
            $table->unsignedBigInteger('file_id');
            $table->foreign('file_id')->references('id')->on('file__files')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file__file_targets');
    }
};
