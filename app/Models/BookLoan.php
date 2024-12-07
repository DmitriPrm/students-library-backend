<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLoan extends Model
{
    use HasFactory;

    protected $connection = 'pgsql2';
    protected $table = 'loan_of_books';
    public $timestamps = false;

    protected $fillable = [
      'books_id',
      'readers_id_stud',
      'date_loan',
      'date_return',
      'tenure',
      'current_tenure'
    ];
}
