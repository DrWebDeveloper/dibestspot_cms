<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Jobs\PlatformRegistration;
use App\Models\Platform;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class RegisterUserOnPlatforms
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        $user = $event->user;

        try {
            // Get the platform IDs where the user has to be registered
            $platformsToRegister = Platform::active()->autoRegistertionEnabled()
                ->whereNotIn('id', $user->platforms()->pluck('id')->toArray())
                ->get();

            // Dispatch a job for each platform
            if ($platformsToRegister->isNotEmpty()) {
                $platformsToRegister->each(function ($platform) use ($user) {
                    PlatformRegistration::dispatch($user, $platform);
                });
            } else {
                // Log that the user is already registered on all platforms
                Log::info("User {$user->id} is already registered on all platforms or there are no active platforms for auto registration.");
            }
        } catch (\Exception $e) {
            // Log the exception
            Log::error("Failed to register user {$user->id} on platforms. Error: {$e->getMessage()}");
        }
    }
}
