<?php

namespace App\Http\Requests;

use App\Models\JobTitle;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
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
            'credentials' => ["required",],
            'job_title_id' => ["required", "integer", Rule::exists("job_titles", "id")],
            'shift_id' => ["required", "integer", Rule::exists("shifts", "id")],
            'user_id' => ["integer"],
        ];
    }

    public function messages(): array
    {
        return [
            "*.required" => "هذا الحقل مطلوب",
            'job_title_id.exists' => "معرف المناوبة المدخلة غير موجود في قاعدة البيانات" 
        ];
    }

}
