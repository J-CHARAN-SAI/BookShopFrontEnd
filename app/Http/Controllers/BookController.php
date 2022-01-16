<?php

namespace App\Http\Controllers;

use App\Service\BookService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }


    public function getBook(Request $request)
    {
        $bookDetails = $this->bookService->getBookDetails($request->all()["title"]);
        return view('BookDetails')->with('books',$bookDetails);
    }



    public function addBook(Request $request): RedirectResponse
    {
        $bookAdded = $this->bookService->addBook($request->all()["title"], $request->all()["price"], $request->all()["author"]);
        return redirect()->back() ->with('alert', $bookAdded );
    }


    public function updateBook($id,Request $request): RedirectResponse
    {
        $bookUpdated = $this->bookService->updateBook($id,$request->all()["title"] , $request->all()["price"]);
        return redirect()->back() ->with('alert', $bookUpdated );
    }



    public function deleteBook($id): RedirectResponse
    {
        $isDeleted = $this->bookService->deleteBook($id);
        return redirect()->back()->with('alert', $isDeleted );
    }

    public function getDataOfBook($id)
    {
        $bookDetails = $this->bookService->getDataOfBook($id);
        return view('EditBook')->with('book',$bookDetails);
    }
}
