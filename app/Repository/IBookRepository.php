<?php

namespace App\Repository;

interface IBookRepository
{

    function getBookDetails($bookName);

    function deleteBook($bookName): int;

    function addBook($bookDetails): bool;

    function updateBook($bookName, $price): int;
}
