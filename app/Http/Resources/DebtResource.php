<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DebtResource extends JsonResource
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
            "subaccount_id" => $this->subaccount->id,
            "course_id" => $this->course?->id,
            "subaccount_name" => $this->subaccount->accountable->name,
            "main_account" => $this->subaccount->main_account,
            "course_subject" => $this->course?->subject->name,
            "debt_amount" => (int) $this->balance,
            "last_payment_date" => $this->created_at->format("Y-m-d h:i"),
        ];
    }
}
