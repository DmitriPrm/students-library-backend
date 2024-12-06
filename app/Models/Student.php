<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;

    protected $connection = 'pgsql';
    protected $table = 'student';

    public $fillable = [
      'surname',
      'name',
      'sex',
      'group',
    ];
}
