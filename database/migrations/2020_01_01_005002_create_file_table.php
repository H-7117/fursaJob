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
        Schema::create('file__files', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->unsignedBigInteger('file_type_id');
            $table->foreign('file_type_id')->references('id')->on('file__file_types')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('size');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file__files');
    }
};
