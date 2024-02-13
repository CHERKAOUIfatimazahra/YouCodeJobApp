<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Announcement;
use App\Models\Company;
use App\Models\Skill;
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
        // Role::create([
        //     'name' => 'learner'
        // ]);
        // Role::create([
        //     'name' => 'admin'
        // ]);
        
        // $user = User::create([
        //     'name' => 'Admin',
        //     'email' => 'fatimazahra@gmail.com',
        //     'password' => bcrypt('123')
        // ]);
        
        // $user->assignRole('admin');

        // $learner = User::factory()->create();
        // $learner->assignRole('learner');
        
        Company::factory(2)->create();

        Announcement::factory(6)->create();

        Skill::factory(5)->create();

        $announcement = Announcement::first();
        $skill = Skill::all();

        $announcement->skills()->attach($skill);

        $skills = Skill::factory(3)->create();




       









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
