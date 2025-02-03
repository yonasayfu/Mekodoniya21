<?php // database/seeders/TestimonialSeeder.php

use Illuminate\Database\Seeder;
use App\Models\Testimonial;
use App\Models\Supporter;

class TestimonialSeeder extends Seeder {
    public function run() {
        $quotes = [
            "Seeing elders smile gives me purpose every month",
            "Giving back is the greatest act of humanity",
            "We rise by lifting others - this is my mantra",
            "Every contribution plants a seed of hope",
            "Together, we can rewrite elder care history"
        ];

        foreach (Supporter::all() as $supporter) {
            Testimonial::create([
                'content' => $quotes[array_rand($quotes)],
                'author_name' => $supporter->name,
                'approval_status' => 'approved',
                'supporter_id' => $supporter->id
            ]);
        }
    }
}