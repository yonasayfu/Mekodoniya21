<?php

namespace Database\Seeders;

use App\Models\Supporter;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class SupporterSeeder extends Seeder
{
    public function run(): void
    {
        $seedDate = Carbon::create(2025, 1, 1);

        $supporters = Supporter::factory()->count(10)->create();

        $supporters->each(function ($supporter) use ($seedDate) {
            $seedDateCopy = $seedDate->copy(); // Create a copy *inside* the loop

            Log::info("Starting donations for supporter {$supporter->id}");

            for ($i = 0; $i < 12; $i++) {
                $date = $seedDateCopy->copy()->subMonths(11 - $i)->toDateString();
                $amount = rand(50, 500);

                $supporter->donations()->create([
                    'amount' => $amount,
                    'date' => $date,
                    'total_needed' => 10000, // Make sure this column exists
                ]);
            }
            Log::info("Finished donations for supporter {$supporter->id}");
        });
    }
}