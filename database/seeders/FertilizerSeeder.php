<?php

namespace Database\Seeders;

use App\Models\Fertilizer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FertilizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fertilizer::factory()->count(6)->create();
    }
}
