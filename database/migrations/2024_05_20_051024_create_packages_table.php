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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('uid')->unique()->nullable();
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->decimal('price', 8, 2);
            $table->string('currency')->default('USD');
            $table->unsignedInteger('duration')->default(1);
            $table->enum('duration_unit', ['day', 'week', 'month', 'year'])->default('month');
            $table->unsignedInteger('trial')->nullable();
            $table->enum('trial_unit', ['day', 'week', 'month', 'year'])->default('week');
            $table->unsignedInteger('discount')->nullable();
            $table->enum('discount_unit', ['percentage', 'fixed'])->nullable();
            $table->string('type')->default('subscription');
            $table->string('category')->default('other');
            $table->enum('status', ['draft', 'published', 'archived', 'deleted', 'limited'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
