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
            "subject" => new SimpleListResource($this->subject),
            "room" => new SimpleListResource($this->room),
            "teacher" => new SimpleListResource($this->teacher),
            "starts" => $this->schedule->start,
            "ends" => $this->schedule->end,
            "dates" => $this->dates
        ];
    }
}
