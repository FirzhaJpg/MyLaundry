<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminRole = Role::query()->firstOrCreate(['name' => 'admin']);
        $userRole = Role::query()->firstOrCreate(['name' => 'user']);

        User::query()->firstOrCreate(
            ['email' => 'admin1@gmail.com'],
            [
                'role_id' => $adminRole->id,
                'name' => 'Admin MyLaundry',
                'phone' => '080000000001',
                'password' => Hash::make('admin123'),
            ]
        );

        User::query()->firstOrCreate(
            ['email' => 'user@mylaundry.test'],
            [
                'role_id' => $userRole->id,
                'name' => 'User MyLaundry',
                'phone' => '080000000002',
                'password' => Hash::make('password'),
            ]
        );
    }
}
