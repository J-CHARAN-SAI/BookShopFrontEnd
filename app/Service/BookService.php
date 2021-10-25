<?php

namespace App\Service;

use App\Repository\AuthorRepository;
use App\Repository\BookRepository;

class BookService
{

    private $bookRepository;
    private $authorRepository;

    public function __construct(BookRepository $bookRepository, AuthorRepository $authorRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->authorRepository = $authorRepository;
    }

    public function getBookDetails($bookName): array
    {
        $bookDetails = $this->bookRepository->getBookDetails($bookName);
        if ($bookDetails == null) {
            return [];
        }

        $authorDetails = $this->authorRepository->getAuthorNameFromAuthorId($bookDetails->author_id);

        $authorName = $authorDetails->first_name." ".$authorDetails->lastname;

        return array("Title" => $bookDetails->title, "Price" => $bookDetails->price, "Author Name" => $authorName);

    }

    public function deleteBook($bookName): string
    {
        $isDeleted = $this->bookRepository->deleteBook($bookName);
        if ($isDeleted == 1) {
            return "Book is successfully Deleted";
        }
        return "Book is not present";
    }


    public function addBook($title, $price, $author): string
    {
        $authorDetails = $this->authorRepository->getAuthorIdFromAuthorName($author);

        $bookDetails = array('title' => $title, 'price' => $price, 'author_id' => $authorDetails->id);

        if ($this->bookRepository->addBook($bookDetails)) {
            return "Book is successfully added";
        }
        return "We are not able to add a book";
    }

    public function updateBook($title, $price): string
    {
        if ($this->bookRepository->updateBook($title, $price) == 1) {
            return "Books is successfully Updated";
        }
        return "Books is not available";
    }
}
