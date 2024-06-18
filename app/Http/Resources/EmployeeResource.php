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
            "job_title" => $this->jobTitle?->name,
            "shift_name" => $this->shift->name,      
            $this->mergeWhen($request->route()->getName()=="get",[
                "salary" => $this->jobTitle->base_salary,
                "credentials" => $this->credentials,
                "gender" => $this->person->gender,
                "birth_date" => $this->person->birth_date,
                "phone_number" => $this->person->phone_number,
                
            ])
        ] + ($this->user ? ["account" => [
                "id" => $this->user->id,
                "username" => $this->user->username,
            ]] : []) ;
    }
}
