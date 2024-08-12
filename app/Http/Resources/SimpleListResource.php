<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SimpleListResource extends JsonResource
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
            "base_salary" => $this->whenNotNull($this->base_salary),
            "main_account" => $this->whenLoaded("subaccount",function (){
                return $this->subaccount->main_account;
            }),
            "category" => new SimpleListResource($this->whenLoaded("category"))
        ];
    }
}
