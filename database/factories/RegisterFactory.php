<?php

namespace Database\Factories;

use App\Models\Register;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
// use App\Models\Register;

/**
 * @extends Factory<Register>
 */
class RegisterFactory extends Factory
{
    protected $model = Register::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
public function definition(): array
    {
        return [

            'first_name' => fake()->firstName(),

            'last_name' => fake()->lastName(),

            'email' => fake()->unique()->safeEmail(),

            'age' => fake()->numberBetween(19,60),

            'designation' => fake()->randomElement([
                'Software Engineer',
                'Frontend Developer',
                'Backend Developer',
                'UI/UX Designer'
            ]),

            'phone_number' => '03' . fake()->numerify('#########'),

            'city' => fake()->city(),

            'country' => 'Pakistan',

            'password' => Hash::make('Password$456'),

            'profile_image' => null,

            'confirm_password' => Hash::make('Password$456'),

            'role' => 'employee',

        ];
    }
}
