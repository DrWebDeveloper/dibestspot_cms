<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Platform>
 */
class PlatformFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uid' => 'p-' . uniqid(),
            'title' => $this->faker->company,
            'name' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'slug' => $this->faker->unique()->slug,
            'url' => $this->faker->url,
            'auto_login_url' => $this->faker->url,
            'domain' => $this->faker->domainName,
            'homepage' => $this->faker->url,
            'db' => $this->faker->text,
            'smtp' => $this->faker->text,
            'logo' => $this->faker->imageUrl(100, 100, 'business', true, 'Faker'),
            'photo' => $this->faker->imageUrl(640, 480, 'business', true, 'Faker'),
            'environment' => $this->faker->randomElement(['development', 'staging', 'production']),
            'type' => $this->faker->randomElement(['payment', 'marketplace', 'crowdfunding', 'e-commerce', 'social', 'other']),
            'category' => $this->faker->randomElement(['finance', 'entertainment', 'education', 'health', 'news', 'social', 'other']),
            'support_email' => $this->faker->companyEmail,
            'admin_url' => $this->faker->url,
            'admin_email' => $this->faker->companyEmail,
            'public_key' => Str::random(32),
            'secret_key' => Str::random(64),
            'auto_login' => $this->faker->randomElement(['enabled', 'disabled', 'blocked']),
            'auto_register' => $this->faker->randomElement(['enabled', 'disabled', 'blocked']),
            'metadata' => $this->faker->optional()->text,
            'settings' => $this->faker->optional()->text,
            'api_url' => $this->faker->url,
            'api_keys' => $this->faker->text,
            'webhook_url' => $this->faker->url,
            'callback_url' => $this->faker->url,
            'redirect_url' => $this->faker->url,
            'country' => $this->faker->country,
            'status' => $this->faker->randomElement(['active', 'inactive', 'suspended', 'pending', 'maintenance']),
        ];
    }
}
