<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            "name" => $this->name,
            "credentials" => $this->credentials,
            "birth_date" => $this->birth_date,
            "phone_number" => $this->phone_number,
            "created_at" => $this->created_at->format("Y-m-d h:i"),
            "shift" => new SimpleListResource($this->shift),
            "job_title" => new SimpleListResource($this->jobTitle),
            "account" => $this->whenNotNull($this->whenLoaded("user",function (){
                return  [
                    "id" => $this->user?->id,
                    "username" => $this->user?->username,
                ];
            })),

        ];
    }


    public function paginationInformation($request, $paginated, $default)
    {
        unset($default["meta"]["links"]);
        return $default;
    }
}