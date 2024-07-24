<?php

namespace App\Http\Requests;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Transaction;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DebtRequest extends FormRequest
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
            "subaccount_id" => ["required",Rule::exists("sub_accounts","id")],
            "course_id" => ["required",Rule::exists("courses","id")],
            "amount" => ["required","integer","gt:0"],
            "note" => [],
        ];
    }

    public function messages()
    {
        return [
            "required" => "هذا الحقل مطلوب",
            "amount.gt" => "يجب ان تكون كمية المواد رقم موجب",
            "amount.integer" => "يجب ان تكون كمية المواد رقم صحيح",
            "course_id.exists" => "معرف هذه الدورة غير موجود في قاعدة البيانات",
            "subaccount.exists" => "معرف هذا الحساب الفرعي غير موجود في قاعدة البيانات",
        ];
    }

    private function amountIsInvalid($validator){
        $valid = $this->validated();
        $balance = Transaction::where("course_id",$valid['course_id'])
        ->where("subaccount_id",$valid['subaccount_id'])
        ->selectRaw("SUM(IF(type='P',amount,0)) - SUM(IF(type='E',amount,0)) as balance")->first();
        $balance = abs($balance->balance);
        if ($valid["amount"] > $balance){
            $validator->errors()->add(
                "amount", "المبلغ المدخل أكبر من حجم الدين"
            );
        }
    }

    public function withValidator($validator){
        $validator->after(function($validator){
            $this->amountIsInvalid($validator);
        });
    }

}
