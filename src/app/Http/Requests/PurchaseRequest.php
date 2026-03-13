<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'payment_method' => 'required',
            'post_code' => ['required', 'regex:/^\d{3}-\d{4}$/'],
            'address' => 'required',
            'building' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'payment_method.required' => '支払い方法を選択してください',
            'post_code.required' => '配送先を登録してください',
            'post_code.regex' => '郵便番号は正しい形式で登録してください',
            'address.required' => '配送先を登録してください',
        ];
    }
}
