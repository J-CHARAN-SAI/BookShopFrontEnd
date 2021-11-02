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


    /**
     * @OA\Get(
     *    path="/books/{bookId}",
     *    operationId="getBook",
     *    tags={"getBook"},
     *    summary="Get details of a Book",
     *    description="Returns details of a Book",
     *    @OA\Parameter(
     *        name="bookId",
     *        description="Book Id",
     *        required=true,
     *        in="path",
     *        @OA\Schema(
     *            type="number"
     *        )
     *      ),
     *    @OA\Response(
     *        response=200,
     *        description="successful operation",
     *        @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *               property="title",
     *               type="string",
     *               example="Hakuna Matata"
     *             ),
     *             @OA\Property(
     *               property="price",
     *               type="number",
     *               format="integer",
     *               example=200
     *             ),
     *             @OA\Property(
     *                property="author",
     *                type="object",
     *                example={
     *                  "first_name": "John",
     *                  "last_name": "Brown",
     *                  "email":"babybuffalo@gmail.com"
     *                },
     *                      @OA\Property(
     *                         property="first_name",
     *                         type="string",
     *                         example="John"
     *                      ),
     *                      @OA\Property(
     *                         property="last_name",
     *                         type="string",
     *                         example="Brown"
     *                      ),
     *                      @OA\Property(
     *                         property="email",
     *                         type="string",
     *                         example="babybuffalo@gmail.com"
     *                      ),
     *             ),
     *        ),
     *     ),
     *    @OA\Response(response=400, description="Bad request"),
     *    )
     *
     * Returns all the details for a given Book id
     */
    public function getBook($bookId): JsonResponse
    {
        $bookDetails = $this->bookService->getBookDetails($bookId);
        return response()->json($bookDetails);
    }


    /**
     * @OA\POST(
     *     path="/books",
     *     summary="Add a new Book",
     *     tags={"addBook"},
     *     @OA\RequestBody(
     *        required = true,
     *        description = "New Book Details",
     *        @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                property="title",
     *                type="string",
     *                example="Davinci Code"
     *             ),
     *             @OA\Property(
     *                property="price",
     *                type="number",
     *                format="integer",
     *                example=550
     *             ),
     *             @OA\Property(
     *                property="author",
     *                type="object",
     *                example={
     *                  "first_name": "Dan",
     *                  "last_name": "Brown",
     *                  "email": "dan@danbrown.com"
     *                },
     *                      @OA\Property(
     *                         property="first_name",
     *                         type="string",
     *                         example="Dan"
     *                      ),
     *                      @OA\Property(
     *                         property="last_name",
     *                         type="string",
     *                         example="Brown"
     *                      ),
     *                      @OA\Property(
     *                         property="email",
     *                         type="string",
     *                         example="dan@danbrown.com"
     *                      ),
     *             ),
     *        ),
     *     ),
     *
     *    @OA\Response(
     *        response=201,
     *        description="successful operation",
     *        @OA\JsonContent(
     *             type="string",
     *             example="Book is successfully added"
     *        ),
     *     ),
     *
     * )
     */
    public function addBook(Request $request): JsonResponse
    {
        $bookAdded = $this->bookService->addBook($request->all()["title"], $request->all()["price"], $request->all()["author"]);
        return response()->json($bookAdded, 201);
    }

    /**
     * @OA\PUT(
     *     path="/books/{bookId}",
     *     summary="Update a Book",
     *     tags={"updateBook"},
     *    @OA\Parameter(
     *        name="bookId",
     *        description="Book Id",
     *        required=true,
     *        in="path",
     *        @OA\Schema(
     *            type="number"
     *        )
     *      ),
     *     @OA\RequestBody(
     *        required = true,
     *        description = "Update Book Details",
     *        @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                property="title",
     *                type="string",
     *                example="The Elephant Whisperer"
     *             ),
     *             @OA\Property(
     *                property="price",
     *                type="number",
     *                format="integer",
     *                example=850
     *             ),
     *        ),
     *     ),
     *    @OA\Response(
     *        response=200,
     *        description="successful operation",
     *        @OA\JsonContent(
     *             type="string",
     *             example="Book is successfully updated"
     *        ),
     *     ),
     * )
     */
    public function updateBook($bookId, Request $request): JsonResponse
    {
        $bookUpdated = $this->bookService->updateBook($bookId ,$request->all()["title"] , $request->all()["price"]);
        return response()->json($bookUpdated);
    }

    /**
     * @OA\Delete(
     *    path="/books/{bookId}",
     *    operationId="deleteBook",
     *    tags={"deleteBook"},
     *    summary="Delete a Book",
     *    description="Deletes a Book",
     *    @OA\Parameter(
     *        name="bookId",
     *        description="Book Id",
     *        required=true,
     *        in="path",
     *        @OA\Schema(
     *            type="number"
     *        )
     *      ),
     *    @OA\Response(
     *        response=200,
     *        description="successful operation",
     *        @OA\JsonContent(
     *             type="string",
     *             example="Book is successfully deleted"
     *        ),
     *     ),
     *    @OA\Response(response=404, description="Book not found"),
     *    )
     *
     * Returns all the details for a given Book id
     */
    public function deleteBook($bookId): JsonResponse
    {
        $isDeleted = $this->bookService->deleteBook($bookId);
        return response()->json($isDeleted);
    }
}
