<?php
// namespace Database\Factories;

// use Illuminate\Database\Eloquent\Factories\Factory;
//
// class ElderFactory extends Factory
// {
//     public function definition()
//     {
//         return [
//             'name' => $this->faker->name,
//             'age' => $this->faker->numberBetween(60, 100),
//             'gender' => $this->faker->randomElement(['Male', 'Female']),
//             'date_of_birth' => $this->faker->date,
//             'address' => $this->faker->address,
//             'phone_number' => $this->faker->phoneNumber,
//             'email' => $this->faker->unique()->safeEmail,
//             'photo_url' => $this->faker->imageUrl(200, 200, 'people'), // Placeholder image URL
//             'background_story' => $this->faker->paragraph,
//             'current_needs' => $this->faker->paragraph,
//             'medical_history' => $this->faker->paragraph,
//             'support_status' => $this->faker->randomElement(['Active', 'Inactive']),
//         ];
//     }
// }
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ElderFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'age' => $this->faker->numberBetween(60, 100),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'date_of_birth' => $this->faker->date,
            'address' => $this->faker->address,
            'phone_number' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'photo_url' => 'https://randomuser.me/api/portraits/' . $this->faker->randomElement(['men', 'women']) . '/' . $this->faker->numberBetween(1, 99) . '.jpg', // Ensure this line is present
            'background_story' => $this->faker->paragraph,
            'current_needs' => $this->faker->paragraph,
            'medical_history' => $this->faker->paragraph,
            'support_status' => $this->faker->randomElement(['Active', 'Inactive']),
        ];
    }
}
