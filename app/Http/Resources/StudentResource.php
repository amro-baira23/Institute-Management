<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [        
            "id" => $this->id,
            'name' => $this->name,
            'phone_number' => $this->phone_number,
            'birth_date' => $this->birth_date,
            'father_name' => $this->father_name,
            'mother_name' => $this->mother_name,
            'gender' => $this->gender,
            'name_en' => $this->name_en,
            'father_name_en' => $this->father_name_en,
            'line_phone_number' => $this->line_phone_number,
            'mother_name_en' => $this->mother_name_en,
            'national_number' => $this->national_number,
            'nationality' => $this->nationality,
            'education_level' => $this->education_level,
            "created_at" => $this->created_at->format("Y-m-d h:i"),
        ];
    }
}
