<?php

namespace App\Repository;

use App\Models\Books;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BookRepository implements IBookRepository
{


    /**
     * @param $bookId
     * @return Builder|Model|object|null
     */
    public function getBookDetails($bookId)
    {
        return Books::query()->where('books.id', '=', $bookId)->first();
    }

    public function deleteBook($bookId): int
    {
        return Books::query()->where('books.id', '=', $bookId)->delete();
    }

    public function addBook($bookDetails): bool
    {
        return Books::query()->insert($bookDetails);
    }

    public function updateBook($bookId,$title, $price): int
    {
        return DB::table('books')->where('books.id', '=', $bookId)->update(['books.title' => $title,'books.price' => $price]);
    }
}
