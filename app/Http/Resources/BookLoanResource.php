<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use \App\Models\Book;
use \App\Models\Student;

class BookLoanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $bookName = Book::find($this->books_id)?->name_book ?? null;
        $reader = Student::find($this->readers_id_stud);
        $readerName = '';
        if($reader?->name) {
            $readerName .= $reader->name;
            $readerName = $reader?->surname ? $readerName . ' ' . $reader->surname : $readerName;
        }

        return [
            'books_id' => $bookName,
            'readers_id_stud' => $readerName,
            'date_loan' => $this->date_loan,
            'date_return' => $this->date_return,
            'tenure' => $this->tenure,
            'current_tenure' => $this->current_tenure,
        ];
    }
}
