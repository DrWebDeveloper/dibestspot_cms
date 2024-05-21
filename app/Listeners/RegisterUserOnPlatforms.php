<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Jobs\PlatformRegistration;
use App\Models\Platform;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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

        // Get the platform IDs where the user has to be registered
        $platformsToRegister = Platform::active()
            ->whereNotIn('id', $user->platforms()->pluck('id')->toArray())
            ->get();

        // Dispatch a job for each platform
        $platformsToRegister->each(function ($platform) use ($user) {
            PlatformRegistration::dispatch($user, $platform);
        });
    }
}
