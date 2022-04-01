<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Введите своё ФИО',
            'email.required' => 'Введите свой Email',
            'email.email' => 'Введите корректный формат Email',
            'password.required' => 'Введите пароль',
            'password.min' => 'Минимальная длина пароля - 6 символов'
        ];
    }
}
