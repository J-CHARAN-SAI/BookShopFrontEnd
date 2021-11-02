<?php

namespace App\Http\Controllers;

use App\Service\BookService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function getBook($bookId): JsonResponse
    {
        $bookDetails = $this->bookService->getBookDetails($bookId);
        return response()->json($bookDetails);
    }

    public function addBook(Request $request): JsonResponse
    {
        $bookAdded = $this->bookService->addBook($request->all()["title"], $request->all()["price"], $request->all()["author"]);
        return response()->json($bookAdded, 201);
    }

    public function updateBook($bookId, Request $request): JsonResponse
    {
        $bookUpdated = $this->bookService->updateBook($bookId ,$request->all()["title"] , $request->all()["price"]);
        return response()->json($bookUpdated);
    }

    public function deleteBook($bookId): JsonResponse
    {
        $isDeleted = $this->bookService->deleteBook($bookId);
        return response()->json($isDeleted);
    }
}
