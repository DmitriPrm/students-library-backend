<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function store(BookRequest $request) {
        $validatedData = $request->validated();

        $book = Book::create($validatedData);
        return new BookResource($book);
    }

    public function show(Book $book) {
        return new BookResource($book);
    }

    public function index() {
        return BookResource::collection(Book::all());
    }
}
