<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
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
            'father_name' => 'required',
            'mother_name' => 'required',
            'gender' => ["required",Rule::in(["M","F"])],
            'name_en' => 'required',
            'father_name_en' => 'required',
            'line_phone_number' => 'required',
            'mother_name_en' => 'required',
            'national_number' => ["required",Rule::unique("students","national_number")->ignore($this->route("student"))],
            'nationality' => 'required',
            'education_level' => 'required',
        ];
    }

    
    public function messages()
    {
        return [
            "*.required" => "هذا الحقل مطلوب",
            "national_number" => "يجب ان يكون الرقم الوطني مميز لكل طالب",
            "gender.*" => "قيمة الحقل غير صحيحة", 
        ];
    }
}