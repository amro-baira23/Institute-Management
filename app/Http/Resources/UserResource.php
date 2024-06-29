<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "username" => $this->username,
            "role" => new SimpleListResource($this->whenLoaded("role")),
            $this->mergeWhen($this->employee,[
            "employee" => new SimpleListResource($this->employee),
            ]),

        ];
    }
}
