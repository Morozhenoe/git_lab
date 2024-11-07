<?php

namespace Database\Factories;

use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Holiday>
 */
class HolidayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'contact_info' => $this->faker->phoneNumber(),
            'date_of_holiday' => $this->faker->date(),
            'count_of_guests' => $this->faker->numberBetween(10, 100),
            'place' => $this->faker->address(),
            'status' => $this->faker->numberBetween(0, 10),
            'priority' => $this->faker->numberBetween(0, 100),
            'supervisor_id' => Supervisor::all()->random()->id,
        ];
    }
}
