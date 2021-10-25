<?php

namespace App\Repository;

use App\Models\Books;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BookRepository implements IBookRepository
{


    /**
     * @param $bookName
     * @return Builder|Model|object|null
     */
    public function getBookDetails($bookName)
    {
        return Books::query()->where('books.title', '=', $bookName)->first();
    }

    public function deleteBook($bookName): int
    {
        return Books::query()->where('books.title', '=', $bookName)->delete();
    }

    public function addBook($bookDetails): bool
    {
        return Books::query()->insert($bookDetails);
    }

    public function updateBook($bookName, $price): int
    {
        return DB::table('books')->where('books.title', '=', $bookName)->update(['books.price' => $price]);
//        return Books::query()->where('books.title','=',$bookName)->update(['books.price'=>$price]);

    }
}
