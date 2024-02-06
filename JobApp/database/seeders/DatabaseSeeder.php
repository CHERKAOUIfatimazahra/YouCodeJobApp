<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Announcement;
use App\Models\Company;
use App\Models\Skills;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $learner = User::factory()->create();
        
        // Company::factory()->create();

        // Announcement::factory()->create();

        // Skills::factory()->create();

        // Role::create([
        //     'name' => 'learner'
        // ]);
        
        // $user = User::create([
        //     'name' => 'Admin',
        //     'email' => 'admhin@uuuuu.com',
        //     'password' => bcrypt('123')
        // ]);
        
        // $user->assignRole('admin');
        $learner->assignRole('learner');
        

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
