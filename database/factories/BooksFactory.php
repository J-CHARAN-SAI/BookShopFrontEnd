<?php

namespace Database\Factories;

use App\Models\Authors;
use App\Models\Books;
use Illuminate\Database\Eloquent\Factories\Factory;

class BooksFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Books::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $titles =['The Last Drink','Darcy Lockson','Hakuna Matata'];
        $price =['300','200','999'];
        return [
            'title'=>$titles[array_rand($titles)],
            'price'=>$price[array_rand($price)],
            'author_id' => function () {
                return Authors::inRandomOrder()->first()->id;
            }
        ];
    }
}
