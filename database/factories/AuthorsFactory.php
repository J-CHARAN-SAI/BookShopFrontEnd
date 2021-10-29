<?php

namespace Database\Factories;

use App\Models\Authors;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Authors::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       $firstNames = ['Richard', 'John', 'Charlie'];
       $lastNames = ['Robert', 'Doe', 'Brown'];
       $emails = ['whitefalcon@gmail.com', 'pinkflamingo@gmail.com', 'babybuffalo@gmail.com'];
        return [

            'first_name' => $firstNames[array_rand($firstNames)],
            'last_name' => $lastNames[array_rand($lastNames)],
            'email' =>  $emails[array_rand($emails)]
        ];

    }
}
