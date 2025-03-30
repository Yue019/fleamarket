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
            'name' => 'required|string', // 商品名
            'price' => 'required|integer|min:0', // 価格
            'description' => 'required|string|max:255', // 説明
            'img' => 'required|image|mimes:jpeg,png,|max:2048', // 画像（最大2MB）
            'select' => 'required|exists:conditions,id', // 条件（選択されたものが conditions テーブルに存在するか）
            'categories' => 'required|array', // カテゴリ（複数選択可能）
            'categories.*' => 'exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '商品名は必須です。',
            'name.string' => '商品名は文字列である必要があります。',
            'name.max' => '商品名は255文字以内で入力してください。',
            'price.required' => '価格は必須です。',
            'price.integer' => '価格は整数で入力してください。',
            'price.min' => '価格は0円以上である必要があります。',
            'description.required' => '商品説明は必須です。',
            'description.max' => '商品説明は255文字以内で入力してください。',
            'img.required' => '画像は必須です。',
            'img.mimes' => '画像はjpeg, png,形式でアップロードしてください。',
            'img.max' => '画像の最大サイズは2MBです。',
            'select.required' => '商品状態を選択してください。',
            'categories.required' => 'カテゴリーを選択してください。',
            'categories.array' => 'カテゴリーは配列で送信してください。',
            'categories.*.exists' => '選択されたカテゴリーは存在しません。',
        ];
    }
}
