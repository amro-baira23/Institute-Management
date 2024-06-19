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
            'father_name' => 'required',
            'mother_name' => 'required',
            'gender' => 'required',
            'name_en' => 'required',
            'father_name_en' => 'required',
            'line_phone_number' => 'required',
            'mother_name_en' => 'required',
            'national_number' => 'required|unique:students,national_number',
            'nationality' => 'required',
            'education_level' => 'required',
        ];
    }
}