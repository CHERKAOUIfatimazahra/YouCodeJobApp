<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
 

    public function definition(): array
    {
        return [
            'title' => Str::random(10),
            'description' => $this->faker->paragraph(),
            'date' => $this->faker->dateTime(), 
            'company_id' => $this->faker->numberBetween(DB::table('companies')->min('id'),DB::table('companies')->max('id')),
            // 'company_id' => $this->faker->numberBetween(1, 3),
        ];
}

}
