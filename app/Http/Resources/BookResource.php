<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'author' => $this->author,
            'name_book' => $this->name_book,
            'town' => $this->town,
            'publisher' => $this->publisher,
            'pYear' => $this->pYear,
        ];
    }
}
