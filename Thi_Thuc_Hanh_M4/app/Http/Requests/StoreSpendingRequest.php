<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSpendingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'danhmuc' => 'required',
            'ngay' => 'required|date',
            'sotien' => 'required|numeric',
            'note' => 'required',
        ];
    }

    public function messages()
    {
        return  [
                'danhmuc.required' => 'Vui lòng không được để trống',
                'ngay.required'      => 'Vui lòng không được để trống',
                'sotien.required' => 'Vui lòng không được để trống',
                'note.required'      => 'Vui lòng không được để trống',
                
            ];
    }
}
