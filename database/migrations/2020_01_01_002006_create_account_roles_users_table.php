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
        Schema::create('account__roles_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_role_id');
            $table->unsignedBigInteger('account_user_id');
            $table->foreign('account_role_id')->references('id')->on('account__roles')->onDelete('cascade');
            $table->foreign('account_user_id')->references('id')->on('account__users')->onDelete('cascade');
            $table->unique(['account_role_id', 'account_user_id'],'account__roles_users__unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account__roles_users');
    }
};
