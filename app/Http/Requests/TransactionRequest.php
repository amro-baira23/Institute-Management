<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'subaccount_id' => 'required',
            'account' => 'required',
            'type' => 'required',
            'amount' => 'required|numeric',
            'note' => 'required',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'هذا الحقل مطلوب',
            '*.numeric' => 'هذا الحقل يقبل أرقام فقط',
        ];
    }
}
