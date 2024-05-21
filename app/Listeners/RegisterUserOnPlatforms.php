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
        // Register user on platforms

        // Get the platforms where the user has to be registered
        $platforms_ids = Platform::active()->pluck('id');

        // Get the user current platforms
        $user_platforms = $user->platforms()->pluck('id');

        // Get the platforms where the user has to be registered
        $platforms = Platform::whereIn('id', $platforms_ids)
            ->whereNotIn('id', $user_platforms)
            ->get();

        // Dispatch a job for each platform
        foreach ($platforms as $platform) {
            PlatformRegistration::dispatch($user, $platform);
        }
    }
}
