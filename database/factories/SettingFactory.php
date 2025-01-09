<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Setting;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    protected $model = Setting::class;

    public function definition()
    {
        return [
            'key' => $this->faker->word,
            'value' => $this->faker->word,
            'description' => $this->faker->sentence,
        ];
    }
}
