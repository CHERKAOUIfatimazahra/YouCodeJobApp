<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Announcement;
use App\Models\Company;
use App\Models\Skills;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();
        
        Company::factory()->count(10)->create();

        Announcement::factory()->count(15)->create();

        Skills::factory(10)->create();

        // User::factory()->create([
        //       
        //     'email' => 'test@example.com',
        // ]);

        // DB::table('companies')->insert([
        //     'name' => 'youcode',
        //     'description' => 'kelksfkjshflhrhfsr',

        // ]);

        // Company::factory()->count(10)->create();

        // DB::table('companies')->insert([
        //     'name'=>'youcode',
        //     'description'=>'jhkjhgkjxhkghkdf',
        // ]);

    }
}
