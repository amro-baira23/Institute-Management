<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentCourseResource extends JsonResource
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
            "name" => $this->person->name,
            $this->merge(
            $this->only("gender","father_name","mother_name","line_phone_number","national_number","education_level","name_en","father_name_en","mother_name_en")
            ),
            "with_diploma" => true ? $this->pivot->with_diploma == "1" : false
        ];
    }
}
