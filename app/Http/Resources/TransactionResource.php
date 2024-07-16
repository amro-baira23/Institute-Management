<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'subaccount' => $this->whenLoaded("subaccount",function(){
                return $this->subaccount->accountable->name;
            }),
            'main_account' => $this->whenLoaded("subaccount",function(){
                return $this->subaccount->main_account;
            }),
            'type' => $this->type,
            'amount' => $this->amount,
            'note' => $this->note,
            "created_at" =>$this->created_at->format("Y-m-d h:i")
        ];
    }
}
