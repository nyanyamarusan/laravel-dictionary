<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WordRequest extends FormRequest
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
            'keyword' => ['required', 'unique:words,keyword', 'string', 'max:25'],
            'description' => ['required', 'string', 'max:150'],
        ];
    }

    public function messages()
    {
        return [
            'keyword.required' => 'キーワードは必須です',
            'keyword.unique' => '既に登録されています',
            'keyword.string' => 'キーワードを文字列で入力してください',
            'keyword.max' => 'キーワードは25文字以下で入力してください',
            'description.required' => '説明は必須です',
            'description.string' => '説明を文字列で入力してください',
            'description.max' => '説明は150文字以下で入力してください',
        ];
    }
}
