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
        Schema::create('account__roles_permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_role_id');
            $table->unsignedBigInteger('account_permission_id');
            $table->foreign('account_role_id')->references('id')->on('account__roles')->onDelete('cascade');
            $table->foreign('account_permission_id')->references('id')->on('account__permissions')->onDelete('cascade');
            $table->unique(['account_role_id','account_permission_id'],'account__roles_permissions__unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account__roles_permissions');
    }
};
