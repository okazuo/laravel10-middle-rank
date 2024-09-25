<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'variable100' => 'required|string',
            'num' => 'required|integer|digits_between:0,10',
        ];
    }

    public function messages(){
        return [
            'variable100.required' => 'ここは必須項目っす',
            'num.required' => 'ここは必須項目っす',
            'num.integer' => '数字でお願いします',
            'num.digits_between' => '0~10桁で入力を頼むぜ',
        ];
    }
}
