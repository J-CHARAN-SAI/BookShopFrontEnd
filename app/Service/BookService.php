<?php

namespace App\Service;

use App\Repository\IAuthorRepository;
use App\Repository\IBookRepository;

class BookService
{

    private $bookRepository;
    private $authorRepository;

    public function __construct(IBookRepository $bookRepository, IAuthorRepository $authorRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->authorRepository = $authorRepository;
    }

    public function getBookDetails($bookId): array
    {
        $bookDetails = $this->bookRepository->getBookDetails($bookId);
        if ($bookDetails == null) {
            return [];
        }
        $authorDetails = $this->authorRepository->getAuthorDetailsFromAuthorId($bookDetails->author_id);


        return array("Title" => $bookDetails->title, "Price" => (int)$bookDetails->price, "Author" => $authorDetails);

    }

    public function deleteBook($bookId): string
    {
        $isDeleted = $this->bookRepository->deleteBook($bookId);
        if ($isDeleted == 1) {
            return "Book is deleted successfully";
        }
        return "Book is not present";
    }


    public function addBook($title, $price, $author): string
    {

        $authorDetails = $this->authorRepository->getAuthorIdFromAuthorName($author['first_name']);

        if ($authorDetails == null) {
            $authorId =$this->authorRepository->addAuthor($author);
            $bookDetails =array('title' => $title, 'price' => $price, 'author_id' => $authorId );

        }else{
            $bookDetails = array('title' => $title, 'price' => $price, 'author_id' => $authorDetails->id);
        }

        if ($this->bookRepository->addBook($bookDetails)) {
            return "Book is added successfully";
        }
        return "We are not able to add a book";
    }

    public function updateBook($bookId, $title, $price): string
    {
        if ($this->bookRepository->updateBook($bookId, $title, $price) == 1) {
            return "Book is updated successfully";
        }
        return "Book is not available";
    }
}
