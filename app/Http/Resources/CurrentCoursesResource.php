<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CurrentCoursesResource extends JsonResource
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
            "subject" =>new SimpleListResource($this->subject),
            "room" => new SimpleListResource($this->room),
            "teacher" => new SimpleListResource($this->teacher),
            "minimum_students" => $this->minimum_students,
            "status" => $this->status,
            "cost" => $this->cost,
            "certificate_cost" => $this->certificate_cost,
            "schedule" => [
                "id" => $this->schedule_id,
                "starts" => $this->schedule->start,
                "ends" => $this->schedule->end,
                "days" => $this->schedule->days->pluck('day')
            ],
            "salary_type" => $this->salary_type,
            "salary_amount" => $this->salary_amount,
            "start_at" => $this->start_at,
            "end_at" => $this->end_at,
            $this->mergeWhen(
                $request->route()->getName() == "schedule",
                ["dates" => $this->dates
                ]
            ),
        ];
    }
}
