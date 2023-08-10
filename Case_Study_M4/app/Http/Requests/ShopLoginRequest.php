<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopLoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Không được để trống phần này!',
            'password.required'=>'Không được để trống phần này!'
        ];
    }

}
