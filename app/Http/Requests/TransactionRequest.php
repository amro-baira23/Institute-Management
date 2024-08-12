<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TransactionRequest extends FormRequest
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
            'subaccount_id' => ["required",Rule::exists("sub_accounts","id")],
            'course_id' => [Rule::exists("courses","id")],
            'type' => ["required",Rule::in(["P","E"])],
            'amount' => ['required',"integer","gt:0"],
            'note' => []
        ];
    }

    public function messages()
    {
        return [
            "required" => "هذا الحقل مطلوب",
            "amount.gt" => "يجب ان تكون كمية المواد رقم موجب",
            "amount.integer" => "يجب ان تكون كمية المواد رقم صحيح",
            "type.in" => "قيمة نوع العملية غير صحيح",
            "exists" => "المعرف المدخل غير موجود في قاعدة البيانات"
        ];
    }
}
