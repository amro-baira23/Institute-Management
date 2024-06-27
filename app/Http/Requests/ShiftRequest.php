<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShiftRequest extends FormRequest
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
            "name" => ["required","max:15",Rule::unique("shifts","name")->ignore($this->route("shift"))],
            'start' => 'required',
            'end' => 'required',
            'days' => 'required',
        ];
    }

    public function messages()
    {
        return [
            "*.required" => "هذا الحقل مطلوب",
            "unique" => "هذا الاسم مأخوذ من قبل",
            "max" => "على الاسم ان لا يزيد عن 15 محرف",

        ];
    }
}
