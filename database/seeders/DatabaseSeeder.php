<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\ChatSeeder;
use Database\Seeders\MessageSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ChatSeeder::class,
            MessageSeeder::class,
            AnaerobicDigesterSeeder::class,
            DeviceSeeder::class,
            FertilizerSeeder::class,
        ]);
    }
}
