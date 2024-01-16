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
        Schema::create('fursa__companies', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->unique();
            $table->string('name')->unique();
            $table->string('label');
            $table->string('email_address');
            $table->string('country');
            $table->string('city');
            $table->text('about_company');
            $table->string('logo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fursa__companies');
    }
};
