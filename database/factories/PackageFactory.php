<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $durationUnits = ['day', 'week', 'month', 'year'];
        $discountUnits = ['percentage', 'fixed'];
        $statuses = ['draft', 'published', 'archived', 'deleted', 'limited'];

        return [
            'name' => $this->faker->word,
            'slug' => Str::slug($this->faker->unique()->words(2, true)),
            'uid' => $this->faker->unique()->uuid,
            'description' => $this->faker->sentence,
            'url' => $this->faker->url,
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'currency' => 'USD',
            'duration' => $this->faker->numberBetween(1, 12),
            'duration_unit' => $durationUnits[array_rand($durationUnits)],
            'trial' => $this->faker->numberBetween(1, 30),
            'trial_unit' => $durationUnits[array_rand($durationUnits)],
            'discount' => $this->faker->numberBetween(0, 100),
            'discount_unit' => $discountUnits[array_rand($discountUnits)],
            'type' => 'subscription',
            'category' => 'other',
            'status' => $statuses[array_rand($statuses)],
        ];
    }
}
