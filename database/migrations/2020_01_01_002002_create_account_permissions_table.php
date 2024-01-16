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
        Schema::create('account__permissions', function (Blueprint $table) {
            $table->id();
            //
            $table->unsignedBigInteger('module_id')->default(0);
            // [module]__[model]__[action]
            // account__user__create
            $table->string('name')->unique();
            $table->string('label');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account__permissions');
    }
};
