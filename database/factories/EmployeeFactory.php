<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->name(),
            'email'=> $this->faker->unique()->safeEmail(),
            'gender'=> $this->faker->randomElement(['Male', 'Female']),
            'age'=> $this->faker->numberBetween(18, 50),
            'phone'=> $this->faker->phoneNumber(),
            'photo'=> $this->faker->imageUrl(),
            'team_id'=> $this->faker->numberBetween(1, 25),
            'role_id'=> $this->faker->numberBetween(1, 20),
        ];
    }
}
