<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::factory(10)->create();

        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@app.com',
            'email_verified_at' => now(),
            'role' => 'superadmin',
            'password' => Hash::make('1234'),
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@app.com',
            'email_verified_at' => now(),
            'role' => 'admin',
            'password' => Hash::make('1234'),
        ]);
    }
}
