<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    private $eventTypes = [
        'Wedding' => [
            'type' => 'wedding ceremony',
            'images' => [
                'https://cdn.pixabay.com/photo/2016/11/22/19/05/dark-1850120_1280.jpg',
                'https://cdn.pixabay.com/photo/2017/08/06/20/11/wedding-2595862_1280.jpg',
                'https://cdn.pixabay.com/photo/2014/11/13/17/04/heart-529607_1280.jpg',
            ],
        ],
        'Birthday' => [
            'type' => 'birthday party',
            'images' => [
                'https://cdn.pixabay.com/photo/2015/12/08/00/28/birthday-1081488_1280.jpg',
                'https://cdn.pixabay.com/photo/2019/09/30/18/41/birthday-4516176_1280.jpg',
                'https://cdn.pixabay.com/photo/2016/11/22/18/52/cake-1850011_1280.jpg',
            ],
        ],
        'Death Rember' => [
            'type' => 'memorial service',
            'images' => [
                'https://cdn.pixabay.com/photo/2017/08/01/01/33/bereavement-2562320_1280.jpg',
                'https://cdn.pixabay.com/photo/2016/10/30/05/43/cemetery-1782123_1280.jpg',
                'https://cdn.pixabay.com/photo/2014/09/21/04/38/cemetery-454410_1280.jpg',
            ],
        ],
        'Graduations' => [
            'type' => 'graduation ceremony',
            'images' => [
                'https://cdn.pixabay.com/photo/2019/05/04/18/51/graduation-4178948_1280.jpg',
                'https://cdn.pixabay.com/photo/2014/05/03/00/50/graduation-336021_1280.jpg',
                'https://cdn.pixabay.com/photo/2019/07/22/07/00/graduation-4354467_1280.jpg',
            ],
        ],
        'Nika' => [
            'type' => 'religious ceremony',
            'images' => [
                'https://cdn.pixabay.com/photo/2017/09/21/19/06/woman-2773007_1280.jpg',
                'https://cdn.pixabay.com/photo/2019/11/11/11/31/mosque-4618273_1280.jpg',
                'https://cdn.pixabay.com/photo/2016/11/08/05/54/agriculture-1807581_1280.jpg',
            ],
        ],
    ];

    public function definition()
    {
        // Select random category first
        $category = $this->faker->randomElement(array_keys($this->eventTypes));

        // Get corresponding type and random image for that category
        $eventInfo = $this->eventTypes[$category];

        // Generate random date between now and 6 months in the future
        $eventDate = $this->faker->dateTimeBetween('now', '+6 months');

        // Determine status based on date
        $now = new \DateTime();
        $status = match (true) {
            $eventDate < $now => $this->faker->randomElement(['done', 'cancelled']),
            $eventDate->format('Y-m-d') === $now->format('Y-m-d') => 'in_progress',
            default => 'upcoming'
        };

        return [
            'name' => $this->faker->sentence,
            'type' => $eventInfo['type'],
            'category' => $category,
            'date' => $eventDate,
            'start_time' => $this->faker->time,
            'end_time' => $this->faker->time,
            'location' => $this->faker->address,
            'facility_id' => \App\Models\Facility::factory(),
            'staff_id' => \App\Models\Staff::factory(),
            'catering_id' => \App\Models\Catering::factory(),
            'custom_requirements' => $this->faker->paragraph,
            'image_url' => $this->faker->randomElement($eventInfo['images']),
            'status' => $status,
        ];
    }
}
