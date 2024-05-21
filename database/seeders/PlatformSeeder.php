<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Platform::factory()->count(1)->create();
        // // Define the platforms to seed
        // $platforms = [
        //     ['name' => 'Platform A', 'active' => true],
        //     ['name' => 'Platform B', 'active' => true],
        //     ['name' => 'Platform C', 'active' => true],
        //     // Add more platforms as needed
        // ];

        // // Seed the platforms
        // foreach ($platforms as $platform) {
        //     Platform::create($platform);
        // }
    }
}
