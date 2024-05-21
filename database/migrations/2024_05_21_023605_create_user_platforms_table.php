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
        Schema::create('user_platforms', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->integer('platform_id')->unsigned();
            $table->string('platform_user_id');
            $table->string('platform_user_username')->nullable();
            $table->string('platform_user_email')->nullable();
            $table->string('platform_user_phone')->nullable();
            $table->string('platform_user_role')->nullable();
            $table->string('platform_user_token')->nullable();
            $table->string('platform_user_secret')->nullable();
            $table->string('platform_user_refresh_token')->nullable();
            $table->string('platform_user_expires_in')->nullable();
            $table->string('platform_user_token_type')->nullable();
            $table->string('platform_user_scope')->nullable();
            $table->string('platform_user_avatar')->nullable();
            $table->string('platform_user_profile_url')->nullable();
            $table->enum('status', ['active', 'inactive', 'banned', 'deleted', 'suspended', 'pending', 'verified', 'unverified', 'blocked'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_platforms');
    }
};
