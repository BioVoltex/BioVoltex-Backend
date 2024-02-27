<?php

namespace Database\Factories;

use App\Models\Device;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Device>
 */
class DeviceFactory extends Factory
{
    protected $model = Device::class;

    public function definition(): array
    {
        return [
            'device_name' => fake()->randomElement(['TV','Fridge','Motor','Washing Machine',
            'Freezer','Lamp','Microwave','Iron','Kattle','Charger','Cooler','Fan']),
            'device_brand' => fake()->randomElement(['Samsung','LG','Ariston','Beko',
            'Fresh','Kiriazi','Mienta','Tornado','Toshiba','Union Air','Zanussi','Sonai']),
            'device_consumption' => fake()->randomElement([5000,700,450,2000,3600,790,480]),

        ];
    }
}
