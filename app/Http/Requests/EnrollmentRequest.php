<?php

namespace App\Http\Requests;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EnrollmentRequest extends FormRequest
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
           "student_id" => ["required",Rule::exists("students","id")->withoutTrashed(),Rule::unique("enrollments","student_id")->where("course_id",$this->course_id)],
            "with_certificate" => ["required","bool"],
            "course_id" => ["required",Rule::exists("courses","id")],
            "initial_payment" => ["required","integer","gte:0"]
        ];
    }

    private function amountIsInvalid($validator){
        $valid = $this->validated();
        $course = Course::find($valid['course_id']);
        $cost = $valid["with_certificate"] ? $course->cost + $course->certificate_cost : $course->cost;
        if ($valid["initial_payment"] > $cost){
            $validator->errors()->add(
                "amount", "الدخل المدخل أكبر من سعر الدورة"
            );
        }
    }

    public function withValidator($validator){
        $validator->after(function($validator){
            $this->amountIsInvalid($validator);
        });
    }

    public function messages()
    {
        return [
            "required" => "هذا الحقل مطلوب",
            "unique" => "هذا الطالب مسجل بالفغل بهذه الدورة",
            "course_id.exists" => "معرف هذه الدورة غير موجود في قاعدة البيانات",
            "student_id.exists" => "معرف هذا الطالب غير موجود في قاعدة البيانات",
            "integer" => "هذا الحقل يحب ان يكون عدد صحيح",
            "gt" => "هذا الحقل يحب ان يكون عدد طبيعي"
        ];
    }
}
