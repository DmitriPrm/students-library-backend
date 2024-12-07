<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\BookController;
use \App\Http\Controllers\StudentController;
use \App\Http\Controllers\BookLoanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('students', [StudentController::class, 'index']);
Route::get('students/{id}', [StudentController::class, 'show']);
Route::post('students', [StudentController::class, 'store']);

Route::get('books', [BookController::class, 'index']);
Route::get('books/{id}', [BookController::class, 'show']);
Route::post('books', [BookController::class, 'store']);

Route::get('books-loan', [BookLoanController::class, 'index']);
Route::post('books-loan', [BookLoanController::class, 'store']);
Route::post('books-loan/add-tenure', [BookLoanController::class, 'addTenure']);
