<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Passwork;
use App\Models\Passgroup;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory(3)->create()->each(function (User $user) {

            $user->passgroups()->saveMany(Passgroup::factory(2)->make());

            Passwork::factory(3)->create(['user_id' => $user->id, 'passgroup_id' => $user->id]);

            Passwork::factory(3)->create(['user_id' => $user->id]);

        });


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
