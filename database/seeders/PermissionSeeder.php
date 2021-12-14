<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = Permission::factory();

        $gameWrite = $factory->create([
            'name' => 'game:write',
            'description' => 'Create or update game records',
        ]);
        $gameRead = $factory->create([
            'name' => 'game:read',
            'description' => 'Read game records',
        ]);

        $admin = Role::where('name', 'admin')->first();
        $admin->permissions()->attach([$gametRead->id, $gameWrite->id]);
        Role::where('name', 'user')->first()->permissions()->attach($gameRead);
    }
}
