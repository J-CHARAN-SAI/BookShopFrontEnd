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
        $response = $this->post('/books', ['title' => 'The Last Song', 'price' => 300, 'author' => 'Regina']);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function updateBook()
    {
        $response = $this->put('/books/1', ['price' => 300]);

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
