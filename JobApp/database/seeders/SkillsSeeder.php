<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define an array of skills to seed into the database
        $skills = [
            'HTML',
            'CSS',
            'JavaScript',
            'PHP',
            'Python',
            'Java',
            'laravel',
            'bootstrap',
            
        ];

        // Loop through the array and create a new Skill model for each skill
        foreach ($skills as $skill) {
            Skill::create([
                'skill' => $skill,
            ]);
        }
    }
}
