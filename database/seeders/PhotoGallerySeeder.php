<?php


namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PhotoGallery;
use App\Models\Event; // Ensure the Event model is imported

class PhotoGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all event IDs from the events table
        $eventIds = Event::pluck('id')->toArray();

        // Array of sample descriptions for the photos
        $descriptions = [
            'Beautiful sunset over the mountains',
            'A serene lake surrounded by trees',
            'City skyline at night',
            'Colorful flowers in a garden',
            'A cozy cabin in the woods',
            'A peaceful beach with clear blue water',
            'Snow-covered mountains under a clear sky',
            'A bustling market in a vibrant city',
            'A quiet forest path in autumn',
            'A majestic waterfall in the jungle',
        ];

        // Loop to create 10 photo gallery entries
        for ($i = 0; $i < 10; $i++) {
            PhotoGallery::create([
                'photo_url' => 'https://picsum.photos/1200/800?random=' . $i, // Random image URL from Picsum
                'description' => $descriptions[$i], // Assign a description from the array
                'imageable_id' => 1, // Example: ID of the related model (e.g., Event, Elder, etc.)
                'imageable_type' => Event::class, // Example: Class name of the related model
                'event_id' => $eventIds[array_rand($eventIds)], // Assign a random event ID
            ]);
        }
    }
}