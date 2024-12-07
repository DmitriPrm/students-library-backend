<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $gender;
        switch ($this->sex) {
            case 'male':
                $gender = 'Мужской';
                break;
            case 'female':
                $gender = 'Женский';
                break;
            default:
                $gender = 'Другой';
        }
        return [
          'id' => $this->id,
          'surname' => $this->surname,
          'name' => $this->name,
          'sex' => $gender,
          'group' => $this->group,
        ];
    }
}
