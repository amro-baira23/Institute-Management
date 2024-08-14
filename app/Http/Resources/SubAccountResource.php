<?php

namespace App\Http\Resources;

use App\Models\AdditionalSubAccount;
use App\Models\Enrollment;
use Illuminate\Http\Resources\Json\JsonResource;

class SubAccountResource extends JsonResource
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
            "name" => $this->accountable->name ?? null,
            "main_account" => $this->main_account,
            "transactions" => $this->whenLoaded("transactions",function (){
                return TransactionResource::collection($this->transactions);
            }),
            "balance" =>  $this->whenNotNull((int)$this->balance)
        ];
    }
}
