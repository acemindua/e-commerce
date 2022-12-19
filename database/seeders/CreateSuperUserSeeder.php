<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateSuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'SuperUser',
            'email' => 'admin@admin.com',
            'password' => Hash::make("admin@admin"),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        Role::create([
            'name' => 'super-user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Role::create([
            'name' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        $user->assignRole('super-user');
    }
}
