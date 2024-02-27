<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\AnaerobicDigester;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnaerobicDigester>
 */
class AnaerobicDigesterFactory extends Factory
{
    protected $model = AnaerobicDigester::class;

    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'status' => fake()->randomElement(['used','unused']),
            'gas_amount' => fake()->randomElement([1000,5000,300,250,2500,500,8000]),
            'qr_code'=> fake()->uuid(),
        ];
    }
}
