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
        try {
            //code...
            $userPlatform = $this->user->platforms()->create([
                'platform_id' => $this->platform->id,
                'platform_user_id' => ($this->platform->id + $this->user->id) * 2,
                'platform_user_username' => $this->user->username ?? $this->user->email,
                'platform_user_email' => $this->user->email,
                'platform_user_phone_number' => $this->user->phone_number,
                'platform_user_status' => 'active',
                'platform_user_last_login' => now(),
                'platform_user_role' => 'user',
                'status' => 'active'
            ]);

            if (!$userPlatform) {
                Log::error("Error registering user {$this->user->id} on platform {$this->platform->name} ({$this->platform->id}).");
                throw new \Exception("Error registering user {$this->user->id} on platform {$this->platform->name} ({$this->platform->id}).");
            }
        } catch (\Throwable $th) {
            // Log the exception
            Log::error('Error registering user on platform ' . $this->platform->name, [
                'user_id' => $this->user->id,
                'platform_id' => $this->platform->id,
                'error' => $th->getMessage(),
            ]);
        }
    }
}
