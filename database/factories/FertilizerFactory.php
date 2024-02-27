<?php

namespace Database\Factories;

use App\Models\Fertilizer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fertilizer>
 */
class FertilizerFactory extends Factory
{
    protected $model = Fertilizer::class;

    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'price' => fake()->randomElement([100,250,300,240,255,500,80]),
            'amount' => fake()->randomElement([100,50,300,20,250,500,80]),

        ];
    }
}
