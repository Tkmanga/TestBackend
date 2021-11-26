<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory(10)->create();
        Project::factory(10)->create();
        foreach (Project::all() as $project) {
            $users = \App\Models\User::inRandomOrder()->take(rand(1,3))->pluck('id');
            $project->users()->attach($users);
        }

    }
}
