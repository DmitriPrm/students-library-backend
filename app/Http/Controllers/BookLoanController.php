<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookLoanRequest;
use App\Http\Resources\BookLoanResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \App\Models\Book;
use \App\Models\Student;
use \App\Models\BookLoan;

class BookLoanController extends Controller
{
    public function store(BookLoanRequest $request) {
        $validatedData = $request->validated();

        $validatedData['date_loan'] = Carbon::now();
        $validatedData['date_return'] = Carbon::now();
        $validatedData['current_tenure'] = $validatedData['tenure'];

        $bookLoan = BookLoan::create($validatedData);
        return new BookLoanResource($bookLoan);
    }

    public function index() {
        return BookLoanResource::collection(BookLoan::all());
    }
}
