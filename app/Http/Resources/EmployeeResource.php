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
            "name" => $this->person->name,
            "credentials" => $this->credentials,
            "birth_date" => $this->person->birthdate,
            "phone_number" => $this->person->phone_number,
            "job_title" => $this->job_title->name,
            "base_salary" => $this->job_title->base_salary,
            "account" => [
                "id" => $this->user->id,
                "username" => $this->user->username,
            ]
        ];
    }
}
