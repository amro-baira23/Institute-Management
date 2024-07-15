<?php

namespace App\Http\Requests;

use App\Models\AdditionalSubAccount;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubAccountRequest extends FormRequest
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
        $main_accounts = ['المصاريف', 'الإيرادات',  'الصندوق', 'رأس المال', 'الموظفين'];

        return [
            'main_account' => ["required",Rule::in($main_accounts)],
            'name' => ['required',Rule::unique("additional_sub_accounts","name")->ignore($this->route("subAccount")?->id)],

        ];
    }

    
    public function messages()
    {
        return [
            "required" => "هذا الحقل مطلوب",
            "unique" => "هذا الاسم مأخوذ بالفعل من قبل حساب فرعي آخر",
            "main_account.in" => "الحساب الرئيسي المدخل غير صحيح"
        ];
    }
}