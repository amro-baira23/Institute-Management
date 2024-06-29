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
            $this->merge(
                $this->person->only("name", "birth_date", "phone_number",),
            ),
            $this->merge(
                $this->only("gender", "father_name", "mother_name", "line_phone_number", "national_number", "education_level", "name_en", "father_name_en", "mother_name_en", "nationality")
            ),
            "created_at" => $this->created_at->format("Y-m-d h:i"),

        ];
    }
}
