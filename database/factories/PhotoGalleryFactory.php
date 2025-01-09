<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PhotoGallery;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PhotoGallery>
 */
class PhotoGalleryFactory extends Factory
{
    protected $model = PhotoGallery::class;

    public function definition()
    {
        return [
            'event_id' => \App\Models\Event::factory(),
            'photo_url' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph,
        ];
    }
}
