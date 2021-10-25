<?php

namespace App\Repository;

interface IAuthorRepository
{
    function getAuthorIdFromAuthorName($authorName);

    function getAuthorNameFromAuthorId($authorId);
}
