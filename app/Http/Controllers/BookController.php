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


    public function getBook($bookId)
    {
        $bookDetails = $this->bookService->getBookDetails($bookId);
        return view('GetBook')->with($bookDetails);
    }



    public function addBook(Request $request)
    {

        $bookAdded = $this->bookService->addBook($request->all()["title"], $request->all()["price"], $request->all()["author"]);
        return redirect()->back() ->with('alert', $bookAdded );
    }


    public function updateBook(Request $request)
    {
        $bookUpdated = $this->bookService->updateBook($request->all()['id'] ,$request->all()["title"] , $request->all()["price"]);
        return redirect()->back() ->with('alert', $bookUpdated );
    }



    public function deleteBook(Request $request)
    {
        $isDeleted = $this->bookService->deleteBook($request->all()['id']);
        return redirect()->back()->with('alert', $isDeleted );
    }
}
