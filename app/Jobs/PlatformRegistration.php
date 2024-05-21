<?php

namespace App\Jobs;

use App\Models\Platform;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class PlatformRegistration implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public User $user;
    public Platform $platform;
    public function __construct(User $user, Platform $platform)
    {
        $this->user = $user;
        $this->platform = $platform;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Register user on platform
        Log::info("Registering user {$this->user->id} on platform {$this->platform->id}");
    }
}
