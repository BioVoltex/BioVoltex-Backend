<?php

namespace Database\Factories;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chat>
 */
class ChatFactory extends Factory
{
    protected $model = Chat::class;

    public function definition(): array
    {
        return [
            'last_seen' => fake()->date('Y-m-d H:i:s'),
            'sender_name' => User::all()->random()->name,
            'receiver_name' => User::all()->random()->name,
        ];
    }
}
