<?php

namespace Tests\Feature;

use Tests\TestCase;

class BookControllerTest extends TestCase
{

    /**
     * @test
     */
    public function getBook()
    {
        $response = $this->get('/books/1');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function addBook()
    {
        $response = $this->post('/books', ['title' => 'The Last Song', 'price' => 300, 'author' =>
                                                                                                ["first_name" => "Regina",
                                                                                                    "last_name" => "Sharon" ,
                                                                                                    "email" => "reginasharon@gmail.com"]]);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function updateBook()
    {
        $response = $this->put('/books/1', ['title'=>'Hakuna Matata','price' => 300]);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function deleteBook()
    {
        $response = $this->delete('/books/1');

        $response->assertStatus(200);
    }
}
