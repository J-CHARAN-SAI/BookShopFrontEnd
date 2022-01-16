<?php

namespace App\Repository;

use App\Models\Books;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BookRepository implements IBookRepository
{



    public function getBookDetails($title): array
    {
        $title="%".$title."%";
        return Books::query()->where('books.title', 'like', $title)->get()->toArray();
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

    public function getDataOfBook($id): array
    {
        return Books::query()->where('books.id', '=', $id )->first()->toArray();
    }
}
