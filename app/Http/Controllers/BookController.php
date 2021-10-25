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

    public function getBook($bookName): JsonResponse
    {
        $bookDetails = $this->bookService->getBookDetails($bookName);
        return response()->json($bookDetails);
    }

    public function deleteBook($bookName): JsonResponse
    {
        $isDeleted = $this->bookService->deleteBook($bookName);
        return response()->json($isDeleted);
    }

    public function addBook(Request $request): JsonResponse
    {
        $bookAdded = $this->bookService->addBook($request->all()["title"], $request->all()["price"], $request->all()["author"]);
        return response()->json($bookAdded);
    }

    public function updateBook(Request $request): JsonResponse
    {
        $bookUpdated = $this->bookService->updateBook($request->all()["title"], $request->all()["price"]);
        return response()->json($bookUpdated);
    }
}
