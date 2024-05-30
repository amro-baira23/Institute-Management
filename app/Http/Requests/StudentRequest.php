<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'name_ar' => 'required',
            'name_en' => 'required',
            'father_name_ar' => 'required',
            'father_name_en' => 'required',
            'mobile_phone_number' => 'required',
            'line_phone_number' => 'required',
            'mother_name_ar' => 'required',
            'mother_name_en' => 'required',
            'national_number' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'nationality' => 'required',
            'education_level' => 'required',
        ];
    }
}