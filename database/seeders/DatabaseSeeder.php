<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        $role = \App\Models\Role::factory()->create(['name' => 'admin']);


        \App\Models\User::factory()->create([
            'name' => 'Cindy Rolexza',
            'email' => 'cindyrolexza15@gmail.com',
            'password' => bcrypt('admin'),
            'role_id' => $role->id
        ]);
    }
}
