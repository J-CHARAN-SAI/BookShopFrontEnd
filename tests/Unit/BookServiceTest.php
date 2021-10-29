<?php

namespace Tests\Unit;

use App\Repository\IAuthorRepository;
use App\Repository\IBookRepository;
use App\Service\BookService;
use stdClass;
use Tests\TestCase;
use function PHPUnit\Framework\assertEquals;

class BookServiceTest extends TestCase
{

    private $bookRepositoryMock;
    private $authorRepositoryMock;
    private $bookService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->bookRepositoryMock = $this->createMock(IBookRepository::class);
        $this->authorRepositoryMock = $this->createMock(IAuthorRepository::class);
        $this->bookService = new BookService($this->bookRepositoryMock, $this->authorRepositoryMock);
    }

    /**
     * @test
     */
    public function shouldReturnBookDetailsWhenValidBookIdIsPassed()
    {
        $bookDetails = new stdClass();
        $bookDetails->id = 12;
        $bookDetails->title = "The Last Song";
        $bookDetails->price = 200;
        $bookDetails->author_id = 2;
        $this->bookRepositoryMock->method('getBookDetails')->willReturn($bookDetails);
        $authorDetails = new stdClass();
        $authorDetails->first_name = "Nichols";
        $authorDetails->last_name = "Sparks";
        $this->authorRepositoryMock->method('getAuthorNameFromAuthorId')->willReturn($authorDetails);
        $authorName = $authorDetails->first_name . " " . $authorDetails->last_name;

        $expectedBookDetails = array("Title" => $bookDetails->title, "Price" => $bookDetails->price, "Author Name" => $authorName);
        $actualBookDetails = $this->bookService->getBookDetails($bookDetails->id);

        assertEquals($expectedBookDetails, $actualBookDetails);
    }

    /**
     * @test
     */
    public function shouldReturnEmptyArrayWhenInvalidBookIdIsPassed()
    {
        $expectedBookDetails = array();
        $this->bookRepositoryMock->method('getBookDetails')->willReturn(null);
        $actualBookDetails = $this->bookService->getBookDetails("");

        assertEquals($expectedBookDetails, $actualBookDetails);
    }

    /**
     * @test
     */
    public function shouldAddBookWhenAuthorAvailable()
    {
        $authorDetails = new stdClass();
        $authorDetails->id = "13";

        $this->authorRepositoryMock->method('getAuthorIdFromAuthorName')->willReturn($authorDetails);
        $this->bookRepositoryMock->method('addBook')->willReturn(true);
        $actualMessage = $this->bookService->addBook('Never wants to die', 300, 'Regina');

        assertEquals("Book is successfully added", $actualMessage);
    }

    /**
     * @test
     */
    public function shouldNotAddBookWhenAuthorNotAvailable()
    {
        $authorDetails = new stdClass();
        $authorDetails->id = "13";

        $this->authorRepositoryMock->method('getAuthorIdFromAuthorName')->willReturn($authorDetails);
        $this->bookRepositoryMock->method('addBook')->willReturn(false);
        $actualMessage = $this->bookService->addBook('Never wants to die', 300, 'Harsha');

        assertEquals("We are not able to add a book", $actualMessage);
    }

    /**
     * @test
     */
    public function shouldDeleteBookWhenBookIsPresent()
    {
        $this->bookRepositoryMock->method('deleteBook')->willReturn(1);
        $actualMessage = $this->bookService->deleteBook(1);

        assertEquals("Book is successfully deleted", $actualMessage);
    }

    /**
     * @test
     */
    public function shouldNotDeleteBookWhenBookIsNotPresent()
    {
        $this->bookRepositoryMock->method('deleteBook')->willReturn(0);
        $actualMessage = $this->bookService->deleteBook(100);

        assertEquals("Book is not present", $actualMessage);
    }

    /**
     * @test
     */
    public function shouldUpdateBookDetailsWhenBookIsPresent()
    {
        $this->bookRepositoryMock->method('updateBook')->willReturn(1);
        $actualMessage = $this->bookService->updateBook(1,"Hakuna Matata", 300);

        assertEquals("Books are successfully updated", $actualMessage);
    }

    /**
     * @test
     */
    public function shouldNotUpdateBookDetailsWhenBookIsNotPresent()
    {
        $this->bookRepositoryMock->method('updateBook')->willReturn(0);
        $actualMessage = $this->bookService->updateBook(3000, "Hakuna Matata",100);

        assertEquals("Book is not available", $actualMessage);
    }
}
