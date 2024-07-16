<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EnrollmentResource extends JsonResource
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
            "student" => new SimpleListResource($this->student),
            "course" => new CourseSimpleListResource($this->course),
            "with_certificate" => $this->with_certificate,
            "created_at" => $this->created_at?->format("Y-m-d h:i")
        ];
    }
}
