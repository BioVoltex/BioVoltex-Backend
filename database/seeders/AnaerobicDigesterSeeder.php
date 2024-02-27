<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AnaerobicDigester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnaerobicDigesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AnaerobicDigester::factory()->count(8)->create();
    }
}
