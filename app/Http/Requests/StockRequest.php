<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockRequest extends FormRequest
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
        if ($this->route()->getName() == "import")
        return [
            "amount" => ["integer"]
        ];

        else
            return [
                'name' => ['required','unique:stocks'],
                'amount' => ['required',"integer","gt:0"],
                "source" => ["required"],
            ];
     
    }

    public function messages()
    {
        return [
            "name.required" => "هذا الحقل مطلوب",
            "amount.required" => "هذا الحقل مطلوب",
            "amount.gt" => "يجب ان يكون عدد المواد رقم موجب",
            "amount.integer" => "يجب ان يكون عدد المواد رقم صحيح",
            "source.required" => "هذا الحقل مطلوب",
            "name.unique" => "يوجد مادة بهذا الاسم مسبقا",
        ];
    }
}