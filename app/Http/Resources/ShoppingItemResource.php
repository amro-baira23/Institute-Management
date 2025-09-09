<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShoppingItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $student_number = $this->whenLoaded("course",$this->course->students()->count(),100);
        return [
            "is_bought" => $this->is_bought,
            "current_amount" => $this->when(!$this->per_student,$this->amount,($this->amount*$student_number)),
            "amount" => $this->amount,
            "item_name" => $this->whenLoaded("item",$this->item->name),
            "item_id" => $this->whenLoaded("item",$this->item->id),
            "per_student" => $this->per_student,
        ];
    }
}
