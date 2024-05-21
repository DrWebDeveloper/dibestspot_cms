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
        Schema::create('platforms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->string('url')->nullable();
            $table->string('domain')->nullable();
            $table->string('homepage')->nullable();
            $table->text('db')->nullable();
            $table->text('smtp')->nullable();
            $table->string('logo')->nullable();
            $table->string('photo')->nullable();
            $table->enum('environment', ['development', 'staging', 'production', ])->default('development');
            $table->enum('type', ['payment', 'marketplace', 'crowdfunding', 'e-commerce', 'social', 'other', ])->default('other');
            $table->enum('category', ['finance', 'entertainment', 'education', 'health', 'news', 'social', 'other', ])->default('other');
            $table->string('support_email')->nullable();
            $table->string('admin_url')->nullable();
            $table->string('admin_email')->nullable();
            $table->text('public_key')->nullable();
            $table->text('secret_key')->nullable();
            $table->enum('auto_login', ['enabled', 'disabled', 'blocked'])->default('enabled');
            $table->enum('auto_register', ['enabled', 'disabled', 'blocked'])->default('enabled');
            $table->json('metadata')->nullable();
            $table->text('settings')->nullable();
            $table->string('api_url')->nullable();
            $table->text('api_keys')->nullable();
            $table->string('webhook_url')->nullable();
            $table->string('callback_url')->nullable();
            $table->string('redirect_url')->nullable();
            $table->string('country')->nullable();
            $table->enum('status', ['active', 'inactive', 'suspended', 'pending', 'maintenance', ])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platforms');
    }
};
