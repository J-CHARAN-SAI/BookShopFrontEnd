<?php

namespace App\Repository;

use App\Models\Authors;

class AuthorRepository implements IAuthorRepository
{

    public function getAuthorIdFromAuthorName($authorName)
    {
        return Authors::query()->where('authors.first_name', '=', $authorName)->first('id');
    }

    public function getAuthorNameFromAuthorId($authorId)
    {
        return Authors::query()->where('authors.id', '=', $authorId)->first(['first_name','last_name']);
    }
}
