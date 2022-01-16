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

    public function getBookDetails($title): array
    {
        $bookDetails = $this->bookRepository->getBookDetails($title);

        if ($bookDetails == null) {
            return [];
        }

        return $this->addAuthorDetails($bookDetails);
    }

    private function addAuthorDetails($bookDetails){

        $number =0 ;
        foreach ($bookDetails as $book){
            $authorDetails = $this->authorRepository->getAuthorDetailsFromAuthorId($book["author_id"]);
            $bookDetails[$number]["firstname"] =$authorDetails->first_name;
            $bookDetails[$number]["lastname"] =$authorDetails->last_name;
            $bookDetails[$number]["email"] =$authorDetails->email;
            $number++;
        }
        return $bookDetails;
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

    public function getDataOfBook($id){

        return $this->bookRepository->getDataOfBook($id);
    }
}
