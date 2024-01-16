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
        Schema::create('account__roles', function (Blueprint $table) {
            $table->id();
            //
            $table->unsignedBigInteger('tenant_id');
            //
            $table->string('name');//->unique();
            $table->string('label');
            //
            $table->foreign('tenant_id')->references('id')->on('account__tenants')->onDelete('cascade');
            $table->unique(['tenant_id','name',]);
            //
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account__roles');
    }
};
