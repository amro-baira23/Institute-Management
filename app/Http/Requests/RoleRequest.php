<?php

namespace App\Http\Requests;

use App\Rules\ListExists;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
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
            'role' => ["required",Rule::unique("roles","name")->ignore($this->route("role")?->id)],
            'permissions' => ["required" ,new ListExists("permissions")]
        ];
    }

    public function messages()
    {
        return [
            "*.required" => "هذا الحقل مطلوب",
            "unique" => "هذا الاسم مأخوذ بالفعل"
            
        ];
    }
}