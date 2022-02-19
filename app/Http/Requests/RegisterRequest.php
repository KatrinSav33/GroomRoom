<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            $this->validate([
                'full_name' => 'required',
                'login' => 'required|unique:users',
                'email' => 'required',
                'password' => 'required|confirmed',
                'personal_info' => 'required',
                ],['required' => 'Поле :attribute должно быть заполнено',

                ])
        ];
    }
}
