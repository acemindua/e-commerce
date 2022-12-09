<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Users permissions
        Permission::firstOrCreate(['name' => 'user-view']);
        Permission::firstOrCreate(['name' => 'user-add']);
        Permission::firstOrCreate(['name' => 'user-edit']);
        Permission::firstOrCreate(['name' => 'user-delete']);
        // Category permissions
        Permission::firstOrCreate(['name' => 'category-view']);
        Permission::firstOrCreate(['name' => 'category-add']);
        Permission::firstOrCreate(['name' => 'category-edit']);
        Permission::firstOrCreate(['name' => 'category-delete']);
    }
}
