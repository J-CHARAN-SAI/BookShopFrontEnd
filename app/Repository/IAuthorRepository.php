<?php

namespace App\Repository;

interface IAuthorRepository
{
    function getAuthorIdFromAuthorName($authorName);

    function getAuthorDetailsFromAuthorId($authorId);

    function addAuthor($author);
}
