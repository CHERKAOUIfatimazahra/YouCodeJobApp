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
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // Role::create([
        //     'name' => 'learner'
        // ]);
        // Role::create([
        //     'name' => 'admin'
        // ]);
        
        // $user = User::create([
        //     'name' => 'Admin',
        //     'email' => 'fatimazahra1@gmail.com',
        //     'password' => bcrypt('123')
        // ]);
       
        // $user->assignRole('admin');
        // $users = User::find(1);

// $role = Role::findByName('admin');
// $role->assignRole('admin');
// $role->users()->attach($users);

        // $learner = User::factory()->create();
        // $learner->assignRole('learner');
        
        // Company::factory(2)->create();

        // Announcement::factory(6)->create();

        // Skill::factory(5)->create();

        // $announcement = Announcement::first();
        // $skill = Skill::all();

        // $announcement->skills()->attach($skill);

        // $skills = Skill::factory(3)->create();




       









        // User::factory()->create([
        //       
        //     'email' => 'test@example.com',
        // ]);

        // DB::table('companies')->insert([
        //     'name' => 'youcode',
        //     'description' => 'kelksfkjshflhrhfsr',

        // ]);

        Company::factory()->count(10)->create();

        // DB::table('companies')->insert([
        //     'name'=>'youcode',
        //     'description'=>'jhkjhgkjxhkghkdf',
        // ]);

    }
}
