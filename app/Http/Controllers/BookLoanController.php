<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookLoanRequest;
use App\Http\Resources\BookLoanResource;
use App\Http\Resources\forms\BookLoanFormResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \App\Models\Book;
use \App\Models\Student;
use \App\Models\BookLoan;

class BookLoanController extends Controller
{
    public function store(BookLoanRequest $request) {
        $validatedData = $request->validated();

        $isExist = BookLoan::query()
            ->where('books_id', '=', $validatedData['books_id'])
            ->where('readers_id_stud', '=', $validatedData['readers_id_stud'])
            ->count();

        if($isExist) {
            throw new \Exception('Студент уже взял эту книгу!');
        }

        $validatedData['date_loan'] = Carbon::now();
        $validatedData['date_return'] = Carbon::now()->addDays($validatedData['tenure']);
        $validatedData['current_tenure'] = $validatedData['tenure'];

        $bookLoan = BookLoan::create($validatedData);
        return new BookLoanResource($bookLoan);
    }

    public function index() {
        return BookLoanResource::collection(BookLoan::all());
    }

    public function addTenure(BookLoan $bookLoan) {
        BookLoan::query()->decrement('current_tenure');
        return $this->index();
    }

    public function create() {
        $books = Book::all()
            ->map(function ($book) {
               return [
                 'id' => $book->id,
                 'value' => $book->author . ' ' . $book->name_book . ', ' . $book->publisher . ' ' . $book->pYear,
               ];
            });

        $students = Student::all()
            ->map(function($student) {
                return [
                  'id' => $student->id,
                  'value' => $student->name . ' ' . $student->surname,
                ];
            });

        return [
            'books_id' => $books,
            'readers_id_stud' => $students,
        ];
    }
}
