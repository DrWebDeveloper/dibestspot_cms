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
        Schema::create('user_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('package_id')->constrained()->noActionOnDelete();
            $table->timestamp('trial_started_at')->nullable();
            $table->timestamp('trial_ending_at')->nullable();
            $table->timestamp('trial_ended_at')->nullable();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->timestamp('paused_at')->nullable();
            $table->timestamp('resumed_at')->nullable();
            $table->timestamp('failed_at')->nullable();
            $table->timestamp('refunded_at')->nullable();
            $table->timestamp('renewed_at')->nullable();
            $table->timestamp('renewed_failed_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->enum('status', ['trial', 'active', 'canceled', 'paused', 'resumed', 'failed', 'refunded', 'renewed', 'renewed_failed', 'expired', ])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_packages');
    }
};
