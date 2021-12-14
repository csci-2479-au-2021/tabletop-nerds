<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = Role::factory();

        $factory->create(['name' => 'admin']);
        $factory->create(['name' => 'user']);
    }
}