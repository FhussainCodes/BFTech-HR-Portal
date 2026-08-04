<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Register;
use Illuminate\Support\Facades\Hash;

class RegisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
    Register::create([

        'first_name' => 'HR',

        'last_name' => 'Admin',

        'email' => 'hr@bftech.com',

        'age' => 36,

        'designation' => 'HR Manager',

        'phone_number' => '03001234567',

        'city' => 'Lahore',

        'country' => 'Pakistan',

        'password' => Hash::make('Password$456'),

        'profile_image' => null,

        'role' => 'hr',

    ]);
    Register::factory()->count(20)->create();

}
}
