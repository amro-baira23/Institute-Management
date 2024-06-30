<?php

namespace App\Http\Requests;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator ;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'subject_id' => ['required','exists:subjects,id'],
            'teacher_id' => ['required','exists:teachers,id'],
            'room_id' => ['required',"exists:rooms,id"],
            'start_at' => ['required',"date"],
            'end_at' =>[ 'required','date'],
            'minimum_students' => ['required','integer'],
            'status' => ['required',Rule::in(["P","O","C"])],
            'salary_type' => ['required',Rule::in(["S","C"])],
            'salary_amount' => ['required','integer'],
            'cost' => ['required'],
            'start' => [ 'required'],
            'end' => ['required'],
            'days' => ['required'],
        ];
    }


    public function scheduleIsInvalid($validator) {
        $data = $this->validated();
        $data["days"] =  explode(',', $data["days"]);
        $course = Course::where("room_id",$data["room_id"])
        ->whereHas("schedule",function($query) use ($data){
            return $query->where(function ($query) use ($data){
                return $query->whereBetween("start",[$data["start"],$data["end"]])
                       ->orWhereBetween("end",[$data["start"],$data["end"]]);
            })->whereHas("days",function($query) use ($data){
                return $query->whereIn("day",$data["days"]);
            });
        })->first();
        if ($course){
            $subject = $course->subject->name;
            $sentence = "هذه المادة تتعارض مع دورة";
            $validator->errors()->add(
                "schedule", "لغة" . "عربية"
            );
        }
           
    }

    public function withValidator($validator){
        $validator->after(function($validator){
            $this->scheduleIsInvalid($validator);
        });
    }

    public function messages()
    {
        return [
            "required" => "هذا الحقل مطلوب",
        ];
    }
}