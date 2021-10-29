<?php

namespace Database\Seeders;

use App\Models\Authors;
use App\Models\Books;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Authors::factory(3)->create();

        Books::factory(3)->create();
    }
}
