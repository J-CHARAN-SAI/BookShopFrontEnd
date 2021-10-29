<?php

namespace App\Repository;

interface IBookRepository
{

    function getBookDetails($bookId);

    function deleteBook($bookId): int;

    function addBook($bookDetails): bool;

    function updateBook($bookId,$title , $price): int;
}
