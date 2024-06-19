<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CurrentCoursesResource extends JsonResource
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
            "category" => $this->subject->name,
            "room" => $this->room->name,
            "teacher" => new SimpleListResource($this->teacher),
            "created_at" => $this->created_at,
            "dates" => $this->dates
        ];
    }
}
