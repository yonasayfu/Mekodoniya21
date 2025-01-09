<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Supporter;
use Illuminate\Database\Seeder;

class SupporterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supporter::factory()->count(10)->create();
    }
}
