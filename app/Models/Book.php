<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = false;

    protected $connection = 'pgsql2';
    public $fillable = [
      'author',
      'name_book',
      'town',
      'publisher',
      'pYear',
    ];
}
