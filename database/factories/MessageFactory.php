<?php

namespace Database\Factories;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{


    protected $model = Message::class;

    public function definition(): array
    {
        return [
            'chat_id' => Chat::all()->random()->id,
            'status' => fake()->randomElement(['read','unread']),
            'content' => fake()->sentence(10),
            'sender_name' => User::all()->random()->name,
            'receiver_name' => User::all()->random()->name,

        ];
    }
}
