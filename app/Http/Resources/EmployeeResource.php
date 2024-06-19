<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Route;

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
            "name" => $this->person->name ?? null,
            $this->mergeWhen($request->route()->getName() == "get", [
                "salary" => $this->jobTitle->base_salary,
                "credentials" => $this->credentials,
                "birth_date" => $this->person->birth_date,
                "phone_number" => $this->person->phone_number,
                "created_at" => $this->created_at->format("Y-m-d h:i")
            ]),
            "shift" => new SimpleListResource($this->shift),
            "job_title" => new SimpleListResource($this->jobTitle),
            $this->mergeWhen($this->user, [
                "account" => [
                    "id" => $this->user?->id,
                    "username" => $this->user?->username,
                ]
            ]),
        ];
    }
}
