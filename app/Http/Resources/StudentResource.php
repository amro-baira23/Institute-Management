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
            "name" => $this->person->name,
            $this->mergeWhen(
                true,
                $this->person->only("birth_date", "phone_number",),
            ),
            $this->mergeWhen(true, 
            $this->only("gender","father_name","mother_name","line_number","national_number","educational_level","name_en","father_name_en","mother_name_en")
            ),
            "created_at" => $this->created_at->format("Y-m-d h:i"),

        ];
    }
}
