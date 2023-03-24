<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name'=>'staff']);
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'client']);

        // \App\Models\User::factory(10)->create();
    }
}
