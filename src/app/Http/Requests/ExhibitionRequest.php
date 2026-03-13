<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitionRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'category_id' => 'required|array',
            'condition_id' => 'required|exists:conditions,id',
            'image_url' => 'required|image|mimes:jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '商品名を入力してください',
            'description.required' => '商品の説明を入力してください',
            'description.max' => '商品の説明は255文字以内で入力してください',
            'price.required' => '価格を入力してください',
            'price.integer' => '価格は整数で入力してください',
            'price.min' => '価格は0円以上で入力してください',
            'category_id.required' => 'カテゴリーを選択してください',
            'condition_id.required' => '商品の状態を選択してください',
            'condition_id.exists' => '選択された商品の状態は無効です',
            'image_url.required' => '画像をアップロードしてください',
            'image_url.image' => 'アップロードされたファイルは画像でなければなりません',
            'image_url.mimes' => '画像はjpegまたはpng形式でアップロードしてください',
        ];
    }
}
