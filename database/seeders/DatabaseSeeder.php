<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\ChatSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\DeviceSeeder;
use Database\Seeders\MessageSeeder;
use Database\Seeders\AnaerobicDigesterSeeder;

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
            FertilizerSeeder::class,
            AnaerobicDigesterSeeder::class,
            DeviceSeeder::class,
        ]);
    }
}
