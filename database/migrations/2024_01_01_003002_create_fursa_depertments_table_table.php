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
        Schema::create('fursa__depertments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('label');
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('fursa__companies')->onDelete('cascade');
            $table->text('description');
            $table->unique(['company_id','name']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fursa__depertments');
    }
};
