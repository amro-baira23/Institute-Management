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
            "id" => $this->id,
            "category" => $this->subject->name,
            "room" => $this->room->name,
            "teacher" => $this->teacher?->person->name,
            "created_at" => $this->created_at->format("Y-m-d"),
            "days" => $this->schedule->days->pluck("day"),
            "dates" => $this->dates
        ];
    }
}
