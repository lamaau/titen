<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Admin']);

        User::create([
            'id' => Str::uuid()->toString(),
            'username' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('secret123'),
            'email_verified_at' => now(),
        ])->assignRole('Admin');
    }
}
